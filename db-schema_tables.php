<?php
    include 'navbar.php';
    include 'db-connection.php';
    $dbCon = getDBConnection();

    $database = $_GET["database"];
?>

<div class="container">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Table Name</th>
            <th>Describe Tables</th>
            <th>Show Data</th>
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
                <td><a class="nav-link" href="db-schema_describeTable.php?table=<?php echo $table?>&database=<?php echo $database?>"><button>Describe</button></a></td>
                    <td><a class="nav-link" href="db-schema_showData.php?table=<?php echo $table?>&database=<?php echo $database?>"><button>Data</button></a></td>  
                </tr>
                <?php
            }
            ?>  
    </tbody>
</table>