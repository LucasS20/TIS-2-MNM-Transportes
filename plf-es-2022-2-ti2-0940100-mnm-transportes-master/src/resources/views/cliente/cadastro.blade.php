<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro_cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <main class="flex w-full h-screen items-center px-20">

        <section class="w-1/2 flex justify-center items-center">
            <img src="img/sign-in-animate.svg" class="w-3/4" alt="imagem representativa">
        </section>

        <section class="w-1/2 flex justify-end">
            <form action="" class="shadow-xl shadow-slate-200 border p-10 w-4/5 rounded-lg">
                <h1 class="text-center uppercase">Efetuar Cadastro</h1>

                <div class="flex flex-wrap mt-10 gap-5">
                    <label class="text-sm flex gap-1 flex-col m-1 w-full" for="email">
                        Email
                        <input autocomplete="off" type="email" name="email" id="email" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>

                    <label class="text-sm flex gap-1 flex-col m-1" for="nome_completo">
                        Nome
                        <input type="text" name="nome_completo" id="nome_completo" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>

                    <label class="text-sm flex gap-1 flex-col m-1" for="telefone">
                        Telefone
                        <input type="tel" name="telefone" id="telefone" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>

                    <label class="text-sm flex gap-1 flex-col m-1" for="cpf">
                        CPF
                        <input type="text" name="cpf" id="cpf" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>
                </div>

                <div class="mt-10 flex">
                    <label class="text-sm flex gap-1 flex-col m-1 w-full" for="senha">
                        Senha
                        <input type="password" name="senha" id="senha" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>

                    <label class="text-sm flex gap-1 flex-col m-1 w-full" for="senha_confirmation">
                        Confirmar Senha
                        <input type="password" name="senha_confirmation" id="senha_confirmation" class="border-b border-lightMNM outline-none text-gray-600">
                    </label>
                </div>

                <div class="mt-10">
                    <span class="text-sm">
                        Já possui cadastro? <a class="text-lightMNM underline" href="{{ route('login') }}">Efetue login</a>
                    </span>
                </div>

                <div class="flex justify-center mt-20">
                    <button
                        onclick="cadastrar(event)"
                        class="w-full text-center border border-lightMNM text-lightMNM p-2 rounded-md uppercase text-sm hover:bg-lightMNM hover:text-white">
                        Cadastrar
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/cadastro_cliente.js"></script>
</body>
</html>
