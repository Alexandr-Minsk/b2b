<?php

require_once (__DIR__.'/../ConnectionDB.php');

/**
 * @param string $user_ids
 * @return array
 * @throws PDOException
 */
function load_users_data($user_ids) {
    $data = [];
    $db = mysqli_connect(ConnectionDB::$server_name, ConnectionDB::$user, ConnectionDB::$password, ConnectionDB::$db_name);
    try{
        $stmt = mysqli_query($db, "SELECT `id`, `name` FROM users WHERE `id` IN ($user_ids)");
        while ($obj = $stmt->fetch_object()){
            $data[$obj->id] = $obj->name;
        }
    }catch(PDOException $e){
        error_log($e->getMessage());
    }finally{
        mysqli_close($db);
    }
    return $data;
}

/**
 * @param string $string_ids
 * @return string
 */
function prepare_input_data($string_ids){
    $user_ids = [];
    foreach (explode(',', $string_ids) as $v){
        $id = (integer) trim($v);
        if ($id > 0){
            $user_ids[] = $id;
        }
    }
    return implode(',' ,$user_ids);
}

$_GET['user_ids'] ='1,2,17,48';

$user_ids = prepare_input_data($_GET['user_ids']);
$data = load_users_data($user_ids);

foreach ($data as $user_id=>$name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
}
/**
 * Из уязвимостей была возможность SQL-инъекции.
 * SQL-инъекция — это атака, направленная на веб-приложение, в ходе которой конструируется SQL-выражение из пользовательского ввода путем простой конкантенации (например, $query="SELECT * FROM users WHERE id=".$_REQUEST["id"] ). В случае успеха атакующий может изменить логику выполнения SQL-запроса так, как это ему нужно.
 * Еще из недостатков соединение с БД в foreach создавалось и закрывалось.
 * 
 */