<?php

require('session.php');
require('connect.php');


function tt($value){
    echo '<pre>';
    print_r($value);
    echo '<pre>';
}

// Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }

    return true;
}

// Получить все данные c одной таблицы
function selectAll($table_name, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table_name";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql ." WHERE $key = $value";
            } else {
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetchAll();
}

// Получить одну строку с выбранной таблицы
function selectOne($table_name, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table_name";
    
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql ." WHERE $key = $value";
            } else {
                $sql = $sql ." AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetch();
}

// записиь новых данных в таблицу БД
function insert($table_name, $params){
    global $pdo;
    $i = 0;
    $column = '';
    $mask = ''; 
    foreach ($params as $key => $value) {
        if ($i === 0){
            $column = $column .  "$key";
            $mask = $mask . "'"."$value"."'";
        } else {
            $column = $column .  ", $key";
            $mask = $mask . ", " ."'$value'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table_name ($column) VALUES  ($mask)";

    
    $query = $pdo->prepare($sql);
    $query->execute($params);
    
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// обновление данных в таблице БД
function update($table_name, $name_id, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table_name SET $str WHERE $name_id = $id";
    tt($sql);
    $query = $pdo->prepare($sql);
    $query->execute($params);
    
    dbCheckError($query);
}

// удаление данных из таблицы БД
function delete($table_name, $name_id, $id){
    global $pdo;

    $sql = "DELETE FROM $table_name WHERE $name_id = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}