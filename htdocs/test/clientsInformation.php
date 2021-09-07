<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <title></title>
</head>


<body>
<?php
//Login Success.php
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
?>   <div id="search_column">
       <p id="search_text">Search: </p>
       <input id="search" type="search" placeholder="Search.." value="" onclick="search_func(e)">
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