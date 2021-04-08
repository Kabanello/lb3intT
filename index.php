<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <title>Прокат машин</title>
        <h2 align = "center">Результаты запросов из задания</h2>
        <script> 
        var ajax1 = new XMLHttpRequest();
        var ajax2 = new XMLHttpRequest();
        function loadData1(){
               if (ajax1.readyState===4) {
                  if (ajax1.status===200) {
                         document.getElementById("result1").innerHTML = ajax1.response;
                  }
               }
        }
        function loadData2(){
               if (ajax2.readyState===4) {
                  if (ajax2.status===200) {
                    var res = document.getElementById("result2"); var result = "";
                    var rows = ajax2.responseXML.firstChild.children;
                    result += "<tr>";
                    result += "<td> Автомобили: </td>";
                    for (var i = 0; i < rows.length; i++) {
                         
                         result += "<td>" + rows[i].children[0].firstChild.nodeValue + ",</td>";
                         
                    }
                    result += "</tr>";
                    res.innerHTML = result;
                  }
               }
        }

        function get1(){
          ajax1.onreadystatechange = loadData1;
          var date1 = document.getElementById("date1").value;
          ajax1.open("GET" ,"action1.php?data1="+date1);
          ajax1.send();
        }

        function get2(){
          ajax2.onreadystatechange = loadData2;
          var seller = document.getElementById("id2").value;
          ajax2.open("GET" ,"action2.php?seller2="+seller);
          ajax2.send();
        }

        function get3(){
          const ajax3 = new XMLHttpRequest();
          let date3 = document.getElementById("date3").value;
          ajax3.open("GET","action3.php?data3=" + date3);
          ajax3.onload = function() {
               console.log(ajax3.status);
               if(ajax3.status===200) {
                    var res3 = JSON.parse(ajax3.response);
                    let output = "";
                    for(let i in res3) {
                         output += "<li>" + res3[i] + "</li>"
                    }
                    document.getElementById("result3").innerHTML = output;
               }
          }
          ajax3.send();
        }
        </script>
    </head>
    <body>
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
    ?>
<hr>
        <p>
        <form action="action1.php" id = "1" method = "GET">
             1. Полученный доход с проката по состоянию на выбранную дату 
             <input placeholder="Введите дату" name="data1" id= "date1"> 
             <input id="button1" type="button" value="Отправить" onclick = "get1()"> 
        </form><br>
        <table border = "0" id = "result1">
          </table>

        <form action="action2.php" id = "2" method = "GET">
             2. Автомобили выбранного производителя 
             <input placeholder="Введите Имя производителя" name="seller2" id = "id2"> 
             <input id="button2" type="button" value="Отправить" onclick = "get2()"> 
        </form><br>
        <table border = "0" id = "result2">
          </table>

        <form action="action3.php" id = "3" method = "GET"> 
             3. Свободные автомобили на выбранную дату 
             <input placeholder="Введите дату" name="data3" id = "date3"> 
             <input id="button3" type="button" value="Отправить" onclick = "get3()"> 
        </form><br>
        <table border = "0" id = "result3">
          </table>
        </p>
<hr>
        <form action="action4.php" id = "4" method = "post"> 
              Добавить информацию об аренде автомобиля 
             <input placeholder="Введите id автомобиля" name="id4" id = "id4"> 
            <p>
            <input placeholder="Дата начала" name="info1" id = "info1"> 
            <input placeholder="Время начала" name="info2" id = "info2"> 
            <input placeholder="Дата окончания" name="info3" id = "info"> 
            <input placeholder="Время окончания" name="info4" id = "info4"> 
            <input placeholder="Цена" name="info5" id = "info5"> 
            </p>
             <input id="button4" type="submit" value="Добавить"> 
        </form>
<hr>
        <form action="action5.php" id = "5" method = "post"> 
              <p>Изменить пробег выбранного автомобиля </p>
              <p>
              <input placeholder="Введите id автомобиля" name="id5" id = "id5"> 
              <input placeholder="Введите новый пробег" name="data5" id = "data5"> 
              </p>
             <input id="button5" type="submit" value="Изменить"> 
        </form>

    </body>
</html>