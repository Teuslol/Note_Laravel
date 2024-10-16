<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Dropdown</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            padding: 10px 20px;
        }

        .logo {
            color: white;
            font-size: 20px;
        }

        .logo img {
            width: 60px; /* Altere para a largura desejada */
            height: auto; /* Mantém a proporção da imagem */
            border-radius: 5px;
        }

        .icons {
            display: flex;
            position: relative;
        }

        .icon {
            color: white;
            font-size: 24px;
            margin-left: 20px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 5px;
            transition: color 0.3s, border-color 0.3s;
            cursor: pointer;
            width: 100px; /* Largura fixa */
            height: 60px; /* Altura fixa */
            display: flex; /* Centralizar o conteúdo */
            align-items: center;
            justify-content: center;
        }

        .icon:hover {
            color: black;
            border-color: white;
            background-color: white;
            border-radius: 5px;
        }

        .dropdown {
        display: none; /* Inicialmente oculto */
        position: absolute;
        top: 100%; /* Coloca abaixo do navbar */
        right: 0; /* Alinha à direita da tela */
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
        z-index: 1000;
        min-width: 150px; /* Largura mínima do dropdown */
        max-width: calc(33.33vw - 20px); /* Limita a largura a 1/3 da tela menos a margem */
    }



        .dropdown-item {
            padding: 10px;
            color: black;
            text-decoration: none;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #000000; /* Cor de fundo ao passar o mouse */
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar" role="navigation" aria-label="Main Navigation">
            <div class="logo"><img src="<?php echo e(asset('assets/images/logote.png')); ?>" alt="logotipo"></div>
            <div class="icons">
                <div class="icon" aria-label="Home">Casa</div>
                <div class="icon" aria-label="Search">Pesquisa</div>
                <div class="icon" aria-label="Profile">Perfil</div>
                <div class="icon" aria-label="Logout">Logout</div>
                <div class="icon" aria-label="Options" id="dropdownToggle">Opções</div>
            </div>
        </nav>
        <div class="dropdown" id="dropdownMenu">
            <a href="/index.asp" class="dropdown-item">1 - Página Principal</a>
            <a href="/eaa/canais/acordos/front_acordosNEW.asp" class="dropdown-item">2 - Acordos</a>
            <a href="/Homologacao/login.aspx" class="dropdown-item">3 - Agendamento de Validação de Cálculos Rescisórios</a>
            <a href="/TabelaVcr.asp" class="dropdown-item">4 - Documentos para Validação de Cálculos Rescisórios</a>
            <a href="/Associados.asp" class="dropdown-item">5 - Associe-se</a>
            <a href="#" class="dropdown-item">6 - Banco de Currículos</a>
            <a href="#" class="dropdown-item">7 - Boleto</a>
            <a href="#" class="dropdown-item">8 - Cadastre sua Empresa</a>
        </div>
    </header>
    <div>
        <?php echo $__env->yieldContent('corpo'); ?>
    </div>

    <script>
        const dropdownToggle = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownToggle.addEventListener('click', function(event) {
            event.stopPropagation(); // Impede o clique de fechar o dropdown imediatamente
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function() {
            dropdownMenu.style.display = 'none'; // Fecha o dropdown ao clicar fora
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\bloconotas\resources\views/layouts/navibar_layout.blade.php ENDPATH**/ ?>