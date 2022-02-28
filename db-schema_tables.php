<?php
    include 'navbar.php';
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Table Name</th>
        </tr>
    </thead>
    <?php
    $stmt = $dbCon->prepare("show tables from $database");
    $stmt->execute();
    ?>
    <tbody>
        <tr>
            <?php
            while($table = $stmt->fetchColumn(0))
            {
                ?>
                <td><?php echo$table?></td>
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>
