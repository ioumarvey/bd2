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
        margin:  30px auto;
    }

    header p{
        display:flex;
        margin: 50px auto 20px;
        color:#bababa;
        font-size: 50px;
        padding: 20px;
    }

    a {
        text-decoration:none;
        color:#ff0026;
    }

    a:hover {
        color: #ffc4c4;
    }

    .baza {
        background-color: #360214;
    }


</style>

</head>
<body>

<header>
    <div class="wrapper">
    <p>Witaj w bazie danych broni z gry X</p>
    </div>
</header>
    <main>
    <?php
    include 'autoryzacja.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Błąd połączenia z serwerem: '.mysqli_connect_error());
mysqli_query($conn,'SET NAMES utf8');
   
    $result=mysqli_query($conn,"SELECT * FROM bronie1");
?>
<div class="wrapper">
<?php
   echo '<table border=1>';
   echo "<tr>";
   echo "<th>Typ</th>";
   echo "<th>Obrażenia</th>";
   echo "<th>Wytrzymałość</th>";
   echo "<th>Rzadkość</th>";

   echo "</tr>";
   while($row=mysqli_fetch_array($result))
   {
       echo "<tr>";
       echo "<td>".$row['typ']."</td>";
       echo "<td>".$row['obrażenia']."</td>";
       echo "<td>".$row['wytrzymałość']."</td>";
       echo "<td>".$row['rzadkość']."</td>";
       echo "</tr>";
    }
   echo '</table>';
?>
</div>

<div class="buttons">
    <button onclick="location.href='dodaj1.php'">Dodaj postać</button>
    <button onclick="location.href='wyszukaj1.php'">Wyszukaj postać</button><br>
    <button class="baza" onclick="location.href='baza.php'">Postacie</button><br>
    <button class="baza" onclick="location.href='baza3.php'">Regiony</button><br>
    </div>

</main>
</body>
</html>