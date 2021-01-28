<?php
include "includeDb.php";
  $id;
  $courrier;
  if(isset($_GET["id"])){
      $id = $_GET["id"];
      $courrier = Database::getCourrierById($id);
  }
?>

<link rel="stylesheet" href="../styles/edit.css">
<div class="form-container">
<form  action="" method="POST">
  <b>Персонален номер<b>:<input type ="text" name="personalNumber" value="<?php echo $courrier -> getPersonalNumber(); ?>">
  <b>Потребителско име<b>:<input type ="text" name="username" value ="<?php echo $courrier -> getUsername()?>">
  <b>Парола:<b>:<input type ="text" name="password" value="<?php echo $courrier -> getPassword(); ?>">
  <b>Име<b>:<input type ="text" name="firstName" value="<?php echo $courrier -> getFirstName(); ?>">
  <b>Презиме:<b>:<input type ="text" name="midName" value="<?php echo $courrier -> getMidName(); ?>">
  <b>Фамилия<b>:<input type ="text" name="lastName" value="<?php echo $courrier -> getLastName(); ?>">
  <b>Телефон<b>:<input type ="text" name="telephone" value="<?php echo $courrier -> getTelephone(); ?>">
  <input type="submit" name="submit" value="Редактирай" class="submitBtn">
</form>
<div>

<?php
if(isset($_POST["submit"])){
  //get inputs
  $personalNumber = $_POST["personalNumber"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $firstName = $_POST["firstName"];
  $midName = $_POST["midName"];
  $lastName = $_POST["lastName"];
  $telephone = $_POST["telephone"];

  //set
  $courrier -> setPersonalNumber($personalNumber);
  $courrier -> setUsername($username);
  $courrier -> setPassword($password);
  $courrier -> setFirstName($firstName);
  $courrier -> setMidName($midName);
  $courrier -> setLastName($lastName);
  $courrier -> setTelephone($telephone);
}
?>
