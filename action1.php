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

$date1 = ($_REQUEST['data1']);
        $sum1 = 0;
        $stmt = $pdo->prepare("SELECT cost FROM rent WHERE date_end < ?");
        $stmt->execute(array($date1));
        while ($row = $stmt->fetch(PDO::FETCH_LAZY))
            {
                $sum1 +=$row[0];
            }
            print "<tr><td>Доход с проката:</td><td>$sum1</td></tr>";

?>