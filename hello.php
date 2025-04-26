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

$stmt = $db->prepare("INSERT INTO cars (make, model, year, color) VALUES (:make, :model, :year, :color)");
$stmt->bindParam(':make', $make);
$stmt->bindParam(':model', $model);

// insert one row
$make = 'Chevy';
$model = 'Bolt';
$year = 2010;
$color = 'silver';
$stmt->execute();

$sth = $db->query("SELECT * FROM cars");
$result = $sth->fetchAll();
echo $result;
?>
