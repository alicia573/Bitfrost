<?php
session_start();
require_once('');
if(isset($_POST['create'])) {
    if(isset($_POST['Name'],$_POST['Surname'],$_POST['City'], $_POST['PhoneNumber'],$_POST['Email'], $_POST['Password']) && !empty($_POST['Name']) && !empty($_POST['Surname']) && !empty($_POST['City']) && !empty($_POST['PhoneNumber'])&& !empty($_POST['Email']) && !empty($_POST['Password']))
    {
        $Name = trim($_POST['Name']);
        $Surname = trim($_POST['Surname']);
        $City = trim($_POST['City']);
        $PhoneNumber = trim($_POST['PhoneNumber']);
        $Email = trim($_POST['Email']);
        $Password = trim($_POST['Password']);

        $options = array("cost" => 4);
        $Password = password_hash($Password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');
    }
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $sql = 'select * from bitfrost_loginsystem.clients_information where Email = :Email';
        $stmt = $PDO->prepare($sql);
        $p = ['email' => $Email];
        $stmt->execute($p);

        if ($stmt->rowCount() == 0) {
            $sql = "insert into bitfrost_loginsystem.clients_information (Name, Surname, City, PhoneNumber, Email, Password, CreatedAt) values(:Name,:Surname,:City,:PhoneNumber,:Email,:CreatedAt)";

            try {
                $handle = $PDO->prepare($sql);
                $params = [
                    ':Name' => $Name,
                    ':Surname' => $Surname,
                    ':City' => $City,
                    ':PhoneNumber' => $Surname,
                    ':Email' => $Email,
                    ':Password' => $Password,
                    ':CreatedAt' => $date,
                ];

                $handle->execute($params);

                $success = 'User has been created successfully';

            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        } else {
            $valName = $Name;
            $valSurname = $Surname;
            $valCity = $City;
            $valPhonenumber = $PhoneNumber;
            $valEmail = '';
            $valPassword = $Password;

            -
            $errors[] = 'Email address already registered';
        }
    } else {
        $errors[] = "Email address is not valid";
    }
}
else
{
if(!isset($_POST['Name']) || empty($_POST['Name']))
{
$errors[] = 'First name is required';
}
else
{
$valName = $_POST['Name'];
}
if(!isset($_POST['Surname']) || empty($_POST['Surname']))
{
$errors[] = 'Last name is required';
}
else
{
$valLastName = $_POST['Surname'];
}

if(!isset($_POST['Email']) || empty($_POST['Email']))
{
$errors[] = 'Email is required';
}
else
{
$valEmail = $_POST['Email'];
}

if(!isset($_POST['Password']) || empty($_POST['Password']))
{
$errors[] = 'Password is required';
}
else
{
$valPassword = $_POST['Password'];
}

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Registreer</title>
</head>
    <body>
        <div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Voornaam
                <input class="Search" name="Name" type="text" required>
            </label><br>
            <label>Achternaam
                <input class="Search" name="Surname" type="text" required>
            </label><br>
            <label>Plaats
                <input class="Search" name="City" type="text" required>
            </label><br>
            <label>Telefoonnummer
                <input class="Search" name="PhoneNumber" type="text" required>
            </label><br>
            <label>Email
                <input class="Search" name="Email" type="email" required>
            </label><br>
            <label>Wachtwoord
                <input class="Search" name="Password" type="password" required>
            </label><br>
            <input type="submit" name="create" value="Submit">
        </form>
    </body>
</html>