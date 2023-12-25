<?php 
include("../path.php");
include("../../app/database/db.php");
if ($_SESSION['user_type_id'] == 2) {
    header('location: ' . BASE_URL);
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!--Icons-->
    <script src="https://kit.fontawesome.com/0f52588a87.js" crossorigin="anonymous"></script>

    <!--Custom styling-->
    <link rel="stylesheet" href="/assets/css/style.css"> 

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Админ панель</title>
</head>
<body>
<!--Блок верхней панели START-->
<?php include("../../app/include/header.php");?>
<!--Блок верхней панели END-->

<!--Основной блок START-->
<div class="container">
    <h2>Выберите, что необходимо исправить</h2>
    <div class="sidebar col-3">
        <ul>
            <li>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>">Пользователи</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>">Услуги</a>
            </li>
            <!-- <li>
                <a href="<?php echo BASE_URL . "#";?>">Категории</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL . "#";?>">Комментарии</a>
            </li> -->
        </ul>
    </div>
</div>
<!--Основной блок END-->

<!--Блок нижней панели START-->
<?php include("../../app/include/footer.php");?>
<!--Блок нижней панели END-->   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body> 
</html>