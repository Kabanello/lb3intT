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
    
    
    $id5 = ($_POST['id5']);
        $race5 = ($_POST['data5']);
        $stmt = $pdo->prepare("UPDATE cars SET race = ? WHERE ID_Cars = ?");
        $stmt->execute([$race5,$id5]);
    
    ?>