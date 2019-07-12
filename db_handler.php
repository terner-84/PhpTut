<?php
require 'accessorie.php';
$arrus = [];
$arrus[] = trim($_GET['group']);
$arrus[] = trim($_GET['name']);
$arrus[] = trim($_GET['item_detail']);
$arrus[] = trim($_GET['diameter']);
$arrus[] = trim($_GET['usual_price']);
$acc = new Accessories('lamelový kotouč', 'nameHDJKDL', 'PID46516', 125, 266.55);
//$arrus[] = $acc;
//print json_encode($arrus);
mydb($arrus);

function mydb($arrus) {
    try {
        $db_conn = new PDO('pgsql:host=localhost;port=5432;dbname=library_terner',
        'postgres',
        'user');
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$query = 'SELECT * FROM terner.books';
        $query = 'INSERT INTO terner.narex_accessories (group_name, name, item_detail, diameter, usual_price) 
                VALUES (?,?,?,?,?)';
        $snmt = $db_conn->prepare($query);
        $snmt->execute($arrus);
        //$q = $db_conn->query($query);
        /*echo "<table>\n";
        while ($row = $q->fetch()) {
            echo "\t<tr>\n";
            foreach ($row as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        */
        print json_encode('well done');
    } catch (PDOException $e) {
        print "cannot connect: " . $e->getMessage();
    }
    
    
}
