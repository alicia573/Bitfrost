<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <title>Klanten info</title>
</head>


<body>
<div id="wrapper">
    <?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        echo '<h2>Medewerker Area</h2>';
        echo '<h4>Welcome - '.$_SESSION["username"].'</h4>';
    }
    else
    {
        header("location:../logout.php");
        echo'error';
    }

    ?>

    <form id="search_column" action="" method="get">
    <label for="search" id="search_text">Search
        <input onkeyup="searchFunc()" id="search" name="search" type="text" placeholder="Search.." value="" onclick="search_func(e)">
    </label>
    </form>

    <div id="table_clients">
        <?php
        include ('config.php');
        ?>
        <table id="table">
            <tr id="table_">
                <th>ID</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Stad</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Telefoonnummer</th>
                <th>Email</th>
            </tr>

            <?php
                $results = $connect->prepare("SELECT * FROM clients_information ORDER BY ID");
                $results->execute();
                while($row = $results->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
            ?>
            <tbody id="table_info">
                <tr >
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['voornaam']; ?></td>
                    <td><?php echo $row['achternaam']; ?></td>
                    <td><?php echo $row['stad']; ?></td>
                    <td><?php echo $row['adres']; ?></td>
                    <td><?php echo $row['postcode']; ?></td>
                    <td><?php echo $row['telefoonnummer']; ?></td>
                    <td><?php echo $row['email']; }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
    <script>
        function search_func(e){
            e = e || window.event;
            if(e.keyCode === 12)
            {
                document.getElementById('search').click();
                return false;
            }
            return true;
        }

    </script>
</html>