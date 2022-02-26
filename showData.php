<?php
    include 'navbar.php';
?>
<?php
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
            </tr>
        </thead>
        <?php
        $stmt = $dbCon->prepare("select");
        $stmt->execute()
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
