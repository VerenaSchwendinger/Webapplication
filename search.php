<?php
    include 'navbar.php';
?>
<?php
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">

<form class="d-flex" method="POST" action="?page=search">
    <input type="text" name="query" placeholder="Marke">
    <?php
        $smt = $dbCon->prepare('select modell from auto');
        $smt->execute();
        $data = $smt->fetchAll();
    ?>
    <select name="modell">
        <option></option>
            <?php
                foreach($data as $row):?>
                <option><?=$row["modell"]?></option>
            <?php endforeach?>      
    </select>
    <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="btnSubmit" value="Search">
</form>

<?php
if(isset($_POST['btnSubmit']))
{
    $query=$_POST['query'];
    $query=$_POST['modell'];
    ?>  
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Test</th>
            </tr>
        </thead>
        <?php
        $marke=$query;
        $sql = "SELECT * FROM auto WHERE marke LIKE concat('%',:marke,'%') AND modell like concat('%',:modell,'%')";
        $stmt = $dbCon->prepare($sql);
        $stmt->bindParam(':marke', $_POST['query']);
        $stmt->bindParam(':modell', $_POST['modell']);
        $stmt->execute();
        ?>
        <tbody>
            <tr>
                <?php
                while($row = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    ?>
                    <td><?php echo$row->id?></td>
                    </tr>
                    <?php
                }
                ?>  
        </tbody>
    </table>
</div>
<?php
}
?>