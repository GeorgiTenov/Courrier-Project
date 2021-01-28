<?php
include "includeSettlement.php";

$id;
$offices = array();
if(isset($_POST["id"])){
  $id = $_POST["id"];
  $settlement = Database::getSettlementById($id);
  $offices = $settlement -> getOffices();

  if(count($offices) <= 0){
    echo "No data to show";
  }
}

?>
<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    $(".btnC").click(function(){
        var id = $(this).val();
        $.post("showCourriers.php",{id:id}, function(text) {
                   $("#courriers").html(text);});

                   $.post("showAutomobiles.php",{id:id}, function(text) {
                               $("#automobiles").html(text);});

                               $.post("showSettlementsByOffice.php",{id:id}, function(text) {
                                           $("#settlementsByOffice").html(text);});
                           });
               });



</script>
<link rel="stylesheet" href="../styles/showSettlements.css">
<link rel="stylesheet" href="../styles/login.css">
<link rel="stylesheet" href="../styles/office.css">
<br>
<table>
<tr>
  <?php foreach($offices as $office):; ?>
    <?php foreach ($offices as $office):;?>
      <b>Офиси</b>
      <?php break; ?>
    <?php endforeach;?>
  <th><button class="btnC" value="<?php echo $office -> getOfficeId() ?>"/><?php echo $office -> getName(); ?>  </th>
<?php endforeach; ?>
</tr>
<tr>
  <?php foreach($offices as $office):; ?>
   <td> <b>Адрес:</b><?php echo $office -> getAddress() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($offices as $office):; ?>
   <td> <b>Телефон:</b><?php echo $office -> getTelephone() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($offices as $office):; ?>
   <td> <b>Мениджър:</b><?php echo $office -> getManager() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($offices as $office):; ?>
   <td> <b>Работно време:</b><?php echo $office -> getWorkingHours() ?></td>
  <?php endforeach;?>
</tr>
  <tr>
    <?php foreach ($offices as $office):;?>
     <td><a class="editLink" href="editOffice.php?id=<?php echo $office -> getOfficeId() ?>">Редактирай</a></td>
     <?php endforeach; ?>
    <tr>
</table>
<br>
<footer>

  <div id="automobiles"></div>

<div id="courriers"></div>

<div id="settlementsByOffice"></div>
</footer>
