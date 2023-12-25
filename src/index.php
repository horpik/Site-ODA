<?php 
include("path.php");
include("../app/database/session.php");
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


    <title>Главная страница</title>
</head>
<body>

<!--Блок верхней панели START-->
<?php include("../app/include/header.php");?>
<!--Блок верхней панели END-->

<!--Блок карусели START-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Наши работы</h2>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="/assets/images/photo1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/assets/images/photo2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/assets/images/photo3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!--Блок карусели END-->

<!--Блок основной START-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Наши сотрудники</h2>
    </div>
    <div class="d-flex justify-content-around">
        <div class="card" style="width: 18rem;">
            <img src="/assets/images/empl1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Дорофеева Полина</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="/assets/images/empl2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Данилова Марина</p>
            </div>
        </div>
    </div>
</div>
<!--Блок основной END-->

<!--Блок нижней панели START-->
<?php include("../app/include/footer.php");?>
<!--Блок нижней панели END-->   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body> 
</html>