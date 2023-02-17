<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Transportadora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
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
    <nav class="flex items-center justify-center w-full h-16">
        <a href="/">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="w-32">
        </a>
    </nav>
    <main class="flex mt-20 px-20">
        <section class="w-1/2">
            <img src="{{ asset('img/login-animate.svg') }}" alt="Imagem representativa" class="w-3/4">
        </section>
        <section class="w-1/2 flex items-center justify-center">
            <form action="" class="border rounded-md shadow-lg p-10 h-75 flex flex-col w-75" onsubmit="login(event)">
                <h1 class="text-md text-center uppercase mb-16">Fazer Login | Transportadora</h1>
                <label for="cnpj" class="flex flex-col gap-2 mb-10">
                    CNPJ
                    <input type="text" name="cnpj" id="cnpj" class="outline-none border-b border-lightMNM">
                </label>

                <label for="senha" class="flex flex-col gap-2 mb-10">
                    Senha
                    <input type="password" name="senha" id="senha" class="outline-none border-b border-lightMNM">
                </label>

                <div class="text-xs flex flex-col">
                    <p class="mb-2">Não possui perfil? <a class="text-lightMNM underline" href="{{ route('cadastro.transportadora') }}">Crie aqui</a></p>
                    <p>Entrar como <a class="text-lightMNM underline" href="{{ route('login') }}">Cliente</a></p>
                </div>

                <button type="submit" class="mt-10 py-2 px-3 bg-lightMNM text-white text-center rounded-md uppercase">Entrar</button>
            </form>
        </section>
    </main>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/login_transportadora.js') }}"></script>
</body>
</html>
