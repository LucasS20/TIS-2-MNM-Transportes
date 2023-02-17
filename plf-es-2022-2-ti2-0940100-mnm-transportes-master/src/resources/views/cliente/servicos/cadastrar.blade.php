<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Serviço</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
</head>
<body>
    <x-navbar-cliente></x-navbar-cliente>

    <main class="mt-28 p-10">
        <h1 class="text-3xl italic uppercase">Novo <span class="text-blue-400 font-semibold">serviço</span></h1>

        <form action="" class="mt-20 w-full flex flex-wrap">
            <input type="hidden" name="cliente_id" id="cliente_id" value="{{ auth()->user()->id }}">

            <div class="flex flex-col w-1/2 gap-10">
                <label for="endereco_retirada" class="flex flex-col w-1/2">
                    Endereço de Retirada
                    <input class="border-b border-blue-400 my-2 outline-none text-gray-700" type="text" name="endereco_retirada" id="endereco_retirada">
                </label>

                <label for="endereco_entrega" class="flex flex-col w-1/2">
                    Endereço de Entrega
                    <input class="border-b border-blue-400 my-2 outline-none text-gray-700" type="text" name="endereco_entrega" id="endereco_entrega">
                </label>
            </div>

            <div class="flex flex-col w-1/2 gap-10">
                <label for="data" class="flex flex-col w-1/2">
                    Data do transporte
                    <input type="date" name="data" id="data" class="outline-none border-b border-blue-400 my-2">
                </label>

                <label for="quantidade_itens" class="flex flex-col w-1/2">
                    Quantidade de Itens
                    <input type="number" min="1" name="quantidade_itens" id="quantidade_itens" class="outline-none border-b border-blue-400 my-2">
                </label>
            </div>

            <div class="flex gap-3 mt-32">
                <button onclick="cancelar(event)" class="uppercase outline-none px-20 py-2 border rounded-md text-red-500 border-red-500 hover:bg-red-500 hover:text-white">Cancelar</button>
                <button onclick="cadastrar(event)" type="submit" class="uppercase outline-none px-20 py-2 border rounded-md text-blue-500 border-blue-500 hover:bg-blue-500 hover:text-white">Cadastrar</button>
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/cadastro_servico.js"></script>
</body>
</html>
