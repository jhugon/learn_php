<?php

class CarInfo {
    public $make;
    public $model;
    public $year;
    public $color;

    public function getCarString(): string {
        if ($this->year) {
            return "$this->color $this->year $this->make $this->model";
        } else {
            return "$this->color $this->make $this->model";
        }
    }
}

$db = new PDO('sqlite::memory:');
$db->exec("CREATE TABLE cars (
make VARCHAR NOT NULL,
model VARCHAR NOT NULL,
year INT,
color VARCHAR NOT NULL
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

$stmt = $db->prepare("INSERT INTO cars (make, model, color) VALUES (?,?,?)");

$make = 'Ford';
$model = 'T';
$color = 'black';
$stmt->execute([$make,$model,$color]);

$query = $db->query("SELECT * FROM cars");
$query->setFetchMode(PDO::FETCH_CLASS, "CarInfo");
foreach ($query as $carinfo) {
    echo "Car:\n";
    print_r($carinfo);
    echo $carinfo->getCarString(),"\n";
}
?>
