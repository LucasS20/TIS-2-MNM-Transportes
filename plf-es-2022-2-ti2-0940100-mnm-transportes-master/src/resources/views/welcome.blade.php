<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MNM Transportes</title>
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
    <nav class="flex h-20 justify-between items-center px-20 w-full shadow-lg fixed">
        <div>
            <img src="/img/Logo.png" class="w-40" alt="logo mnm">
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

        <a
            href="{{ route('login') }}"
            class="rounded-full border border-blue-500 px-14 py-2 text-blue-600 text-sm font-medium hover:bg-blue-500 hover:text-white"
        >Entrar</a>
    </nav>

    <main class="flex justify-between w-full h-screen items-center px-20">
        <section class="w-1/2">
            <h1 class="uppercase font-light italic text-5xl">Sua <span class="font-semibold text-blue-400">Mudança</span><br>Nosso <span class="font-semibold text-blue-400">Trabalho</span></h1>
            <p class="mt-5 text-sm text-gray-500">
                Somos uma equipe de intermediadores para suas mudanças, sejam elas de pequena ou larga escala. Deseja enviar uma mesa para seu novo apartamento? Faça o orçamento com nossos parceiros. Seus pertences e itens de viagens serão assegurados em nosso sistema, garantindo que nenhum item seja danificado ou perdido durante o transporte. Agende já sua mudança!
            </p>
            <a href="{{ route('login') }}">
                <button
                    class="text-white bg-blue-400 text-sm text-center px-14 py-2 rounded-full mt-5">
                    Começar
                </button>
            </a>
        </section>
        <section class="w-1/2 flex justify-end items-center">
            <img src="img/lading_image.png" class="w-3/4" alt="imagem representativa">
        </section>
    </main>
</body>
</html>
