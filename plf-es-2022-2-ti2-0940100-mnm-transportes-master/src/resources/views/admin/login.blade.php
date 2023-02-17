<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
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
    <main class="w-full h-screen flex justify-center items-center">
        <form action="{{ route('validar.login.admin') }}" method="post" class="flex flex-col shadow-md border p-10">
            @csrf
            <h1 class="text-center uppercase mb-10">Admin</h1>

            <label class="flex flex-col mb-10" for="username">
                Usuário
                <input class="mt-1 outline-none text-gray-500 border-b border-blue-400" type="text" name="username" id="username">
            </label>
            @error('username')
            <p>{{ $message }}</p>
            @enderror

            <label class="flex flex-col" for="password">
                Senha
                <input class="mt-1 outline-none text-gray-500 border-b border-blue-400" type="password" name="password" id="password">
            </label>
            @error('password')
            <p>{{ $message }}</p>
            @enderror

            <button type="submit" class="mt-5 border rounded-md px-5 py-1 mt-10 text-center border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white">Entrar</button>
        </form>
    </main>
</body>
</html>
