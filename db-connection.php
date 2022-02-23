<?php
function getDBConnection()
{
    $server = "localhost:3307";
    $user = "root";
    $pwd = "root";
    $db = "autos";

    try
    {
        $dbCon = new PDO('mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8', $user, $pwd);
        $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ?>
        <br>
        <div class="alert alert-success">
            <strong>SUCCESS: </strong> <?php echo 'Mit DB verbunden';?>
        </div>
        <?php

        return $dbCon;
    }
    catch (PDOException $e)
    {
        ?>
        <br>
        <div class="alert alert-danger">
            <strong>ERROR: </strong> <?php echo 'Fehler ' . $e->getCode() . ': ' . $e->getMessage();?>
        </div>
        <?php
    }
}
?>