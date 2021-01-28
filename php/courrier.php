<?php
class Courrier{
  private $courrier_id;

  private $personalNumber;

  private $username;

  private $password;

  private $firstName;

  private $midName;

  private $lastName;

  private $telephone;

  public function __construct($courrier_id,$personalNumber,$username,  $password,
                                $firstName,  $midName,$lastName,
                                  $telephone){
          $this -> courrier_id = $courrier_id;
          $this -> personalNumber = $personalNumber;
          $this -> username = $username;
          $this -> password = $password;
          $this -> firstName = $firstName;
          $this -> midName = $midName;
          $this -> lastName = $lastName;
          $this -> telephone = $telephone;
  }

//get id
  public function getCourrierId(){
    return $this -> courrier_id;
  }

//personal number
  public function setPersonalNumber($personalNumber){
    $this -> personalNumber = $personalNumber;
    Database::update("courrier","personal_number",$personalNumber,"courrier_id",$this -> courrier_id);
  }

  public function getPersonalNumber(){
    return $this -> personalNumber;
  }

//username
  public function setUsername($username){
    $this -> username = $username;
    Database::update("courrier","username",$username,"courrier_id",$this -> courrier_id);
  }

  public function getUsername(){
    return $this -> username;
  }

  //password
  public function setPassword($password){
    $this -> password = $password;
    Database::update("courrier","pass_word",$password,"courrier_id",$this -> courrier_id);
  }

  public function getPassword(){
    return $this -> password;
  }

  //first name
  public function setFirstName($firstName){
    $this -> firstName = $firstName;
    Database::update("courrier","first_name",$firstName,"courrier_id",$this -> courrier_id);
  }

  public function getFirstName(){
    return $this -> firstName;
  }

  //mid name
  public function setMidName($midName){
    $this -> midName = $midName;
    Database::update("courrier","mid_name",$midName,"courrier_id",$this -> courrier_id);
  }

  public function getMidName(){
    return $this -> midName;
  }

  //last name
  public function setLastName($lastName){
    $this -> lastName = $lastName;
    Database::update("courrier","last_name",$lastName,"courrier_id",$this -> courrier_id);
  }

  public function getLastName(){
    return $this -> lastName;
  }

  //telephone
  public function setTelephone($telephone){
    $this -> telephone = telephone;
    Database::update("courrier","telephone",$telephone,"courrier_id",$this -> courrier_id);
  }

  public function getTelephone(){
    return $this -> telephone;
  }

}
?>
