<?php  session_start();
if(empty($_SESSION['email']))
{
    header("location:index2.html");
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
    <h1 id="Dashboard">Dashboard</h1><br>
    <div id="wrapper">
            <?php
            include ('test/config.php');
            $results = $connect->prepare("SELECT * FROM files ORDER BY ID");
            $results->execute();
            while($row=$results->fetch(PDO::FETCH_ASSOC))
            {
                extract($row);
                ?>

                <h4><?php echo $row['titel']; ?></h4>
                <h4><?php echo $row['ondewerp']; ?></h4>
                <h4><?php echo $row['tekst']; ?></h4>

                <img src="htdocs/Images/<?php echo $row['bestand'] ?>" class="img-rounded" alt="image" style="width:200px" height="200px;">

                <?php
            }
            ?>
        </div>
    </body>
</html>