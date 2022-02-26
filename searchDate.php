<div class="container">

<form class="d-flex" method="POST" action="?page=search">
<fieldset>
    <fieldset class="form-group">
      <legend class="mt-4">Datum</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1">
          voriger Monat
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
          aktueller Monat
        </label>
      </div>
    </fieldset>
    <input class="btn btn-secondary my-2 my-sm-0" type="submit" name="btnSubmit" value="Search">
  </fieldset>   
</form>

<?php
if(isset($_POST['btnSubmit']))
{
    $id=$_POST['id'];
    $month=$_POST['optionsRadios'];
    ?>  
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
            </tr>
        </thead>
        <?php
        $timestamp = time();

        if($month == 'option2')
        {
            $month = date("Y-m-", $timestamp);
        }
        else if($month == 'option1')
        {
            $month = date("Y-m-", strtotime("-1 months"));
        }
        else
        {
            $month = '';
        }

        if($month == '')
        {
            $sql = "select all";
        }
        else
        {
            $sql = "select...";
        }
        $stmt = $dbCon->prepare($sql);
        $stmt->bindParam(':id', $_POST['id']);
        if($month != '')
        {
            $stmt->bindParam(':month', $month);
        }   
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