<footer>
    <div class="padding">
        <nav class="navbar">
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
                    <a href="#" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        о нас
                    </a>
                    <a href="#" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        контакты
                    </a>
                    <!-- <a href="#" class="nav-link">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        +7-999-999-99-99
                    </a> -->
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
                    <a href="#" class="nav-link adress">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        ул. Российская, д. 194
                    </a>
                </form>
            </div>
        </nav>
</footer>
</div>
</body>

</html>