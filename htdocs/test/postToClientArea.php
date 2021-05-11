<?php
include ('config.php');
    if(isset($_POST['submit'])){
        $countfiles = count($_FILES['bestand']['name']);

        $query = 'INSERT INTO files(titel, onderwerp, tekst, bestand) 
        values (?,?,?,?)' ;
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
            <input type="text" name="titel" class="text-box">
        </label>
        <label>Onderwerp:
            <input type="text" name="onderwerp" class="text-box">
        </label>
        <label>Tekst:
            <input type="text" name="tekst" class="text-box">
        </label>
        <label>Bestanden:
            <input type="file" name="bestand[]" multiple>
        </label><br>
        <button name="submit" type="submit" value="upload">Post</button>
    </form>
</div>
</body>
</html>
