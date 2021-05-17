<?php
$host = "localhost";
$db_user = "root";
$db_pass = "alicia573";
$dbname = "bitfrost_loginsystem";

try {
    $connect = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch(PDOException $e)
{
    die('unable to connect');
}


    if(isset($_POST['submit']))
    {

        $titel = $_POST['titel'];
        $onderwerp = $_POST['onderwerp'];
        $tekst = $_POST['tekst'];
        $bestand = $_FILES['bestand']['name'];
    }
        try {
            move_uploaded_file($_FILES["bestand"]["tmp_name"], "htdocs/Images/" . $_FILES["bestand"]["name"]);
            $stmt = $connect->prepare("INSERT INTO files (titel,onderwerp,tekst,bestand) 
            VALUES( :titel, :onderwerp, :tekst, :bestand)");
            $stmt->bindParam(":titel", $titel);
            $stmt->bindParam(":onderwerp", $onderwerp);
            $stmt->bindParam(":tekst", $tekst);
            $stmt->bindParam(":bestand", $bestand);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
</head>
<body>
<div id="wrapper">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label>Titel:
            <input type="text" name="titel" class="text-box" required>
        </label>
        <label>Onderwerp:
            <input type="text" name="onderwerp" class="text-box" required>
        </label>
        <label>Tekst:
            <input type="text" name="tekst" class="text-box" required>
        </label>
        <label>Bestanden:
            <input type="file" name="bestand" multiple>
        </label><br>
        <button name="submit" type="submit">Post</button>
    </form>
</div>
</body>
</html>
