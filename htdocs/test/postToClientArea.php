<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
</head>
<body>
<div id="wrapper">
    <form method="post" action="postToClientArea.php" enctype="multipart/form-data">
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
            <input type="file" name="bestand" >
        </label><br>
        <button name="post" type="submit">Post</button>
    </form>
</div>
</body>
</html>