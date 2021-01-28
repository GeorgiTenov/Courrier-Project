<?php
include "includeDb.php";
include "includeOffice.php";
class Settlement{
  private $settlement_id;

  private $name;

  private $region;

  private $municipality;

  private $postCode;

  public function __construct($settlement_id,$name,$region,$municipality,$postCode){
    $this -> settlement_id = $settlement_id;
    $this -> name = $name;
    $this -> region = $region;
    $this -> municipality = $municipality;
    $this -> postCode = $postCode;
  }

  //get id
  public function getSettlementId(){
    return $this -> settlement_id;
  }
  //name
  public function setName($name){
    $this -> name = $name;
    Database::update("settlement","name",$name,"settlement_id",$this -> settlement_id);
  }

  public function getName(){
    return $this -> name;
  }

  //region
  public function setRegion($region){
    $this -> region = $region;
    Database::update("settlement","region",$region,"settlement_id",$this -> settlement_id);
  }

  public function getRegion(){
    return $this -> region;
  }

  //municipality
  public function setMunicipality($municipality){
    $this -> municipality = $municipality;
    Database::update("settlement","municipality",$municipality,"settlement_id",$this -> settlement_id);
  }

  public function getMunicipality(){
    return $this -> municipality;
  }

  //post code
  public function setPostCode($postCode){
    $this -> postCode = $postCode;
    Database::update("settlement","post_code",$postCode,"settlement_id",$this -> settlement_id);
  }

  public function getPostCode(){
    return $this -> postCode;
  }

  //get offices
  public function getOffices(){
    $id = $this -> settlement_id;
    Database::connect();
    $result = Database::executeQuery("CALL `getOfficesBySettlementId`($id);");
    $numRows = mysqli_num_rows($result);
    $offices = array();
    if($numRows > 0){
      while($row = mysqli_fetch_assoc($result)){
          $office_id = $row["office_id"];
          $name = $row["name"];
          $address = $row["address"];
          $telephone = $row["telephone"];
          $manager = $row["manager"];
          $workingHours = $row["working_hours"];

          $office = new Office($office_id,$name,$address,$telephone,$manager,$workingHours);

          $offices[] = $office;
      }
    }
    return $offices;
  }
}

?>
