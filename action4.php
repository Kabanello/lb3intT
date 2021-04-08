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

    $id4 = ($_POST['id4']);
        $info1 = ($_POST['info1']);
        $info2 = ($_POST['info2']);
        $info3 = ($_POST['info3']);
        $info4 = ($_POST['info4']);
        $info5 = ($_POST['info5']);

        $stmt = $pdo->prepare("INSERT INTO rent VALUES (?,?,?,?,?,?)");
        $stmt->execute([$id4,$info1,$info2,$info3,$info4,$info5]);


    ?>