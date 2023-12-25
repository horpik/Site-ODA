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
    <div class="posts">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-5 btn btn-success">Создать</a>   
            </div>
            <div class="row title-table">
                <h2>Посты</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Название услуги</div>
                <div class="col-2">Описание</div>
                <div class="col-1">Цена</div>
                <div class="col-2">ID фотографии</div>
            </div>
            <?php
            $services = selectAllProductForAdmin();
            if ($services) {
                foreach ($services as $row) {
                    echo '<div class="row post">';
                    echo '<div class="col-1">'.$row['service_id'].'</div>';
                    echo '<div class="col-2">'.$row['name'].'</div>';
                    echo '<div class="col-2">'.$row['description'].'</div>';
                    echo '<div class="col-1">'.$row['price'].'</div>';
                    echo '<div class="col-2 path">'.$row['photo_id'].'</div>';
                    echo '<div class="edt col"><a href="edit.php?edit_id='.$row['service_id'].'">edit</a></div>';
                    echo '<div class="del col-2"><a href="index.php?delete_id='.$row['service_id'].'">delete</a></div>';
                    echo '</div>';
                }
            } 
            ?>
        </div>
</div>
<!--Основной блок END-->

<!--Блок нижней панели START-->
<?php include("../../../app/include/footer.php");?>
<!--Блок нижней панели END-->   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body> 
</html>