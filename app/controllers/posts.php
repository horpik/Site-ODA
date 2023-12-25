<?php

$errMsg = '';
function selectAllProduct(){
    global $pdo;
    $sql = "SELECT service_id, name, description, price, path 
            FROM `services`
            JOIN photos USING (photo_id)";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();   
}
function getPhotoPath($id){
    global $pdo;
    $sql = "SELECT path FROM photos
            WHERE photo_id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetch();
}
function selectAllProductForAdmin() {
    global $pdo;
    $sql = "SELECT * FROM `services`";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

// редактирование услуги через админ панель. загрузка данных
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $service = selectOne('services', ['service_id' => $_GET['edit_id']]);
    $service_id =  $service['service_id'];
    $name =  $service['name'];
    $description = $service['description'];
    $price = $service['price'];
    $photo_id = $service['photo_id'];
    // tt($service);
    // tt($description);
    // exit();
}

// удаление услуги через админ панель
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $service_id = $_GET['delete_id'];
    delete('services', 'service_id', $service_id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}


// обновление услуги по нажатии кнопки
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-post'])){
    $service_id =  $_POST['service_id'];
    $name =  trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    // $photo_id = trim($_POST['photo_id']);

    if($name === '' || $description === '' || $price === ''|| $photo_id === ''){
        $errMsg= "Не все поля заполнены!";
    } else{
        $post = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            // 'photo_id' => $photo_id
        ];

        $post = update('services', 'service_id', $service_id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
}

// добавление услуги через админ панель
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-post'])){
    echo "ECHO!";
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $photo_id = trim($_POST['photo_id']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }else{
        $existence1 = selectOne('photos', ['photo_id' => $photo_id]);
        if(empty($existence1['photo_id'])){
            $errMsg = 'Данного photo id не существует';
        } else {
            $post = [
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'photo_id' => $photo_id
            ];
            $id = insert('services', $post);
            $user = selectOne('services', ['service_id' => $id]);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['service_id'])){
    $service = selectOne('services', ['service_id' => $_GET['service_id']]);
    
    $service_id =  $service['service_id'];
    $name =  $service['name'];
    $description = $service['description'];
    $price = $service['price'];
    $photo_id = $service['photo_id'];
    $path = getPhotoPath($photo_id)['path'];
}