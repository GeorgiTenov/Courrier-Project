<?php
include "includeOffice.php";
$courriers = array();
if(isset($_POST["id"])){
  $id = $_POST["id"];

  $office = Database::getOfficeById($id);
  $courriers = $office -> getCourriers();

  if(count($courriers) <= 0){
    echo "No data to show";
  }
}

?>
<link rel="stylesheet" href="../styles/showSettlements.css">
<link rel="stylesheet" href="../styles/courriers.css">
<table>
<tr>
  <?php foreach($courriers as $courrier):; ?>
    <?php foreach ($courriers as $courrier):;?>
      <b>Куриери</b>
      <?php break; ?>
    <?php endforeach;?>
  <th><button class="btnCourrier" value="<?php echo $courrier -> getCourrierId() ?>"/><?php echo $courrier -> getPersonalNumber(); ?>  </th>
<?php endforeach; ?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Потребителско име:</b><?php echo $courrier -> getUsername() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Парола:</b><?php echo $courrier -> getPassword() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Име:</b><?php echo $courrier -> getFirstName() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Презиме:</b><?php echo $courrier -> getMidName() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Фамилия:</b><?php echo $courrier -> getLastName() ?></td>
  <?php endforeach;?>
</tr>
<tr>
  <?php foreach($courriers as $courrier):; ?>
   <td> <b>Телефон:</b><?php echo $courrier -> getTelephone() ?></td>
  <?php endforeach;?>
</tr>

  <tr>
    <?php foreach ($courriers as $courrier):;?>
     <td><a class="linksEdit" href="editCourrier.php?id=<?php echo $courrier -> getCourrierId() ?>">Редактирай</a></td>
     <?php endforeach; ?>
   </tr>

</table>
