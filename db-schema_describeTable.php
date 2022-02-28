<?php
    include 'navbar.php';
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Field</th>
            <th>All other fields from DB</th>
        </tr>
    </thead>
    <?php
    $db = $dbCon->query("use $database");
    $db->execute();
    $stmt = $dbCon->prepare("describe $table");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <tbody>
        <tr>
            <?php
            foreach($result as $row)
            {
                ?>
                <td><?php echo$row['Field']?></td>
                <td><?php echo$row['All other fields from db']?></td>
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>
