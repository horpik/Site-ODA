<?php 
    include("path.php");
    include("../app/database/db.php");
    include("../app/controllers/users.php");
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


    <title>Авторизация</title>
</head>
<body>

<!--Блок верхней панели START-->
<?php include("../app/include/header.php");?>
<!--Блок верхней панели END-->

<!--Форма авторизации START-->
<div class="container-fluid reg-form">
    <form action="aut.php" method="post" class="row d-flex justify-content-center" >
        <h2 class="col-12">Форма авторизации</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>    
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин..">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль..">
        </div>
        <div class="w-100"></div>
        <div class="md-3 col-12 col-md-4">
            <button type="submit" class="btn btn-primary" name="button-aut">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>
<!--Форма авторизации END-->

<!--Блок нижней панели START-->
<?php include("../app/include/footer.php");?>
<!--Блок нижней панели END-->   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body> 
</html>