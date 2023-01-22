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

    .buttons2{
        display: flex;
        margin: 10px auto;
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
        box-shadow:rgba(94, 8, 39,1) 0px 0px 10px
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

</style>
</head>


<body>

    <?php
        include 'autoryzacja.php';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Błąd połączenia z serwerem: '.mysqli_connect_error());
        mysqli_query($conn,'SET NAMES utf8');
    ?>

        <form action="" method="POST">
            <label for="search">Wyszukaj:</label><br>
            <input class= "search" name="search">
            <div class="buttons2">
            <input class="submit" type="submit" value="Szukaj" >
            <input class="reset" type="reset" value="Wyczyść" >
            </div>
            </form>

    <?php
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $query = "SELECT * FROM postacie1 JOIN regiony1 ON postacie1.region = regiony1.nazwa JOIN bronie1 ON postacie1.typ_broni = bronie1.typ 
            WHERE postacie1.imie LIKE '%$search%' 
            OR postacie1.typ_broni LIKE '%$search%' 
            OR postacie1.region LIKE '%$search%' 
            OR postacie1.element LIKE '%$search%' 
            OR regiony1.nazwa LIKE '%$search%' 
            OR regiony1.klimat LIKE '%$search%' 
            OR regiony1.trudność LIKE '%$search%' 
            OR regiony1.język LIKE '%$search%' 
            OR bronie1.typ LIKE '%$search%' 
            OR bronie1.obrażenia LIKE '%$search%' 
            OR bronie1.wytrzymałość LIKE '%$search%' 
            OR bronie1.rzadkość LIKE '%$search%' ORDER BY id_postaci";

    $result = mysqli_query($conn, $query);
    $matches = array();

    while($row = mysqli_fetch_assoc($result)){
        $matches[] = $row;
    }
    if (!empty($matches)) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Imię";
        echo "<th>Typ broni";
        echo "<th>Region";
        echo "<th>Element";
        echo "</tr>";
        foreach($matches as $match){
            echo "<tr><td>".$match['imie']."</td><td>".$match['typ_broni']."</td><td>".$match['region']."</td><td>".$match['element']."</td></tr>";
        }
        echo "</table>";
    }else{
        if(!empty($search)){
            echo '<div class="results">';
            echo "<h1>Brak wyników</h1>";
            echo "</div>";
        }
    }
}
?>

        <div class="buttons">
            <button onclick="location.href='baza.php'" class="center">Wróć na stronę główną</button>
        </div>
</body>
</html>

