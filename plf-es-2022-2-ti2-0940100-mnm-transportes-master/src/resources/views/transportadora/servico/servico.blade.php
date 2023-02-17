<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Serviço</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }

        .multi-select-container {
            display: inline-block;
            position: relative;
        }

        .multi-select-menu {
            position: absolute;
            left: 0;
            top: 0.8em;
            float: left;
            min-width: 100%;
            background: #fff;
            margin: 1em 0;
            padding: 0.4em 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            display: none;
        }

        .multi-select-menu input {
            margin-right: 0.3em;
            vertical-align: 0.1em;
        }

        .multi-select-button {
            display: inline-block;
            font-size: 0.875em;
            padding: 0.2em 0.6em;
            max-width: 20em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: -0.5em;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            cursor: default;
        }

        .multi-select-button:after {
            content: "";
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0.4em 0.4em 0 0.4em;
            border-color: #999 transparent transparent transparent;
            margin-left: 0.4em;
            vertical-align: 0.1em;
        }

        .multi-select-container--open .multi-select-menu { display: block; }

        .multi-select-container--open .multi-select-button:after {
            border-width: 0 0.4em 0.4em 0.4em;
            border-color: transparent transparent #999 transparent;
        }
    </style>
</head>
<body>
    <x-navbar-transportadora></x-navbar-transportadora>

    <h1 class="mt-28 mb-5 p-10 text-2xl font-medium uppercase italic">
        Visualizar <span class="text-blue-400 font-bold">serviço</span>
    </h1>

    <main class="p-10 flex">

        <div class="w-1/2">
            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Número do Serviço</span>
                {{ $servico->id }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Transportadora Responsável</span>
                {{ $transportadora ? $transportadora->nome_transportadora : "O serviço ainda não foi aceito por alguma transportadora." }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Cliente</span>
                {{ $cliente->nome }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Endereço de retirada</span>
                {{ $servico->endereco_retirada }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Endereço de entrega</span>
                {{ $servico->endereco_entrega }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Data</span>
                {{ date('d/m/Y', strtotime($servico->data)) }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Valor da proposta</span>
                {{ $servico->valor_proposta ?? "Esperando Transportadora" }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Valor final</span>
                {{ $servico->valor_final ?? "Esperando Negociação" }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Quantidade de itens</span>
                {{ $servico->quantidade_itens }}
            </span>

            <span class="text-md flex flex-col gap-2 mb-8">
                <span class="font-semibold mr-2">Situação do serviço</span>
                @if($servico->servico_completo)
                    <div class="flex gap-2">
                        <span>Completo</span>
                        <div class="rounded-full w-5 h-5 bg-green-500">&nbsp;</div>
                    </div>
                @elseif(isset($handler['preference']) || !$servico->valor_final)
                    <div class="flex gap-2">
                        <span>Esperando negociação</span>
                        <div class="rounded-full w-5 h-5 bg-blue-500">&nbsp;</div>
                    </div>
                @else
                    <div class="flex gap-2">
                        <span>Em andamento</span>
                        <div class="rounded-full w-5 h-5 bg-yellow-500">&nbsp;</div>
                    </div>
                @endif
            </span>
        </div>

        @if($servico->servico_completo)
            <div class="mt-24 w-1/2">
                <p class="text-xl text-center text-gray-600">Serviço completo com sucesso! Obrigado por preferir a <span class="text-blue-500 uppercase font-semibold italic text-center">MNM Transportes</span></p>
                <img src="{{ asset('img/complete_img.jpg') }}" alt="Serviço completo">
            </div>
        @elseif(! $servico->valor_final)
            <div class="mt-24 flex flex-col gap-3 w-1/2">
                <h1 class="mb-5 text-xl font-medium uppercase italic">
                    Fazer proposta de <span class="text-blue-400 font-bold">orçamento</span>
                </h1>

                @if(! $transportadora)
                    <div class="p-4 shadow-md rounded-md">
                        <p class="text-sm mb-20 text-gray-700 flex flex-col">
                            Olá, {{ auth()->user()->nome_transportadora }}, após analisar o serviço, você
                            pode propor um valor de orçamento para o cliente, seu histórico de orçamento
                            com o cliente é apresentado em uma tabela abaixo, você pode também, selecionar
                            quais funcionários deseja escalar para o serviço.

                        <p class="text-sm text-gray-500">Selecionar Funcionários</p>
                        <form action="" id="form-orcamento">
                            <label for="funcionarios" class="flex flex-col">
                                <select id="multiselect" multiple name="funcionarios" id="funcionarios" class="">
                                    @forelse($funcionarios as $funcionario)
                                        <option value="{{ $funcionario->id }}">
                                            {{ $funcionario->nome }}
                                        </option>
                                    @empty
                                        <option value="--" selected>Nenhum funcionário encontrado</option>
                                    @endforelse
                                </select>
                            </label>

                            <label for="orcamento" class="text-sm text-gray-500 mt-10 flex flex-col">
                                Digite seu orçamento
                                <input
                                    onkeyup="setMask(event)"
                                    id="orcamento" name="orcamento" type="text" class="outline-none border-b border-blue-400 w-1/2 mt-3 text-gray-700" placeholder="R$">
                            </label>

                            <input type="hidden" name="servico_id" id="servico_id" value="{{ $servico->id }}">
                            <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}">
                            <input type="hidden" name="transportadora_id" id="transportadora_id" value="{{ auth()->user()->id }}">


                            <button
                                onclick="fazerOrcamento(event)"
                                class="px-10 py-2 text-sm text-center uppercase text-white bg-blue-400 hover:bg-blue-500 mt-10"
                            >
                                Fazer orçamento
                            </button>
                        </form>
                        </p>
                    </div>
                @else
                    <div class="flex flex-col">
                        @if($ultimoOrcamento->feita_por === 'Transportadora')
                            <p class="text-sm text-gray-700">
                                Você fez a proposta de orçamento de {{ $servico->valor_proposta }}.
                                Estamos esperando pelo cliente, ele possui a opção de aceitar sua proposta
                                ou fazer uma nova proposta de orçamento que seja agradável para ambos, não
                                se preocupe, te deixaremos ciente quanto a todos os orçamentos relacionados
                                ao serviço.
                            </p>
                        @else
                            <p class="text-sm text-gray-700 mb-10">
                                O cliente fez uma nova proposta no valor de <strong>{{ $servico->valor_proposta }}</strong>.
                                Abaixo você pode escolher fazer uma contra-proposta ou aceitar a proposta oferecida pelo Cliente.
                            </p>

                            <form action="" id="form-orcamento">
                                <label for="funcionarios" class="flex flex-col">
                                    <select id="multiselect" multiple name="funcionarios" id="funcionarios" class="">
                                        @forelse($funcionarios as $funcionario)
                                            <option value="{{ $funcionario->id }}">
                                                {{ $funcionario->nome }}
                                            </option>
                                        @empty
                                            <option value="--" selected>Nenhum funcionário encontrado</option>
                                        @endforelse
                                    </select>
                                </label>

                                <label for="orcamento" class="text-sm text-gray-500 mt-10 flex flex-col">
                                    Digite seu orçamento
                                    <input
                                        onkeyup="setMask(event)"
                                        id="orcamento" name="orcamento" type="text" class="outline-none border-b border-blue-400 w-1/2 mt-3 text-gray-700" placeholder="R$">
                                </label>

                                <input type="hidden" name="servico_id" id="servico_id" value="{{ $servico->id }}">
                                <input type="hidden" name="proposta_oferecida" id="proposta_oferecida" value="{{ $ultimoOrcamento->proposta }}">
                                <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}">
                                <input type="hidden" name="transportadora_id" id="transportadora_id" value="{{ auth()->user()->id }}">


                                <button
                                    onclick="fazerOrcamento(event)"
                                    class="px-10 py-2 text-sm text-center uppercase text-white bg-blue-400 hover:bg-blue-500 mt-10"
                                >
                                    Fazer orçamento
                                </button>

                                <button
                                    onclick="aceitarProposta(event)"
                                    class="px-10 py-2 text-sm text-center uppercase text-white bg-black mt-10"
                                >
                                    Aceitar Proposta
                                </button>
                            </form>
                        @endif
                    </div>

                    <hr>
                    <h2 class="mt-10 italic text-gray-600">Orçamentos</h2>

                    <div class="mt-4">
                        <table class="min-w-full border shadow-lg rounded-md">
                            <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                    Valor oferecido
                                </th>
                                <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                    Feito por
                                </th>
                                <th scope="col" class="text-blue-400 text-center text-sm font-semibold px-6 py-4 text-left">
                                    Aceito
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orcamentos as $orcamento)
                                <tr
                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $orcamento->id }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $orcamento->proposta }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $orcamento->feita_por }}
                                    </td>
                                    <td class="text-sm flex justify-center items-center text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @if($orcamento->aceita)
                                            <div class="rounded-full w-5 h-5 bg-green-500">&nbsp;</div>
                                        @else
                                            <div class="rounded-full w-5 h-5 bg-red-500">&nbsp;</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="mt-5 flex justify-start items-center">
                            {{ $orcamentos->links() }}
                        </div>
                    </div>

                    <hr>
                    <h2 class="mt-10 italic text-gray-600">Entregadores</h2>

                    <div class="mt-4">
                        <table class="min-w-full border shadow-lg rounded-md">
                            <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                    Nome
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entregadores as $entregador)
                                <tr>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $entregador }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @else
            <div class="mt-24 flex flex-col gap-3 w-1/2">
                <h1 class="mb-5 text-xl font-medium uppercase italic">
                    Propostas de <span class="text-blue-400 font-bold">orçamento</span>
                </h1>
                <p class="text-xs text-gray-700 italic">O valor final do serviço já foi combinado como <strong>{{ $servico->valor_final }}</strong> <br> não é possível fazer outra negociação.</p>
                <hr class="w-1/2 my-5">
                <p class="text-gray-500 italic text-sm">Atualizar Status do serviço</p>

                @if($servico->status_pagamento !== 'paid')
                    <div class="bg-orange-100 border-l-4 text-sm border-orange-500 text-orange-700 p-4" role="alert">
                        <p>
                            O cliente ainda não efetuou o pagamento do serviço,
                            recomendamos esperar o pagamento ser concluído para
                            começar o transporte.
                        </p>
                    </div>
                @else

                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="text-sm">
                                    O pagamento foi efetuado com sucesso, você já pode iniciar
                                    o transporte.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-10 flex flex-col w-1/2 gap-4">
                    <input type="hidden" name="servico_id" id="servico_id" value="{{ $servico->id }}">
                    <button
                        onclick="cancelarServico(event)"
                        class="px-10 py-2 bg-red-400 hover:bg-red-500 text-white uppercase text-center">
                        Cancelar serviço
                    </button>
                    @if($servico->status_pagamento == 'paid')
                        <button
                            onclick="finalizarServico(event)"
                            class="px-10 py-2 bg-blue-400 hover:bg-blue-500 text-white uppercase text-center">
                            Finalizar Serviço
                        </button>
                    @endif
                </div>
            </div>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/vendor/multiselect/src/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/multiselect/src/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/servico_transportadora.js') }}"></script>
</body>
</html>
