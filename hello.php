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

$make = 'Chevy';
$model = 'Bolt';
$year = 2010;
$color = 'silver';
$stmt->execute([$make,$model,$year,$color]);

$make = 'Honda';
$model = 'Prelude';
$year = 2010;
$color = 'black';
$stmt->execute([$make,$model,$year,$color]);

$query = $db->query("SELECT * FROM cars");
$query->setFetchMode(PDO::FETCH_ASSOC);
// $result = $query->fetchAll();
foreach ($query as $row) {
    print_r($row);
    echo "Row:\n";
    foreach ($row as $key => $value) {
        echo "$key: $value\n";
    }
}
?>
