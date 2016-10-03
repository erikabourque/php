<?php

// to get to in vagrant
//      cd Code/Projects/labs/lab5
// then do
//      php table.php
// Deleting table if it already exists, to be safe    
$pdo = new PDO('mysql:dbname=homestead;host:localhost', 'homestead', 'secret');
$pdo->exec('DROP TABLE items');

// Creating and populating the database
createtable();
populatetable();

$stmt1 = $pdo->prepare('SELECT * FROM items');
if ($stmt1->execute()) {
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row);
    }
}

function createtable() {
    try {
        $pdo = new PDO('mysql:dbname=homestead;host:localhost', 'homestead', 'secret');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'CREATE TABLE items ('
                . 'id INT(5) PRIMARY KEY, '
                . 'name varchar(15), '
                . 'cost DECIMAL(5, 2) )';
        $pdo->exec($query);
    } catch (Exception $ex) {
        echo 'Error:' . $ex->getMessage();
    }
}

function populatetable() {
    try {
        // Get the data from the CVS file 
        $file = fopen("items.csv", "r");
        while (!feof($file)) {
            $data[] = fgetcsv($file);
        }
        fclose($file);

        // Connect to database
        $pdo = new PDO('mysql:dbname=homestead;host:localhost', 'homestead', 'secret');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert the data
        foreach ($data as $array) {
            $stmt = $pdo->prepare('INSERT INTO items VALUES(?,?,?)');

            $temp1 = trim($array[0]);
            $stmt->bindValue(1, $temp1);

            $temp2 = trim($array[1]);
            $stmt->bindValue(2, $temp2);

            $temp3 = trim($array[2]);
            $stmt->bindValue(3, $temp3);

            $stmt->execute();
        }
    } catch (Exception $ex) {
        echo 'Error:' . $ex->getMessage();
    }
}

?>