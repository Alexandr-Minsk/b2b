<?php

require_once ('ConnectionDB.php');

$db = ConnectionDB::get();

for($i = 1; $i < 10000; $i++ ){
    $username = get_name();
    $gender = get_gender();
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, mt_rand(1970, 2018).'-02-17');
    $birth_date = $date->format('Y-m-d');
    $res = $db->query("INSERT INTO `users` (`name`, `gender`, `birth_date`) VALUES ('".$username."' , '".$gender."', '".$birth_date."')");
    $phone = mt_rand(80297000000, 80297999999);
    $db->query("INSERT INTO `phone_numbers` (`user_id`, `phone`) VALUES ('".$i."' , '".$phone."')");
}
echo ('Seeding finish'."\n");
function get_name(){
    $names = [
        'Vasya',
        'Petya',
        'Masha',
        'Sasha'
];
    return $names[mt_rand(0, (count($names))-1)];
}
function get_gender(){
    return mt_rand(0,2);
}


