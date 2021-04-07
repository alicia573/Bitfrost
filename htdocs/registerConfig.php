<?php


class Config {
    Public static function connect(){
        $db_name='bitfrost_loginsystem';
        $user='root';
        $pass='alicia573';
        $opt=[
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $db= new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8',$user,$pass);
            $db ->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
            $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO:: FETCH_ASSOC);



        }catch (PDOException $e)
        {
            echo"Connection failed". $e->getMessage();
        }
        return $db;
    }

}

