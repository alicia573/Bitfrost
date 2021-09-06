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


    if(isset($_POST['submit'])) {
        $message="yes";
        $titel = $_POST['titel'];
        $onderwerp = $_POST['onderwerp'];
        $tekst = $_POST['tekst'];

        $bestand = $_FILES['bestand']['name'];

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');


        move_uploaded_file($_FILES["bestand"]["tmp_name"], "htdocs/Images/" . $_FILES["bestand"]["name"]);
        $stmt = $connect->prepare("INSERT INTO files (titel,onderwerp,tekst,bestand,upload_date) 
        VALUES( :titel, :onderwerp, :tekst, :bestand,now())");
        $stmt->bindParam(":titel", $titel);
        $stmt->bindParam(":onderwerp", $onderwerp);
        $stmt->bindParam(":tekst", $tekst);
        $stmt->bindParam(":bestand", $bestand);
        $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Artikelen sturen Dashboard</title>
</head>
<body>
<div id="">
    <form id="article-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label >Titel:
            <input type="text" name="titel" class="text-box" required>
        </label>
        <label>Onderwerp:
            <input type="text" name="onderwerp" class="text-box" required>
        </label>
        <label>Tekst:
            <textarea name="tekst" class="text-area" required></textarea>
        </label>
        <label>Bestanden:
            <input type="file" name="bestand" multiple>
        </label><br>
        <button name="submit" type="submit">Post</button>
        <?php
        echo '<h2></h2>';
        ?>
    </form>
</div>
</body>
</html>
