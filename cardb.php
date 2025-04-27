<?php

// CarInfo class useful for getting out of the DB cars table
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

    public function insertIntoDB(
        PDO $db,
    ): void {
        if ($this->year) {
            pdosingleprepare(
                $db,
                "INSERT INTO cars (make, model, color, year) VALUES (?,?,?,?)",
                [
                    $this->make,
                    $this->model,
                    $this->color,
                    $this->year
                ]
            );
        } else {
            pdosingleprepare(
                $db,
                "INSERT INTO cars (make, model, color) VALUES (?,?,?)",
                [
                    $this->make,
                    $this->model,
                    $this->color
                ]
            );
        }
    }

}

// year is optional in class and database
function createCarInfo(string $make, string $model, string $color, string $year = null): CarInfo {
    $result = new CarInfo();
    $result->make = $make;
    $result->model = $model;
    $result->color = $color;
    $result->year = $year;
    return $result;
}


function createCarTable(PDO $db): void {
    $db->exec("CREATE TABLE cars (
    make VARCHAR NOT NULL,
    model VARCHAR NOT NULL,
    year INT,
    color VARCHAR NOT NULL
    );");
}

// Wrapper for PDO "prepare" statements that execute once
//
// from https://phpdelusions.net/pdo/pdo_wrapper
function pdosingleprepare(PDO $db, string $sqltext, array $args): PDOStatement {
    $stmt = $db->prepare($sqltext);
    $stmt->execute($args);
    return $stmt;
}

if (!debug_backtrace()) { // this isn't included by anything
    $db = new PDO('sqlite::memory:');
    createCarTable($db);

    $make = 'Chevy';
    $model = 'Bolt';
    $year = 2010;
    $color = 'silver';
    createCarInfo($make,$model,$color,$year)->insertIntoDB($db);

    $make = 'Honda';
    $model = 'Prelude';
    $year = 2010;
    $color = 'black';
    createCarInfo($make,$model,$color,$year)->insertIntoDB($db);

    $make = 'Ford';
    $model = 'T';
    $color = 'black';
    createCarInfo($make,$model,$color)->insertIntoDB($db);

    $query = $db->query("SELECT * FROM cars");
    $query->setFetchMode(PDO::FETCH_CLASS, "CarInfo");
    foreach ($query as $carinfo) {
        echo "Car:\n";
        print_r($carinfo);
        echo $carinfo->getCarString(),"\n";
    }
}
