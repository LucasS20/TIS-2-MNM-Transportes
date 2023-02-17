<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
</head>
<body>
    <x-navbar-cliente></x-navbar-cliente>

    <div class="flex justify-center items-center relative">
        <h1 class="absolute text-center left-0 right-0 mx-auto my-auto z-10 text-3xl text-white italic font-bold">
            Bem vindo de volta, <span class="capitalize text-blue-500">{{ auth()->user()->nome }}</span>
        </h1>

        <img
            draggable="false"
            class="w-full h-72 object-cover brightness-50"
            src="{{ asset('img/usuario_dashboard.jpg') }}" alt="imagem representativa">
        </div>
    </div>

    <main class="mt-28 p-10">
        <div>
            <h1 class="mb-5 text-2xl font-medium uppercase italic">
                Meus <span class="text-blue-400 font-bold">serviços em andamento</span>
            </h1>

            @if(! $servicosIncompletos->isEmpty())
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full border shadow-lg rounded-md">
                                    <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Endereço Retirada
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Endereço entrega
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Valor Final
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($servicosIncompletos as $servico)
                                        <tr
                                            onclick="window.location.href = '{{ route('visualizar.servico', ['id' => $servico->id]) }}'"
                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $servico->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->endereco_retirada }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->endereco_entrega }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->valor_final ?? "Ainda não combinado" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-5 flex justify-start items-center">
                                    {{ $servicosIncompletos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-sm mb-10 italic text-gray-700">Nenhum serviço encontrado.</p>
            @endif
        </div>

        <div class="mt-32">
            <h1 class="mb-5 text-2xl font-medium uppercase italic">
                Meus <span class="text-blue-400 font-bold">serviços finalizados</span>
            </h1>

            @if(! $servicosCompletos->isEmpty())
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full border shadow-lg rounded-md">
                                    <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Endereço Retirada
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Endereço entrega
                                        </th>
                                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                                            Valor Final
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($servicosCompletos as $servico)
                                        <tr
                                            onclick="window.location.href = '{{ route('visualizar.servico', ['id' => $servico->id]) }}'"
                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $servico->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->endereco_retirada }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->endereco_entrega }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $servico->valor_final }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-5 flex justify-start items-center">
                                    {{ $servicosCompletos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-sm mb-10 italic text-gray-700">Nenhum serviço encontrado.</p>
            @endif
        </div>

        <div class="mt-32">
            <h1 class="text-2xl font-medium uppercase italic">
                Minhas <span class="text-blue-400 font-bold">avaliações</span>
            </h1>

            @if(! $avaliacoes->isEmpty())
                <table class="min-w-full border shadow-lg rounded-md mt-10">
                    <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                            Número do serviço
                        </th>
                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                            Avaliação
                        </th>
                        <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                            Comentário
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($avaliacoes as $avaliacao)
                        <tr
                            onclick="window.location.href = '{{ route('visualizar.servico', ['id' => $servico->id]) }}'"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $avaliacao->id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $avaliacao->servico_id }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $avaliacao->nota }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-ellipsis overflow-x-hidden max-w-4xl">
                                {{ ! empty($avaliacao->comentario) ?  $avaliacao->comentario : "Nenhum comentário." }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-5 flex justify-start items-center">
                    {{ $avaliacoes->links() }}
                </div>
            @else
                <p class="text-sm mt-5 italic text-gray-700">Nenhuma avaliação encontrada.</p>
            @endif
        </div>
    </main>
</body>
</html>
