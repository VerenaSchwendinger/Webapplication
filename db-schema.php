<?php
    include 'navbar.php';
    include 'db-connection.php';
    $dbCon = getDBConnection();
?>

<div class="container">
<table class="table table-hover">
    <thead>
        <tr>
            <th>DB Name</th>
        </tr>
    </thead>
    <?php
    $sql = "show databases";
    $stmt = $dbCon->query($sql);
    $stmt->execute();
    ?>
    <tbody>
        <tr>
            <?php
            while($database = $stmt->fetchColumn(0))
            {
                ?>
                <td><?php echo$database?></td>
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>
