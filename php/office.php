<?php
include "includeCourrier.php";
include "includeDb.php";
include "includeSettlement.php";
include "automobile.php";

class Office{
  private $office_id;

  private $name;

  private $address;

  private $telephone;

  private $manager;

  private $workingHours;

  public function __construct($office_id,$name,$address,$telephone,$manager,$workingHours){
    $this -> office_id = $office_id;
    $this -> name = $name;
    $this -> address = $address;
    $this -> telephone = $telephone;
    $this -> manager = $manager;
    $this -> workingHours = $workingHours;
  }

  //get id
  public function getOfficeId(){
    return $this -> office_id;
  }

  //name
  public function setName($name){
    $this -> name = $name;
    Database::update("office","name",$name,"office_id",$this -> office_id);
  }

  public function getName(){
    return $this -> name;
  }

  //address
  public function setAddress($address){
    $this -> address = $address;
    Database::update("office","address",$address,"office_id",$this -> office_id);
  }

  public function getAddress(){
    return $this -> address;
  }

  //telephone
  public function setTelephone($telephone){
    $this -> telephone = $telephone;
    Database::update("office","telephone",$telephone,"office_id",$this -> office_id);
  }

  public function getTelephone(){
    return $this -> telephone;
  }

  //manager
  public function setManager($manager){
    $this -> manager = $manager;
    Database::update("office","manager",$manager,"office_id",$this -> office_id);
  }

  public function getManager(){
    return $this -> manager;

  }

  //working hours
  public function setWorkingHours($workingHours){
    $this -> workingHours = $workingHours;
    Database::update("office","working_hours",$workingHours,"office_id",$this -> office_id);
  }

  public function getWorkingHours(){
    return $this -> workingHours;
  }

  //get all the curriers working in the office with procedure
  public function getCourriers(){
    $id = $this -> office_id;
    Database::connect();
    $result = Database::executeQuery("CALL `getCourriersByOfficeId`($id);");
    $numRows = mysqli_num_rows($result);
    $courriers = array();
    if($numRows > 0){
      while($row = mysqli_fetch_assoc($result)){
        $courrier_id = $row["courrier_id"];

        $personalNumber = $row["personal_number"];

        $username = $row["username"];

        $password = $row["pass_word"];

        $firstName = $row["first_name"];

        $midName = $row["mid_name"];

        $lastName = $row["last_name"];

        $telephone = $row["telephone"];

        $courrier = new Courrier($courrier_id,$personalNumber,$username,$password,$firstName,$midName,$lastName,$telephone);

        $courriers[] = $courrier;
      }
    }
    return $courriers;
  }

  //get settlements
  public function getSettlements(){
    $id = $this -> office_id;
    Database::connect();
    $result = Database::executeQuery("CALL `getSettlementsByOfficeId`($id);");
    $numRows = mysqli_num_rows($result);
    $settlements = array();
    if($numRows > 0){
      while($row = mysqli_fetch_assoc($result)){
          $settlement_id = $row["settlement_id"];
          $name = $row["name"];
          $region = $row["region"];
          $municipality = $row["municipality"];
          $postCode = $row["post_code"];

          $settlement = new Settlement($settlement_id,$name,$region,$municipality,$postCode);

          $settlements[] = $settlement;
      }
    }
    return $settlements;
  }

//get automobiles
  public function getAutomobiles(){
    $id = $this -> office_id;
    Database::connect();
    $result = Database::executeQuery("CALL `getAutomobilesByOfficeId`($id);");
    $numRows = mysqli_num_rows($result);
    $automobiles = array();
    if($numRows > 0){
      while($row = mysqli_fetch_assoc($result)){
          $automobile_id = $row["automobile_id"];
          $brand = $row["brand"];
          $model = $row["model"];
          $registration = $row["registration"];
          $consumption = $row["consumption"];

          $automobile = new Automobile($automobile_id,$brand,$model,$registration,$consumption);

          $automobiles[] = $automobile;
      }
    }
    return $automobiles;
  }
}

?>
