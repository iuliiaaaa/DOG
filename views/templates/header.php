<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style.services.css">
    <link rel="stylesheet" href="/assets/css/style.auth.css">
    <link rel="stylesheet" href="/assets/css/style.masters.css">
    <link rel="stylesheet" href="/assets/css/style.profile.css">
    <link rel="stylesheet" href="/assets/css/style.application.css">
    <link rel="stylesheet" href="/assets/css/style.reg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>

<body>
    <div class="padding">
        <nav class="navbar header-for-desktop">
            <div class="container-fluid">
                <a href="/" class="navbar-brand"><img class="nav-link header-img" src="/upload/logo.png" alt="DOG"></a>
                <form class="d-flex header-user" role="search">
                    <a href="/app/tables/products/services.php?category=1" class="nav-link" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        услуги и цены
                    </a>
                    <a href="/app/tables/products/masters.php" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        мастера
                    </a>
                    <a href="/#about-us" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        о нас
                    </a>
                    <a href="/#card-index" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        контакты
                    </a>
                    <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>
                        <a href="/app/tables/users/auth.php" class="nav-link">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            войти
                        </a>
                    <?php else : ?>
                        <a href="/app/tables/users/profile.php" class="nav-link">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            профиль
                        </a>
                    <?php endif ?>
                    <a href="#" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        ул. Российская, д. 194
                    </a>
                </form>
            </div>
        </nav>
        <nav class="navbar header-for-mobile">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img class="nav-link header-img" src="/upload/logo.png" alt="DOG"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><img class="nav-link header-img" src="/upload/logo.png" alt=""></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <a class="nav-link" aria-current="page" href="/app/tables/products/services.php?category=1">Услуги и цены</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/app/tables/products/masters.php">Мастера</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/app/tables/products/masters.php">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/app/tables/products/masters.php">Контакты</a>
                            </li>
                            <li class="nav-item">
                                <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>
                                    <a href="/app/tables/users/auth.php" class="nav-link">

                                        <use xlink:href="#people-circle"></use>

                                        Войти
                                    </a>
                                <?php else : ?>
                                    <a href="/app/tables/users/profile.php" class="nav-link">

                                        Профиль
                                    </a>
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>