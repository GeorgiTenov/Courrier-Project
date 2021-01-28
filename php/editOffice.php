<?php
include "includeDb.php";
  $id;
  $office;
  if(isset($_GET["id"])){
      $id = $_GET["id"];
      $office = Database::getOfficeById($id);
  }
?>

<link rel="stylesheet" href="../styles/edit.css">
<div class="form-container">
<form action="" method="POST">
  <b>Име<b>:<input type ="text" name="name" value="<?php echo $office -> getName(); ?>">
  <b>Адрес<b>:<input type ="text" name="address" value ="<?php echo $office -> getAddress()?>">
  <b>Телефон:<b><input type ="text" name="telephone" value="<?php echo $office -> getTelephone(); ?>">
  <b>Мениджър<b>:<input type ="text" name="manager" value="<?php echo $office -> getManager(); ?>">
  <b>Работно време:<b><input type ="text" name="workingHours" value="<?php echo $office -> getWorkingHours(); ?>">
  <input type="submit" name="submit" value="Редактирай" class="submitBtn">
</form>
</div>

<?php
if(isset($_POST["submit"])){
  //get inputs
  $name = $_POST["name"];
  $address = $_POST["address"];
  $telephone = $_POST["telephone"];
  $manager = $_POST["manager"];
  $workingHours = $_POST["workingHours"];

  //set
  $office -> setName($name);
  $office -> setAddress($address);
  $office -> setTelephone($telephone);
  $office -> setManager($manager);
  $office -> setWorkingHours($workingHours);

}
?>
