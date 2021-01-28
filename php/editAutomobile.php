<?php
include "includeDb.php";
  $id;
  $automobile;
  if(isset($_GET["id"])){
      $id = $_GET["id"];
      $automobile = Database::getAutomobileById($id);
  }
?>

<link rel="stylesheet" href="../styles/edit.css">
<div class="form-container">
<form class="edit" action="" method="POST">
  <b>Марка<b>:<input type ="text" name="brand" value="<?php echo $automobile -> getBrand(); ?>">
  <b>Модел<b>:<input type ="text" name="model">
  <b>Регистрационен номер:<b>:<input type ="text" name="registration" value="<?php echo $automobile -> getRegistration(); ?>">
  <b>Разход на гориво<b>:<input type ="text" name="consumption" value="<?php echo $automobile -> getConsumption(); ?>">
  <input type="submit" name="submit" value="Редактирай" class="submitBtn">
</form>
</div>

<?php
if(isset($_POST["submit"])){
  //get inputs
  $brand = $_POST["brand"];
  $model = $_POST["model"];
  $registration = $_POST["registration"];
  $consumption = $_POST["consumption"];
  //set
  $automobile -> setBrand($brand);
  $automobile -> setModel($model);
  $automobile -> setRegistration($registration);
  $automobile -> setConsumption($consumption);
}
?>
