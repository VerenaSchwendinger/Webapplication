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
            <th>Type</th>
            <th>Null</th>
            <th>Key</th>
            <th>Default</th>
            <th>Extra</th>
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
                <td><?php echo$row['Type']?></td>
                <td><?php echo$row['Null']?></td>
                <td><?php echo$row['Key']?></td>
                <td><?php echo$row['Default']?></td>
                <td><?php echo$row['Extra']?></td>
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>
