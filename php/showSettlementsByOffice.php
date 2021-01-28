<?php

include "includeDb.php";

$id;
$settlements = array();
if(isset($_POST["id"])){
  $id = $_POST["id"];
  $office = Database::getOfficeById($id);
  $settlements = $office -> getSettlements();
}
if(count($settlements) <= 0){
  echo "No data to show";
}
?>
<link rel="stylesheet" href="../styles/linksEdit.css">
<br>
<table>
<tr>
  <?php foreach($settlements as $settlement):; ?>
    <?php foreach ($settlements as $settlement):;?>
      <b>Населено място</b>
      <?php break; ?>
    <?php endforeach;?>
  <th><button class="btnC" value="<?php echo $settlement -> getSettlementId() ?>"/><?php echo $settlement -> getName(); ?>  </th>
<?php endforeach; ?>
</tr>
<tr>
  <?php foreach($settlements as $settlement):; ?>
   <td> <b>Област:</b><?php echo $settlement -> getRegion() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($settlements as $settlement):; ?>
   <td> <b>Община:</b><?php echo $settlement -> getMunicipality() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($settlements as $settlement):; ?>
   <td> <b>Пощенски код:</b><?php echo $settlement -> getPostCode() ?></td>

  <?php endforeach;?>
</tr>
  <tr>
    <?php foreach ($settlements as $settlement):;?>
     <td><a class="editLink" href="editSettlement.php?id=<?php echo $settlement -> getSettlementId() ?>">Редактирай</a></td>
     <?php endforeach; ?>
    <tr>
</table>
<br>
