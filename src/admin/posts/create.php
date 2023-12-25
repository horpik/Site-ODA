<?php 
include("../../path.php");
include("../../../app/database/db.php");
include("../../../app/controllers/posts.php");
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
        <h2>Создать услугу</h2>
    </div>
    <div class="row create-post">
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>
        <form action="create.php" method="post">
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Название услуги</label>
                <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите название услуги...">
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Описание услуги</label>
                <input name="description" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите описание услуги...">
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">Цена услуги</label>
                <input name="price" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите цену услуги...">
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label">ID фотографии услуги</label>
                <input name="photo_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ID фотографии услуги...">
            </div>
            <div class="col">
                <button name="create-post" class="btn btn-primary" type="submit">Создать</button>
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