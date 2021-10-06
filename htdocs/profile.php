<?php
session_start();
if(empty($_SESSION['email']))
{
    header("location:Index.html");
    session_destroy();
}

?>

Welkom <?php echo $_SESSION['voornaam']; ?>

<a href="Logout.php">Logout</a>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Home</title>
    </head>
    <body>
    <div id="wrapper_client_page">
    <h1 id="Dashboard">Dashboard</h1><br>
            <?php
            include ('test/config.php');
            $results = $connect->prepare("SELECT * FROM files ORDER BY ID");
            $results->execute();
            while($row = $results->fetch(PDO::FETCH_ASSOC))
            {
                extract($row);
                ?>
            <div id="Article">
                <h1>Titel: <?php echo $row['titel']; ?></h1>
                <h4 id="">Onderwerp: <?php echo $row['onderwerp']; ?></h4>
                <article id="article_text">Tekst:<?php echo $row['tekst']; ?></article>
                <?php
                $content = $row['bestand'];
                if($content != ''){
                ?>
                <img src="Images/<?php echo $row['bestand'] ?>" id="article_image" alt="image" style="width:200px" height="200px;">
            <?php } else{
                    echo '';
                }
                ?>

            </div>
                <?php
            }
            ?>
        </div>
    <footer style="bottom: auto">
        <p>&copy; Copyright 2021</p>
    </footer>
    </body>
</html>