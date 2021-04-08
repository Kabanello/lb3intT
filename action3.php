<?php
       $host = 'localhost';
       $db   = 'iteh2lb1var7';
       $user = 'root';
       $pass = 'root';
       $charset = 'utf8';
   
       $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
       $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $i = 0;
    $date3 = ($_REQUEST['data3']);
    header('Content-Type: application/json');
    header("Cache-Control: no-cache, must-revalidate");

    $stmt = $pdo->prepare("SELECT FID_Car FROM rent WHERE date_end < ?");
    $stmt->execute(array($date3));
    while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
            $stmt2 = $pdo->prepare("SELECT name FROM cars WHERE id_cars = ?");
            $stmt2->execute(array($row[0]));
            $out = $stmt2->fetch(PDO::FETCH_LAZY);
            $timetable[$i] =  $out[0];
            $i++;
        }
    echo json_encode($timetable);

?>