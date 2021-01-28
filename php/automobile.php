<?php

include  "includeDb.php";

include "includeCourrier.php";

class Automobile{

  private $automobile_id;

  private $brand;

  private $model;

  private $registration;

  private $consumption;

  public function __construct($automobile_id,$brand,$model,$registration,$consumption){
    $this -> automobile_id = $automobile_id;
    $this -> brand = $brand;
    $this -> model = $model;
    $this -> registration = $registration;
    $this -> consumption = $consumption;
  }

  //get id
  public function getAutomobileId(){
    return $this -> automobile_id;
  }

  //brand
  public function setBrand($brand){
    $this -> brand = $brand;
    Database::update("automobile","brand",$brand,"automobile_id",$this -> automobile_id);
  }

  public function getBrand(){
    return $this -> brand;
  }

  //model
  public function setModel($model){
    $this -> model = $model;
    Database::update("automobile","model",$model,"automobile_id",$this -> automobile_id);
  }

  public function getModel(){
    return $this -> model;
  }

  //registration
  public function setRegistration($registration){
    $this -> registration = $registration;
    Database::update("automobile","registration",$registration,"automobile_id",$this -> automobile_id);
  }

  public function getRegistration(){
    return $this -> registration;
  }

  //consumption
  public function setConsumption($consumption){
    $this -> consumption = $consumption;
    Database::update("automobile","consumption",$consumption,"automobile_id",$this -> automobile_id);
  }

  public function getConsumption(){
    return $this -> consumption;
  }

  //get courrier
  //USED SQL PROCEDURE
  public function getCourrier(){
      Database::connect();
      $id = $this -> automobile_id;

      $result = Database::executeQuery("CALL `getCourrierByAutomobileId`($id);");

      $numRows = mysqli_num_rows($result);
      $courrier;
      if($numRows > 0){
        while($row = mysqli_fetch_assoc($result)){
          $courrier_id = $row["courrier_id"];

          $personalNumber = $row["personal_number"];

          $username = $row["username"];

          $password = $row["pass_word"];

          $firstName = $row["first_name"];

          $midName = $row["mid_name"];

          $lastName = $row["last_name"];

          $telephone=$row["telephone"];

          $courrier = new Courrier($courrier_id,$personalNumber,$username,$password,$firstName,$midName,$lastName,$telephone);
        }
      }
      return $courrier;
  }
}

?>
