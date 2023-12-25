<?php 
include("../../path.php");
include("../../../app/database/db.php");
include("../../../app/controllers/users.php");
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
<?php include("../../../app/include/header.php");?>
<!--Блок верхней панели END-->

<!--Основной блок START-->
<div class="container">
    <div class="row title-table">
        <h2>Редактировать пользователя</h2>
    </div>
    <div class="row edit-user">
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>
        <form action="edit.php" method="post">
            <input name="user_id" value="<?=$user_id;?>" type="hidden">
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Логин</label>
                <input name="login" value="<?=$login;?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин...">
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" value="<?=$email;?>" type="email" class="form-control" readonly id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
            </div>
            <div class="col">
                <label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
                <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
            </div>
            <div class="col">
                <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите ваш пароль...">
            </div> 
            <input name="accsess" class="form-check-input" value="false" type="hidden"> 
            <input name="accsess" class="form-check-input" value="true" type="checkbox" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked" >
                Заблокировать доступ
            </label>
            <input name="user_type_id" class="form-check-input" value="false" type="hidden"> 
            <input name="user_type_id" class="form-check-input" value="true" type="checkbox" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked" >
                Admin?
            </label>
            <div class="col">
                <button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
            </div>
        </form>
    </div>
</div>
<!--Основной блок END-->

<!--Блок нижней панели START-->
<?php include("../../../app/include/footer.php");?>
<!--Блок нижней панели END-->   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body> 
</html>