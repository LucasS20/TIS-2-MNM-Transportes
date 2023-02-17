<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/contato.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="flex h-20 justify-between items-center px-20 w-full shadow-lg fixed">
        <div>
            <img src="img/Logo.png" class="w-40" alt="logo mnm">
        </div>

        <ul class="flex gap-5">
            <li>
                <a href="/" class="text-sm uppercase font-medium text-blue-600">Página inicial</a>
            </li>
            <li>
                <a href="/contato" class="text-sm uppercase font-medium text-blue-600">Contato</a>
            </li>
            <li>
                <a href="/sobre" class="text-sm uppercase font-medium text-blue-600">Sobre</a>
            </li>
            <li>
                <a href="/trabalhe-conosco" class="text-sm uppercase font-medium text-blue-600">Trabalhe conosco</a>
            </li>
        </ul>

        <a href="{{ route('login') }}"
            class="rounded-full border border-blue-500 px-14 py-2 text-blue-600 text-sm font-medium hover:bg-blue-500 hover:text-white">Entrar
        </a>
    </nav>


    <div id="conteudo">
        <div id="sobre">
            <div id="titulo"></div>
            <h1>  <b>CONTATO </b></h1>
        
            <div class="login-screen">
                <!-- formulário de login -->
                <form class="form">
                    <input type="email" placeholder="Email" class="inputs" />
                    <input type="text" placeholder="Escreva Sua Mensagem" class="inputs" />
                    <button class="btn">Enviar</button>
                </form>
            </div>
        </div>

        <aside class="esquerda">
            <div id="foto">
                <img src="img/conversa.png" alt="">
            </div>
        </aside>
    </div>

</html>
