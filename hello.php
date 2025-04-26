<?php
$txt = "PHP";
echo "I love $txt!";

$db = new PDO('sqlite::memory:');
$db->exec("CREATE TABLE cars (
make VARCHAR,
model VARCHAR,
year INT,
color VARCHAR
);");

$stmt = $db->prepare("INSERT INTO cars (make, model, year, color) VALUES (?,?,?,?)");

// insert one row
$make = 'Chevy';
$model = 'Bolt';
$year = 2010;
$color = 'silver';
$stmt->execute($make,$model,$year,$color);

$query = $db->query("SELECT * FROM cars");
$result = $query->fetchAll();
var_dump($result);
?>
