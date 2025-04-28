<?php
require 'cardb.php';

$db = new PDO('sqlite::memory:');
CarInfo::createTable($db);
CarInfo::create('Ford','F-150','white',1995)->insertIntoDB($db);
CarInfo::create('Ford','F-150','silver',2000)->insertIntoDB($db);
CarInfo::create('Ford','Focus','blue',2018)->insertIntoDB($db);
$cars = CarInfo::fetchAll($db);
var_dump($cars);
?>
This is text in index.php!
<?php foreach ($cars as $car) : ?>
- <?= $car->getCarString(); ?>
<?php endforeach; ?>

<?php foreach ($cars as $car) {
var_dump($car);
}
?>
