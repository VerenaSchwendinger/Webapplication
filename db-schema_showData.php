<?php
    include 'navbar.php';
    include 'db-connection.php';
    $dbCon = getDBConnection();

    $database = $_GET["database"];
    $table = $_GET["table"];
?>

<div class="container">
<table class="table table-hover">
    <?php
    $stmt = $dbCon->query("use $database");
    $stmt->execute();
    $stmt = $dbCon->query("describe $table");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt1 = $dbCon->query("use $database");
    $stmt1->execute();
    $stmt1 = $dbCon->query("select * from $table");
    $stmt1->execute();
    $columnCnt=$stmt1->columnCount();
    ?>
    <thead>
        <tr>
        <?php
                foreach($result as $column)
                {
                    ?>                    
                    <th><?php echo$column['Field']?></th>                   
                    <?php
                }
            ?>  
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
            while($rows = $stmt1->fetch(PDO::FETCH_OBJ))
            {
                foreach($rows as $row)
                {
                    ?>
                    <td><?php echo $row?></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
            ?>   
    </tbody>
</table>