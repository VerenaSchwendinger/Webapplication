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
            <th>Show Tables</th>
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
                <form action="db-schema_tables.php?database=<?php echo $database ?>" method="POST">
                    <td><a class="nav-link"><button>Tables</button></a></td>
                </form>
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>