<?php
    include 'navbar.php';
?>
<?php
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">
    <form method="POST">
            <label class="col-form-label mt-4" for="fname">Marke:</label><br>          
            <input class="form-control" type="text" id="marke" name="marke"><br>
            <input class="btn btn-primary" name="save" type="submit" id="save" value="Speichern"><br><br>
    </form>
</div>

<?php
    if(isset($_POST['save'])&& $_POST["save"]!="")
    {
        try
        {
            $query = "insert into table(marke)
                values(?)";

            $marke = $_POST['marke'];

            $stmt = $dbCon->prepare($query);

            $stmt->execute([$marke,...]);

            ?>
            <div class="alert alert-success" role="alert">
                <?php echo 'Eintrag wurde mit ID: ' . $dbCon->lastInsertId() . ' hinzugefügt' ?>
            </div>
            <?php
        }
        catch(Exception $e)
        {
            echo $e->getMessage() . '!' . $e->getCode();
        }
    }
elseif(isset($_POST['save']))
{
    echo 'save';
}
?>