<?php


class Config {
    Public static function connect(){
        $db_name='bitfrost_loginsystem';
        $user='root';
        $pass='alicia573';

        try {
            $db= new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8',$user,$pass);
            $db ->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_WARING);

            echo"yes";
        }catch (PDOException $e)
        {
            echo"Connection failed". $e->getMessage();
        }
        return $db;
    }

}

