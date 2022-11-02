<?php
$host = 'db';
$db_name = 'magazin';
$db_user = 'root';
$db_pas = '1234';

try {
$db = new PDO('mysql:host='.$host.';dbname=' .$db_name, $db_user, $db_pas);
}
catch (PDOException $e) {
print "error: " . $e->getMessage();
die();
}

$result = '{"response":[';
$stmt = $db->query("SELECT t. `ID`,t.`TITLE`,`DESCRIPTION`, `PRICE`, `COUNT`,K.`TITLE` AS NAME FROM `Tovari` AS t JOIN `Categorii` AS K ON t.ID_CAT-k.ID");
while ($row = $stmt->fetch()) {
$result .= '{';
$result .= '"id":'.$row['ID'].',"title":"'.$row['TITLE'].'","desc":"'.$row['DESCRIPTION'].'","price":'.$row['PRICE'].',"count":'.$row['COUNT'].'","kat":"'.$row['NAME'].'"';
$result .= '}';
}
$result = rtrim($result, ",");
$result .= ']}';
echo $result;