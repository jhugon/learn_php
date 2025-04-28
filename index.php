<?php
require 'cardb.php';

$db = new PDO('sqlite::memory:');
CarInfo::createTable($db);
CarInfo::create('Ford','F-150','white',1995)->insertIntoDB($db);
CarInfo::create('Ford','F-150','silver',2000)->insertIntoDB($db);
CarInfo::create('Ford','Focus','blue',2018)->insertIntoDB($db);
$cars = CarInfo::fetchAll($db);
$countcars = count($cars);
?>
There are <?= $countcars ?> cars:
<?php foreach ($cars as $car): ?>
- <?= $car, PHP_EOL ?>
<?php endforeach; ?>
