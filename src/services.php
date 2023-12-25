<?php 
include("path.php");
include("../app/database/db.php");
include("../app/controllers/posts.php");
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


    <title>Услуги</title>
</head>
<body>
<!--Блок верхней панели START-->
<?php include("../app/include/header.php");?>
<!--Блок верхней панели END-->

<!--Блок основной START-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Наши Услуги</h2>
    </div>
    <div class="row services">
        <?php 
            $services = selectAllProduct();
            if ($services) {
                foreach ($services as $row) {
                    echo '<a href="single.php?service_id='.$row['service_id'].'" class="card" style="width: 18rem;">';
                    echo '<img src="'.$row["path"].'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">'.$row["name"].'</p>';
                    echo '<p class="card-text">'.$row["price"].' р.</p>';
                    echo '</div>';
                    echo '</a>'; 
                }
            } else {
                echo "0 товаров";
            }
        ?>
    </div>
</div>
<!--Блок основной END-->
<div class="w-100 del"></div>

<!--Блок нижней панели START-->
<?php include("../app/include/footer.php");?>
<!--Блок нижней панели END-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>    
</html>