<header class="container-fluid fixed-top">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    <a href="<?php echo BASE_URL ?>" class="home-link">
                        <i class="fa-solid fa-house"></i>
                        Главная
                    </a>                        
                </h1>
            </div>
            <div class="col-8">
                <ul class="main-menu">
                    <li>
                        <a href="<?php echo BASE_URL ?>">
                            Главная
                        </a>
                    </li>   
                    <li>
                        <a href="<?php echo BASE_URL . 'services.php'?>">
                            Услуги
                        </a>
                    </li>
                    <li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="<?php echo BASE_URL . '#'?>" class="user-link">
                                <i class="fa-regular fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <a href="<?php echo BASE_URL . '../app/controllers/logout.php'?>">Выход</a>
                            <?php if($_SESSION['user_type_id'] === '1'): ?>
                                <a href="<?php echo BASE_URL . 'admin/index.php'?>" class="admin-link">
                                    <i class="fa-solid fa-user-tie"></i>
                                    Админ панель
                                </a>
                            <?php endif; ?>
                        <?php else:?>
                            <a href="<?php echo BASE_URL . 'reg.php'?>" class="user-link">
                                <i class="fa-regular fa-user"></i>
                                Регистрация
                            </a>
                            <a href="<?php echo BASE_URL . 'aut.php'?>" class="user-link">
                                <i class="fa-regular fa-user"></i>
                                Авторизация
                            </a>
                        <?php endif;?>
                    </li>
                </ul>
            </div>    
        </div>
    </div>
</header>
<div class="w-100 del"></div>