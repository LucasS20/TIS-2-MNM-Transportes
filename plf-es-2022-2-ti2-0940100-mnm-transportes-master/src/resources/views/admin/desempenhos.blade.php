<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desempenhos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); * { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body>
    <main class="w-full h-full p-10">
        <h1 class="text-2xl my-10 bold text-center">Desempenhos</h1>

        <table class="min-w-full border shadow-lg rounded-md">
            <thead class="bg-white border-b">
            <tr>
                <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                    Indicador
                </th>
                <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                    Cálculo
                </th>
                <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                    Resultado
                </th>
            </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Nota média de avaliações
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Soma total das notas / <br> quantidade de notas
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $notasMedia }}
                    </td>
                </tr>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Tempo médio de entrega
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Soma dos tempos de entrega / <br> quantidade de serviços
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $tempoMedio }} dias em média
                    </td>
                </tr>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Taxa Adesão de novos clientes por mês
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Quantidade de Clientes desse mes * 100 / <br> Quantidade de Clientes do mês passado
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $clienteMedia }} %
                    </td>
                </tr>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Taxa Adesão de novas Empresas por mês
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Quantidade de Empresas desse mes * 100 / <br> Quantidade de Empresas do mês passado
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $transportadoraMedia }} %
                    </td>
                </tr>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Média de serviços por transportadora
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Quantidade de Serviços / <br> Quantidade de Transportadoras
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $servicoMedioTransportadora }}
                    </td>
                </tr>
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Média de serviços por Clientes
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Quantidade de Serviços / <br> Quantidade de Clientes
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $servicoMedioCliente }}
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>
