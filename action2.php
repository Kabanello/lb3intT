<?
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


    $name2 = ($_REQUEST['seller2']);
    $n2 = 0;
    $stmt = $pdo->prepare("SELECT ID_Vendors FROM vendors WHERE name = ?");
    $stmt->execute(array($name2));
    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
    echo '<?xml version="1.0" encoding="utf8" ?>';
    echo "<root>";
    $id2 = $stmt->fetch(PDO::FETCH_LAZY);
    $stmt = $pdo->prepare("SELECT name FROM cars WHERE FID_Vendors = ?");
    $stmt->execute(array($id2[0]));
    while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
            $autoName = $row[0];
            print "<row><AutoName>$autoName</AutoName></row>";
        }
        echo "</root>";

    ?>