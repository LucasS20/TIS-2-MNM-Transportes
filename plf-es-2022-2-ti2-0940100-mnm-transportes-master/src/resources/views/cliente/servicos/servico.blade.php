<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Serviço</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('css/servico_cliente.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}"/>
</head>
<body>
<x-navbar-cliente></x-navbar-cliente>

<h1 class="mt-28 mb-5 p-10 text-2xl font-medium uppercase italic">
    Visualizar <span class="text-blue-400 font-bold">serviço</span>
</h1>

@if(! empty($handler) && $handler['status'] === 'success')
    <div class="bg-teal-100 mx-10 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Sucesso!</p>
                <p class="text-sm">Pagamento efetuado com sucesso.</p>
            </div>
        </div>
    </div>
@elseif(! empty($handler) && $servico->status_pagamento !== 'paid')
    <div class="bg-red-100 mx-10 p-10 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ $handler['message'] }}</span>
        <span class="block sm:inline"><a class="text-blue-400 underline"
                                         href="{{ $handler['preference'] }}">Clique aqui</a> para finalizar o pagamento</span>
    </div>
@elseif($servico->status_pagamento == 'paid')
    <div class="bg-teal-100 mx-10 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Sucesso!</p>
                <p class="text-sm">Pagamento efetuado com sucesso.</p>
            </div>
        </div>
    </div>
@endif

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
                {{ $servico->status_pagamento === 'pending' ? "Esperando Negociação" : $servico->valor_final }}
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
            @elseif($servico->status_pagamento === 'pending')
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
            <p class="text-xl text-center text-gray-600">Serviço completo com sucesso! Obrigado por preferir a <span
                    class="text-blue-500 uppercase font-semibold italic text-center">MNM Transportes</span></p>
            <img src="{{ asset('img/complete_img.jpg') }}" alt="Serviço completo">

            @if(! $servico->avaliacoes()->first())
                <hr class="my-10">
                <h1 class="mb-5 text-xl font-medium uppercase italic">
                    Avaliar <span class="text-blue-400 font-bold">Serviço</span>
                </h1>

                <div class="mt-6">
                    <form class="rating">
                        <label>
                            <input type="radio" name="stars" value="1" />
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                        </label>
                    </form>
                    <div class="comment-page flex flex-col my-5 hidden mb-10">
                        <label for="comentario" class="flex flex-col text-gray-400 text-sm">
                            Comentário (opcional)
                            <textarea
                                class="border resize-none shadow-md rounded-sm outline-none p-1 text-gray-600 mt-4"
                                name="comentario" id="comentario" cols="30" rows="10"></textarea>
                        </label>
                        <input type="hidden" name="servico_id" id="servico_id" value="{{ $servico->id }}">
                        <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}">
                        <button
                            onclick="avaliar(event)"
                            class="w-1/2 py-2 bg-blue-400 hover:bg-blue-500 mt-5 rounded-md text-center uppercase font-bold text-white text-sm">
                            Enviar
                        </button>
                    </div>
                </div>
            @endif
        </div>
    @elseif(! $servico->valor_final)
        <div class="mt-24 flex flex-col gap-3 w-1/2">
            <h1 class="mb-5 text-xl font-medium uppercase italic">
                Fazer proposta de <span class="text-blue-400 font-bold">orçamento</span>
            </h1>

            @if(! $transportadora)
                <span class="text-sm text-gray-700">
                Esperando transportadora
            </span>
            @else
                @if($ultimoOrcamento->feita_por === 'Cliente')
                    <p class="text-sm text-gray-500">
                        Você ofereceu o orçamento de {{ $ultimoOrcamento->proposta }} para a Transportadora,
                        aguarde enquanto os responsáveis pelo transporte escolham entre aceitar sua proposta
                        ou recusar, fique tranquilo, nós te avisaremos quando estiver tudo pronto.
                    </p>

                    @if(! $orcamentos->isEmpty())
                        <hr class="my-10">
                        <h2 class="text-md italic uppercase">Orçamentos</h2>
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
                                <th scope="col"
                                    class="text-blue-400 text-center text-sm font-semibold px-6 py-4 text-left">
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
                    @endif

                    <hr class="my-10">
                    <h2 class="text-md italic uppercase">Entregadores</h2>

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
                @else
                    <div class="flex flex-col border p-5 shadow-md rounded-md">
                        <p class="text-sm mb-20 text-gray-700">Olá, {{ auth()->user()->nome }}, está insatisfeito com o
                            valor de transporte oferecido pela transportadora? Saiba que é possível negociar o valor
                            final do transporte em poucos instantes, confira abaixo:</p>

                        <p class="text-sm italic mb-2 mt-4">Valor oferecido
                            ({{ $ultimoOrcamento->feita_por }})
                        </p>
                        <span class="text-sm text-gray-700 italic">{{ $servico->valor_proposta }}</span>

                        <p class="text-sm italic mb-2 mt-10">Sua proposta de valor final</p>
                        <input type="hidden" name="proposta_transportadora" id="proposta_transportadora"
                               value="{{ $servico->valor_proposta }}">
                        <input
                            onkeyup="setMask(event)"
                            placeholder="R$" class="border-b border-blue-400 outline-none text-gray-700 w-1/2"
                            type="text" name="proposta_cliente" id="proposta_cliente">

                        <input type="hidden" name="servico_id" id="servico_id" value="{{ $servico->id }}">
                        <input type="hidden" name="transportadora_id" id="transportadora_id"
                               value="{{ $transportadora->id }}">
                        <input type="hidden" name="cliente_id" id="cliente_id" value="{{ auth()->user()->id }}">

                        <div class="flex gap-4">
                            <button
                                onclick="enviarProposta(event)"
                                class="text-white hover:shadow-xl hover:shadow-gray-300 bg-blue-400 mt-10 w-1/2 p-2 rounded-lg">
                                Enviar nova proposta
                            </button>

                            <button
                                onclick="aceitarValor(event, '{{ $servico->id }}')"
                                class="text-white hover:shadow-xl hover:shadow-gray-300 bg-black mt-10 w-1/2 p-2 rounded-lg">
                                Aceitar Valor oferecido
                            </button>
                        </div>
                    </div>

                    @if(! $orcamentos->isEmpty())
                        <hr class="my-10">
                        <h2 class="text-md italic uppercase">Orçamentos</h2>
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
                                <th scope="col"
                                    class="text-blue-400 text-center text-sm font-semibold px-6 py-4 text-left">
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
                    @endif

                    <hr class="my-10">
                    <h2 class="text-md italic uppercase">Entregadores</h2>

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
            @endif
        </div>
    @else
        <div class="mt-24 flex flex-col gap-3 w-1/2">
            <h1 class="mb-5 text-xl font-medium uppercase italic">
                Propostas de <span class="text-blue-400 font-bold">orçamento</span>
            </h1>
            <p class="text-xs text-gray-700 italic">O valor final do serviço já foi combinado como
                <strong>{{ $servico->valor_final }}</strong> <br> não é possível fazer outra negociação.</p>

            @if(! $servico->status_pagamento)
                <a
                    class="mt-10 rounded-md w-1/2 text-center p-3 bg-blue-400 text-white hover:shadow-2xl"
                    href="{{ $handler['preference'] }}">
                    Efetuar Pagamento
                </a>
            @endif

            @if(! $orcamentos->isEmpty())
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

                    <hr class="my-10">
                    <h2 class="text-md italic uppercase">Entregadores</h2>

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
                </div>
            @endif
        </div>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/visualizar_servico.js') }}"></script>
</body>
</html>

