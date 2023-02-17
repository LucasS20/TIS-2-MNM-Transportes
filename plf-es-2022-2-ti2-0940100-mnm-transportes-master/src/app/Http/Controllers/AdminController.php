<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Avaliacao;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Transportadora;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (Auth::check() && isset(auth()->user()->username)) {
            return redirect('/admin');
        }

        return view('admin.login');
    }

    /**
     * @throws ValidationException
     */
    public function validarLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$admin = Admin::where('username', $request->input('username'))->first()) {
            throw ValidationException::withMessages([
                'username' => ['Usuário não encontrado.'],
            ])->redirectTo('/login_admin');
        }

        if (!Hash::check($request->input('password'), $admin->password)) {
            throw ValidationException::withMessages([
                'password' => ['Usuário não encontrado.'],
            ])->redirectTo('/login_admin');
        }

        return view('admin.desempenhos', [
            'notasMedia' => $this->getNotasMedia(),
            'tempoMedio' => $this->getTempoMedioEntrega(),
            'clienteMedia' => $this->getClientesMedia(),
            'transportadoraMedia' => $this->getTransportadoraMedia(),
            'servicoMedioTransportadora' => $this->getServicoPorTransportadora(),
            'servicoMedioCliente' => $this->getServicosPorCliente(),
        ]);
    }

    private function getNotasMedia()
    {
        return number_format(Avaliacao::avg('nota'), 2);
    }

    private function getClientesMedia()
    {
        $todosDesseMes = Cliente::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->get()->count();

        $todosMesPassado = Cliente::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->subMonth())
            ->get()->count();

        if ($todosMesPassado == 0 || $todosDesseMes == 0) {
            return "(Nenhum dado encontrado no mês anterior)";
        }

        return number_format(($todosDesseMes * 100) / $todosMesPassado, 2);
    }

    private function getTransportadoraMedia()
    {
        $todosDesseMes = Transportadora::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->get()->count();

        $todosMesPassado = Transportadora::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->subMonth())
            ->get()->count();

        if ($todosMesPassado == 0 || $todosDesseMes == 0) {
            return "(Nenhum dado encontrado no mês anterior)";
        }

        return number_format(($todosDesseMes * 100) / $todosMesPassado);
    }

    private function getServicoPorTransportadora()
    {
        $sevicos = Servico::all()->count();
        $transportadoras = Transportadora::all()->count();

        if ($sevicos == 0 || $transportadoras == 0) {
            return "";
        }

        return $sevicos / $transportadoras;
    }

    private function getServicosPorCliente()
    {
        $cliente = Cliente::all()->count();
        $transportadoras = Transportadora::all()->count();

        if ($cliente == 0 || $transportadoras == 0) {
            return "";
        }

        return $cliente / $transportadoras;
    }

    private function getTempoMedioEntrega()
    {
        $servicos = Servico::all();
        $diferenca = 0;
        foreach ($servicos as $servico) {
            $dataFinalizado = Carbon::create($servico->data_servico_finalizado);
            $dataPago = Carbon::create($servico->data_servico_pago);

            $diferenca += $dataFinalizado->day - $dataPago->day;
        }

        if($diferenca !== 0 && $servicos->count() !== 0) {
            return number_format($diferenca / $servicos->count(), 2);
        }

        return 0;
    }
}
