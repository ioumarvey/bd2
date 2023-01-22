<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sal Smolny</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap" rel="stylesheet">

<style>
    * {
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: 'Rajdhani', sans-serif;
    }

    body {
        background-color: #202120;
    }

    .wrapper {
        display: flex;
        margin: 0 auto 50px;
    }

    .wrapper2 {
        display: flex;
        margin: auto;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: auto;
        background-color: #000000;
        margin: auto;
        color: #bababa;
        font-size: 20px;
        box-shadow: 10px 5px 5px black;
    }

    td, th {
        border: 2px solid black;
        text-align: center;
    }

    th {
        padding: 10px;
        font-size: 30px;
        font-weight: bold;
    }

    td {
        padding: 10px 30px;
    }

    tr:nth-child(even) {
        background-color: #0c0d0c;
    }

    button {
        background-color: #5e0827;
        color: #bababa;
        padding: 14px 20px;
        margin: auto;
        border: 2px solid black;
        cursor: pointer;
        height: 5%;
        width: 20%;
        font-size: 20px;
        box-shadow: 10px 5px 5px black;
    }

    button:hover{
        border: 2px solid #ff0026;
    }

    .buttons {
        display: flex;
        margin:  20px auto 40px;
    }
    

    header p{
        display:flex;
        margin: 50px auto 20px;
        color:#bababa;
        font-size: 50px;
        padding: 20px;
        cursor: context-menu;
    }

    a {
        text-decoration:none;
        color:#ff0026;
    }

    main a:hover {
        color: #ffc4c4;
    }

    .baza {
        background-color: #360214;
    }

    .baza:hover{
        border: 1px solid #9c000a;
    }

    img:hover{
        filter: drop-shadow(0px 0px 10px white)
    }

</style>

</head>
<body>

<header>
    <div class="wrapper2">
    <p>Witaj w bazie danych postaci z gry X</p>
    </div>
</header>
    <main>
    <div class="buttons">
    <button onclick="location.href='dodaj1.php'">Dodaj postać</button>
    <button onclick="location.href='wyszukaj1.php'">Wyszukaj postać</button><br>
    <button class="baza" onclick="location.href='baza2.php'">Bronie</button><br>
    <button class="baza" onclick="location.href='baza3.php'">Regiony</button><br>
    </div>


    <?php
    ob_start();
    include 'autoryzacja.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die('Błąd połączenia z serwerem: '.mysqli_connect_error());
    mysqli_query($conn,'SET NAMES utf8');
     
   
    $result=mysqli_query($conn,"SELECT * FROM postacie1");
?>
<div class="wrapper">
<?php
   echo '<table border=1>';
   echo "<tr>";
   echo "<th>Imię</th>";
   echo "<th>Typ broni</th>";
   echo "<th>Region</th>";
   echo "<th>Element</th>";
   echo '<th style="color: #575757">Usuń</th>';
   echo '<th style="color: #575757">Zmień</th>';
   echo "</tr>";
   while($row=mysqli_fetch_array($result))
   {
    echo '<tr';
    if ((isset($_GET['id_postaci'])) && ($_GET['id_postaci']==$row['id_postaci'])) echo ' style="background-color: #5e0827"';
    echo '>';
       
       echo "<td>".$row['imie']."</td>";
       echo "<td>".$row['typ_broni']."</td>";
       echo "<td>".$row['region']."</td>";
       echo "<td>".$row['element']."</td>";
       echo '<td>';

       if ((isset($_GET['id_postaci'])) && ($_GET['id_postaci']==$row['id_postaci'])) {
        echo '<a href="baza.php?usun=' .$row['id_postaci'].'"><img src="confirm.png" alt="potwierdz" width="30" height="30"></a>';
    } else {
        echo '<a href="baza.php?id_postaci=' .$row['id_postaci'].'"><img src="delete.png" alt="usun" width="30" height="30"></a>';
    }
    echo '</td>';
        echo '<td><a href="zmien1.php?id_postaci='.$row['id_postaci'].'"><img src="edit.png" alt="zmien" width="30" height="30"></a></td>';
        echo "</tr>";
   }
   echo '</table>';

   if (isset($_GET['usun'])) {
    $sql = "DELETE FROM postacie1 WHERE id_postaci=".$_GET['usun'];
    mysqli_query($conn, $sql);
    header('Location: baza.php');
}
?>
</div>



</main>
</body>
</html>