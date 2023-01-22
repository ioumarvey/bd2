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
        padding: 50px 0 0 0;
    }

    .wrapper {
        display: flex;
        margin: auto;
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
        margin:  0 auto;
    }

    .buttons2{
        display: flex;
        margin: 15px auto 0;
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

    form {
        display: flex;
        margin: 30px auto;
        flex-direction: column;
        width: 40%;
        align-items: center;
        justify-content: center;
    }

    form label {
        color: white;
        font-size: 30px;
        margin: 10px;
        background-color:#5e0827;
        padding: 5px 15px;
        box-shadow: 10px 5px 5px black;
    }

    .reset, .submit{
        background-color: #5e0827;
        color: #bababa;
        padding: 14px 20px;
        margin: auto 5px;
        border: 2px solid black;
        cursor: pointer;
        font-size: 20px;
        box-shadow: 10px 5px 5px black;
    } 

    .reset:hover, .submit:hover{
        border: 1px solid red;
    } 

    .search{
        background-color: gray;
        padding: 10px 5px;
        border: none;
        margin: 10px;
        width: 70%;
        text-align: center;
        box-shadow: 10px 5px 5px black;
        font-size: 30px;
    }

    input:focus {
        outline: none;
    }

    h1 {
        color: white;
        padding: 10px;
        text-shadow: 5px 10px 5px black;
    }

    .results {
        display: flex;
        margin: auto;
        text-align: justify;
        text-justify: inter-word;
        justify-content: center;
    }

    p {
        color: white;
        padding: 10px 0 0 0;
        font-size: 20px;
    }

</style>
</head>

<body>

<?php
    ob_start();
    include 'autoryzacja.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
        or die('Błąd połączenia z serwerem: '.mysqli_connect_error());
        mysqli_query($conn,'SET NAMES utf8');
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h1>Dodaj postać:</h1>

    <p>Imię:</p> <br>
    <input class="search" type="text" name="imie"><br>
    <input type="hidden" name="id_postaci" value="">
    <p>Typ broni:</p> <br>
    <select class="search" name="typ_broni">
        <option value="miecz"> miecz </option>
        <option value="łuk"> łuk </option>
        <option value="włócznia"> włócznia </option>
        <option value="kusza"> kusza </option>
        <option value="bicz"> bicz </option><br></select>
    <p>Region:</p> 
    <select class="search" name="region">
        <option value="Reimagg"> Reimagg </option>
        <option value="Nucch"> Nucch </option>
        <option value="Giztr"> Giztr </option>
        <option value="Parizes"> Parizes </option>
        <option value="Grynn"> Grynn </option><br></select>
    <p>Element:</p> 
    <select class="search" name="element">
        <option value="ogień"> ogień </option>
        <option value="woda"> woda </option>
        <option value="wiatr"> wiatr </option>
        <option value="ziemia"> ziemia </option>
        <option value="lód"> lód </option>
        <option value="piorun"> piorun </option><br></select>

    <div class="buttons2">
    <input class="submit" type="submit" value="Dodaj">
    <input class="reset" type="reset" value="Wyczyść">
    </div>

    </form>

    <div class="buttons">
            <button onclick="location.href='baza.php'" class="center">Wróć na stronę główną</button>
        </div>

<?php

if(isset($_POST['imie']) && isset($_POST['typ_broni']) && isset($_POST['region']) && isset($_POST['element']) ){
    $query= "INSERT INTO postacie1(imie,typ_broni,region, element) 
    VALUES ('".$_POST['imie']."','".$_POST['typ_broni']."','".$_POST['region']."','".$_POST['element']."')";
    mysqli_query($conn, $query);
    $last_id = mysqli_insert_id($conn);
    header("Location: baza.php");
}
?>

?>
    
</body>
</html>
