<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/Logo.ico') }}" />
</head>
<body>
<header>
    <div class="logo">
        <a href="/">
            <img src="img/Logo.png" alt="">
        </a>
    </div>
</header>
<div class="main-login">
    <div class="left-login">
        <img src="img/login-animate.svg" class="left-login-image" alt="Animação login">
    </div>
    <div class="right-login">
        <div class="card-login">
            <h1>Fazer Login | Cliente</h1>

            <div id="msgError"></div>
            <div id="msgSucces"></div>

            <div class="textfield">
                <label for="usuario">Email</label>
                <input id="usuario" type="text" name="usuario">
            </div>
            <div class="textfield">
                <label for="senha">Senha</label>
                <input autocomplete="off" id="senha" type="password" name="senha">
            </div>
            <div class="register">
                <p>Novo por aqui? <a href="{{ route('cadastro.cliente') }}" >Crie uma conta!</a></p>
                <p>Entrar como <a href="{{ route('login.transportadora') }}" >Transportadora</a></p>
            </div>
            <button onclick="login()" class="btn-login">Entrar</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/login_cliente.js"></script>
</div>
</body>
</html>
