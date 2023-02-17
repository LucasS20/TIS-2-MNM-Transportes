<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <x-navbar-transportadora></x-navbar-transportadora>

    <a
        onclick="document.querySelector('#modal').classList.toggle('hidden')"
        data-modal-toggle="authentication-modal"
        title="Adicionar funcionário"
        class="fixed z-20 flex items-center justify-center shadow-lg cursor-pointer bottom-4 right-6 text-2xl font-bold bg-green-400 w-10 h-10 rounded-full text-white">
        +
    </a>

    <main class="mt-28 p-10">
        <h1 class="mb-5 text-2xl font-medium uppercase italic">
            Meus <span class="text-blue-400 font-bold">Funcionários</span>
        </h1>

        <div class="w-full mb-4">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Pesquisar</label>
            <div class="relative w-full flex justify-end items-end">
                <div class="w-1/2 relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none" placeholder="Pesquisar nome do funcionário" required>
                    <a
                        id="search"
                        class="cursor-pointer text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pesquisar
                    </a>
                </div>
            </div>
        </div>

        @if(! $funcionarios->isEmpty())
            <table class="min-w-full border shadow-lg rounded-md">
                <thead class="bg-white border-b">
                <tr>
                    <th scope="col" class="text-gray-400 text-sm font-medium px-6 py-4 text-left">
                        #
                    </th>
                    <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                        Nome
                    </th>
                    <th scope="col" class="text-blue-400 text-sm font-semibold px-6 py-4 text-left">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($funcionarios as $funcionario)
                    <tr
                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $funcionario->id }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $funcionario->nome }}
                        </td>
                        <td
                            data-id-funcionario="{{ $funcionario->id }}"
                            onclick="deletarFuncionario(event)"
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <svg
                                class="pointer-events-none"
                                data-id-funcionario="{{ $funcionario->id }}"
                                title="Remover funcionário"
                                xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="16" height="16"
                                 viewBox="0 0 40 40">
                                <path class="pointer-events-none" data-id-funcionario="{{ $funcionario->id }}" fill="#f78f8f" d="M21 24.15L8.857 36.293 4.707 32.143 16.85 20 4.707 7.857 8.857 3.707 21 15.85 33.143 3.707 37.293 7.857 25.15 20 37.293 32.143 33.143 36.293z"></path><path fill="#c74343" d="M33.143,4.414l3.443,3.443L25.15,19.293L24.443,20l0.707,0.707l11.436,11.436l-3.443,3.443 L21.707,24.15L21,23.443l-0.707,0.707L8.857,35.586l-3.443-3.443L16.85,20.707L17.557,20l-0.707-0.707L5.414,7.857l3.443-3.443 L20.293,15.85L21,16.557l0.707-0.707L33.143,4.414 M33.143,3L21,15.143L8.857,3L4,7.857L16.143,20L4,32.143L8.857,37L21,24.857 L33.143,37L38,32.143L25.857,20L38,7.857L33.143,3L33.143,3z"></path>
                            </svg>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-5 flex justify-start items-center">
                {{ $funcionarios->links() }}
            </div>

            @if(request()->input('search'))
                <a
                    class="underline text-blue-400"
                    href="{{ route('visualizar.funcionarios') }}">Listar todos</a>
            @endif
        @else
            <p class="text-sm italic text-gray-700">Nenhum funcionário encontrado</p>
        @endif
    </main>

    <div
        class="fixed top-0 h-full w-full left-0 flex justify-center items-center z-50 bg-black bg-opacity-70 hidden" id="modal">
        <div class="bg-white rounded-md shadow-lg p-10 flex flex-col justify-center items-center relative w-1/2">
            <div
                onclick="document.querySelector('#modal').classList.toggle('hidden')"
                class="absolute top-2 right-4 cursor-pointer font-bold">
                x
            </div>

            <h1 class="text-lg font-medium uppercase italic self-start">
                Cadastrar <span class="text-blue-400 font-bold">Funcionário</span>
            </h1>

            <form action="" class="w-full mt-24">
                <label for="nome" class="flex flex-col w-full text-sm">
                    Nome do Funcionário
                    <input type="text" name="nome" id="nome" class="border-b border-blue-400 outline-none text-gray-600 mt-4">
                </label>

                <input type="hidden" value="{{ auth()->user()->id }}" name="transportadora_id" id="transportadora_id">

                <button
                    onclick="cadastrarFuncionario(event)"
                    type="submit"
                    class="mt-10 text-sm py-3 px-10 bg-blue-400 text-white text-center rounded-md outline-none uppercase">

                    Cadastrar
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
    <script src="{{ asset('js/funcionarios.js') }}"></script>
</body>
</html>
