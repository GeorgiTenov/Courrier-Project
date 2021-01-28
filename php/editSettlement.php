<?php
include "includeDb.php";
  $id;
  $settlement;
  if(isset($_GET["id"])){
      $id = $_GET["id"];
      $settlement = Database::getSettlementById($id);
  }
?>

<link rel="stylesheet" href="../styles/edit.css">
<div class="form-container">
<form  action="" method="POST">
  <b>Име<b>:<input type ="text" name="name" value="<?php echo $settlement -> getName(); ?>">
  <b>Област<b>:<input type ="text" name="region" value ="<?php echo $settlement -> getRegion()?>">
  <b>Община:<b><input type ="text" name="municipality" value="<?php echo $settlement -> getMunicipality(); ?>">
  <b>Пощенски код<b>:<input type ="text" name="postCode" value="<?php echo $settlement -> getPostCode(); ?>">
  <input type="submit" name="submit" value="Редактирай" class="submitBtn">
</form>
</div>

<?php
if(isset($_POST["submit"])){
  //get inputs
  $name = $_POST["name"];
  $region = $_POST["region"];
  $municipality = $_POST["municipality"];
  $postCode = $_POST["postCode"];


  //set
  $settlement-> setName($name);
  $settlement -> setRegion($region);
  $settlement -> setMunicipality($municipality);
  $settlement -> setPostCode($postCode);

}
?>
