<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <title></title>
</head>


<body>
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
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include ('config.php');
$results = $connect->prepare("SELECT * FROM clients_information ORDER BY ID");
$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
}
?>   <div id="search_column">
       <p id="search_text">Search: </p>
    <label for="search">
        <input id="search" type="search" placeholder="Search.." value="" onclick="search_func(e)">
    </label>
   </div>


    <div id="table_clients">
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
                <th>Wachtwoord</th>
                <th>Time_stamp</th>
            </tr>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['voornaam']; ?></td>
                <td><?php echo $row['achternaam']; ?></td>
                <td><?php echo $row['stad']; ?></td>
                <td><?php echo $row['adres']; ?></td>
                <td><?php echo $row['postcode']; ?></td>
                <td><?php echo $row['telefoonnummer']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['wachtwoord']; ?></td>
                <td><?php echo $row['time_stamp']; ?></td>
            </tr>
        </table>
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