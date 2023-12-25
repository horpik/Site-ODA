<?php

$errMsg = '';
function selectAllUsers(){
    global $pdo;
    $sql = "SELECT user_id, login, email, description 
            FROM `users`
            JOIN user_types USING (user_type_id)
            ORDER BY user_id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll(); 
}
$users = selectAllUsers();
// добавление пользователя через админ панель
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
    $user_type_id = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли в обеих полях должны соответствовать!";
    }else{
        $existence1 = selectOne('users', ['login' => $login]);
        $existence2 = selectOne('users', ['email' => $email]);
        if(!empty($existence1['login']) && $existence1['login'] === $login){
            $errMsg = 'Пользователь с таким логином уже зарегистрирован';
        } elseif (!empty($existence2['email']) && $existence2['email'] === $email){
            $errMsg = 'Пользователь с такой почтой уже зарегистрирован';
        } else {
            if ($_POST['user_type_id'] === "true") {
                $user_type_id = 1;
            } else {
                $user_type_id = 2;
            }
            $password = password_hash($passwordF, PASSWORD_DEFAULT);
            $post = [
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'user_type_id' => $user_type_id
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['user_id' => $id]);
            header('location: ' . BASE_URL . 'admin/users/index.php');
        }
    }
}else{
    $login = '';
    $email = '';
}
// код для авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-aut'])){
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);

    if($login === '' || $password === ''){
        $errMsg = "Не все поля заполнены!";
    } else {
        $existence = selectOne('users', ['login' => $login]);
        if(!empty($existence) && $password === $existence['password']){
            if ($existence['accsess'] === '1')
            {
                $_SESSION['user_id'] = $existence['user_id'];
                $_SESSION['login'] = $existence['login'];
                $_SESSION['user_type_id'] = $existence['user_type_id'];
                
                if($_SESSION['user_type_id'] === '1'){
                    header('location: ' . BASE_URL . 'admin/index.php');
                } else {
                    header('location: ' . BASE_URL);
                }
            }
            else {
                $errMsg = 'Accsess denied';
            }
        } else {
            $errMsg = 'Логин или пароль неверный';
        }
    }
} else {
    $login = '';
}

// код для регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $login = trim($_POST["login"]);
    $email = trim($_POST["email"]);
    $passwordF = trim($_POST["pass-first"]);
    $passwordS = trim($_POST["pass-second"]);
    $user_type_id = 2;

    if($login === '' || $email === '' || $passwordF === ''){
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Логин должен быть более двух символов!";
    } elseif ($passwordF !== $passwordS) {
        $errMsg = "Пароли не совпадают!";
    } else {
        $existence1 = selectOne('users', ['login' => $login]);
        $existence2 = selectOne('users', ['email' => $email]);
        if(!empty($existence1['login']) && $existence1['login'] === $login){
            $errMsg = 'Пользователь с таким логином уже зарегистрирован';
        } elseif (!empty($existence2['email']) && $existence2['email'] === $email){
            $errMsg = 'Пользователь с такой почтой уже зарегистрирован';
        } else{
            // При хешировании пароля не получается пройти авторизацию
            // $password = password_hash($passwordF, PASSWORD_DEFAULT);
            $password = $passwordF;
            $post = [
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'user_type_id' => $user_type_id
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['user_id' => $id]);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['user_type_id'] = $user['user_type_id'];
            
            if($_SESSION['user_type_id'] === '1'){
                header('location: ' . BASE_URL . 'admin/index.php');
            } else {
                header('location: ' . BASE_URL);
            }
        }
    }
} else {
    $login = '';
    $email = '';
}



// редактирование пользователя через админ панель. загрузка данных
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['user_id' => $_GET['edit_id']]);
    $user_id =  $user['user_id'];
    $user_type_id =  $user['user_type_id'];
    $login = $user['login'];
    $email = $user['email'];
}

// удаление пользователя через админ панель
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $user_id = $_GET['delete_id'];
    delete('users', 'user_id', $user_id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

// обновление пользователя по кнопке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    $user_id = $_POST['user_id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === ''){
        $errMsg= "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли в обеих полях должны соответствовать!";
    }else{
    // $password = password_hash($passF, PASSWORD_DEFAULT);
    $password = $passF;
    if ($_POST['user_type_id'] === "true") {
        $user_type_id = 1;
    } else {
        $user_type_id = 2;
    }
    if ($_POST['accsess'] === "true") {
        $accsess = 0;
    } else {
        $accsess = 1;
    }
    $post = [
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'user_type_id' => $user_type_id,
        'accsess' => $accsess
    ];

    $post = update('users', 'user_id', $user_id, $post);
    header('location: ' . BASE_URL . 'admin/users/index.php');
    }

}

