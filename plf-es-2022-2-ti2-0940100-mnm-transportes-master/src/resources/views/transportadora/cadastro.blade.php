<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Transportadora</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        lightMNM: '#00b4d8'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
<nav class="flex items-center justify-center w-full h-12">
    <a href="/">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="w-32">
    </a>
</nav>
<main class="flex px-20">
    <section class="w-1/2">
        <img src="{{ asset('img/sign-in-animate.svg') }}" alt="Imagem representativa" class="w-3/4">
    </section>
    <section class="w-1/2 flex items-center justify-center">
        <form action="" class="border rounded-md shadow-lg mb-10 h-75 p-10 flex flex-wrap w-3/4" onsubmit="cadastro(event)">
            <h1 class="text-md text-center uppercase mb-12 w-full">Efetuar Cadastro | Transportadora</h1>

            <div class="w-full">
                <label for="nome_transportadora" class="flex flex-col gap-2 mb-10 text-sm">
                    Nome da Transportadora
                    <input type="text" name="nome_transportadora" id="nome_transportadora" class="text-sm text-gray-700 outline-none border-b border-lightMNM w-full">
                </label>
            </div>

            <div class="flex gap-10 w-full">
                <label for="cnpj" class="flex flex-col gap-2 mb-10 w-1/2 text-sm">
                    CNPJ
                    <input type="text" name="cnpj" id="cnpj" class="text-sm text-gray-700 outline-none border-b border-lightMNM">
                </label>

                <label for="telefone" class="flex flex-col gap-2 mb-10 w-full text-sm">
                    Telefone
                    <input type="tel" name="telefone" id="telefone" class="text-sm w-full text-gray-700 outline-none border-b border-lightMNM">
                </label>
            </div>

            <div class="w-full">
                <label for="email_transportadora" class="flex flex-col gap-2 mb-10 text-sm">
                    Email
                    <input type="email" name="email_transportadora" id="email_transportadora" class="text-sm text-gray-700 outline-none border-b border-lightMNM w-full">
                </label>
            </div>

            <div class="flex gap-10 w-full">
                <label for="senha" class="flex flex-col gap-2 mb-10 w-1/2 text-sm">
                    Senha
                    <input type="password" name="senha" id="senha" class="text-sm text-gray-700 outline-none border-b border-lightMNM">
                </label>

                <label for="senha_confirmation" class="flex flex-col gap-2 mb-10 w-full text-sm">
                    Confirme a senha
                    <input type="password" name="senha_confirmation" id="senha_confirmation" class="w-full text-sm text-gray-700 outline-none border-b border-lightMNM">
                </label>
            </div>

            <div class="text-xs flex flex-col">
                <p class="mb-2">Já possui cadastro? <a class="text-lightMNM underline" href="{{ route('login.transportadora') }}">Crie aqui</a></p>
            </div>

            <div class="w-full flex justify-center items-center">
                <button type="submit" class="mt-10 bg-lightMNM text-white text-center w-1/2 uppercase py-3 rounded-md">Cadastrar</button>
            </div>
        </form>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/cadastro_transportadora.js') }}"></script>
</body>
</html>
