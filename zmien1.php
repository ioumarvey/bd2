<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sal Smolny</title>
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
    include 'autoryzacja.php';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) 
    or die('Błąd połączenia z serwerem: '.mysqli_connect_error());

    $id_postaci = mysqli_real_escape_string($conn, $_GET['id_postaci']);
    $query = "SELECT * FROM postacie1 WHERE id_postaci='$id_postaci'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (isset($_POST['update'])) {
        $id_postaci = mysqli_real_escape_string($conn, $_POST['id_postaci']);
        $imie = mysqli_real_escape_string($conn, $_POST['imie']);
        $typ_broni = mysqli_real_escape_string($conn, $_POST['typ_broni']);
        $region = mysqli_real_escape_string($conn, $_POST['region']);
        $element = mysqli_real_escape_string($conn, $_POST['element']);
    
        $query = "UPDATE postacie1 SET imie='$imie', typ_broni='$typ_broni', region='$region', element='$element' 
        WHERE id_postaci='$id_postaci'";
        mysqli_query($conn, $query);
        header("Location: baza.php");
    }
    ?>

    <form action="" method="post">
    <h1>Edytuj:</h1>
        <p>Imię:</p> <br>
        <input class="search" type="text" name="imie" value="<?php echo $row['imie']; ?>"><br>
        <input type="hidden" name="id_postaci" value="<?php echo $row['id_postaci']; ?>">
        <p>Typ broni:</p> <br>
        <select class="search" name="typ_broni">
            <option value="miecz" <?php if($row['typ_broni'] == "miecz") echo 'selected';?>> miecz </option>
            <option value="łuk" <?php if($row['typ_broni'] == "łuk") echo 'selected';?>> łuk </option>
            <option value="włócznia" <?php if($row['typ_broni'] == "włócznia") echo 'selected';?>> włócznia </option>
            <option value="kusza" <?php if($row['typ_broni'] == "kusza") echo 'selected';?>> kusza </option>
            <option value="bicz" <?php if($row['typ_broni'] == "bicz") echo 'selected';?>> bicz </option><br>
            </select>

        <p>Region:</p> 
        <select class="search" name="region">
            <option value="Reimagg" <?php if($row['region'] == "Reimagg") echo "selected"; ?>>Reimagg</option>
            <option value="Nucch" <?php if($row['region'] == "Nucch") echo "selected"; ?>>Nucch</option>
            <option value="Giztr" <?php if($row['region'] == "Giztr") echo "selected"; ?>>Giztr</option>
            <option value="Parizes" <?php if($row['region'] == "Parizes") echo "selected"; ?>>Parizes</option>
            <option value="Grynn" <?php if($row['region'] == "Grynn") echo "selected"; ?>>Grynn</option>
            </select>

        <p>Element:</p>
        <select class="search" name="element">
            <option value="ogień" <?php if($row['element'] == 'ogień') echo 'selected';?>> ogień </option>
            <option value="woda" <?php if($row['element'] == 'woda') echo 'selected';?>> woda </option>
            <option value="wiatr" <?php if($row['element'] == 'wiatr') echo 'selected';?>> wiatr </option>
            <option value="ziemia" <?php if($row['element'] == 'ziemia') echo 'selected';?>> ziemia </option>
            <option value="lód" <?php if($row['element'] == 'lód') echo 'selected';?>> lód </option>
            <option value="piorun" <?php if($row['element'] == 'piorun') echo 'selected';?>> piorun </option>
            </select>

        <div class="buttons2">
        <input class="submit" type="submit" name="update" value="Zaktualizuj"><br>
        </div>
    </form>

    <div class="buttons">
            <button onclick="location.href='baza.php'" class="center">Wróć na stronę główną</button>
        </div>

        </body>
</html>
