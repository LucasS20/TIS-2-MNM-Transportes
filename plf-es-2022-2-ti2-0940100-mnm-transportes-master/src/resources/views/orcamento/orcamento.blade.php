<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios | MNM Transortes</title>
    <link rel="stylesheet" href="orcamento.style.css">
    <link rel="stylesheet" href="../andre-pages.styles.css">
</head>
<body>
<header class="header-container">
    <img src="../img/Logo.png" alt="logo"/>
</header>
<main class="main-container">
    <div class="info-container">
        <h1>Orçamento</h1>
    </div>
    <div class="divider-vertical"></div>
    <form class="form-orcamento">
        <label id="valorlabel" class="label" for="valorInput">Valor:</label>
        <input type="number" pattern="[0-9]+([,\.][0-9]+)?" placeholder="0,00" value="0,00" min="0" id="valorInput" class="valor" required/>

        <label id="comentarioLabel" class="label" for="comentarioInput">Comentarios:</label>
        <textarea placeholder="..." id="comentarioInput" class="text-area" required></textarea>

        <input type="submit" class="btn-orcamento" placeholder="enviar" id="orcamento"/>
    </form>
</main>
<script src="orcamento.js"></script>
</body>
</html>
