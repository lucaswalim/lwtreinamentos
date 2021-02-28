<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- JavaScript Bundle with Popper -->
    <style>
        .bgLucas {
            background-color: #f6f6f6;
        }

        .menu {
           // background-color: #b6e5d4;
            background-color: #D3DCE3;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Treinamentos</title>
</head>
<body class="bgLucas">

<nav class="navbar navbar-expand-lg navbar-light menu">
    <div class="container-fluid d-flex">
        <h3 class="text-black-50"> LW Treinamentos</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex" >

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn btn-primary"> Pessoa </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/pessoas/criar">Cadastrar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/pessoas">Listar</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn btn-primary"> Sala de Aula </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/salas/criar">Cadastrar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/salas">Listar</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn btn-primary">Sala de Café </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/cafe/criar">Cadastrar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/cafe">Listar</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link " href="/salas/etapas">
                        <button class="btn btn-danger">Separar Etapas </button>
                    </a>

                </li>
            </ul>


        </div>
    </div>
</nav>



    <div class="container">


        <h1 class="h1 mb-4 mt-3">
            <?php echo $__env->yieldContent('titulo'); ?>
        </h1>



        <div>
            <?php echo $__env->yieldContent('conteudo'); ?>
        </div>

        </div>

</body>
</html>
<?php /**PATH C:\Users\lucas\Desktop\Treinamentos\Treinamentos\resources\views/layout.blade.php ENDPATH**/ ?>