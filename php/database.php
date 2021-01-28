<?php
include_once "includeCourrier.php";
include_once "includeOffice.php";
include_once "includeSettlement.php";
class Database{
  private static $SERVER_NAME = "localhost:3307";

  private static $USERNAME = "root";

  private static $PASSWORD = "password";

  private static $DB_NAME = "eurojob";

  private static $conn;


  public static function connect(){
    return self::$conn = mysqli_connect(self::$SERVER_NAME,self::$USERNAME,self::$PASSWORD,self::$DB_NAME);
    checkConnection(self::$conn);
  }

  public static function checkConnection($conn){
    if($conn){
      return true;
    }
    return false;
  }

  public static function executeQuery($query){
    if(self::checkConnection(self::$conn)){
        return mysqli_query(self::$conn,$query);
    }
  }

  public static function getConnection(){
    return self::$conn;
  }

  public static function update($tableName,$columnName,$value,$whereColumn,$whereValue){
    self::connect();
    $sql = "UPDATE $tableName SET $columnName  =  '$value'  WHERE  $whereColumn =  $whereValue";
    self::executeQuery($sql);
  }

//get all automobiles by view in id order
  public static function getAllAutomobiles(){
    self::connect();
    $automobiles = array();
    $sql = "SELECT * FROM view_getallautomobiles";
    $result = self::executeQuery($sql);
    $rowCounts = mysqli_num_rows($result);

    if($rowCounts > 0){
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

  //get all courriers by view in id order
    public static function getAllCourriers(){
      self::connect();
      $courriers = array();
      $sql = "SELECT * FROM view_getallcouriers";
      $result = self::executeQuery($sql);
      $rowCounts = mysqli_num_rows($result);

      if($rowCounts > 0){
        while($row = mysqli_fetch_assoc($result)){
          $courrier_id = $row["courrier_id"];

          $personalNumber = $row["personal_number"];

          $username = $row["username"];

          $password = $row["pass_word"];

          $firstName = $row["first_name"];

          $midName = $row["mid_name"];

          $lastName = $row["last_name"];

          $telephone = $row["telephone"];

          $courrier= new Courrier($courrier_id,$personalNumber,$username,$password,$firstName,$midName,$lastName,$telephone);

          $courriers[] = $courrier;
        }
      }
      return $courriers;
    }

    //get all offices by view in id order
      public static function getAllOffices(){
        self::connect();
        $offices = array();
        $sql = "SELECT * FROM view_getalloffices";
        $result = self::executeQuery($sql);
        $rowCounts = mysqli_num_rows($result);

        if($rowCounts > 0){
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

      //get all settlements by view in id order
        public static function getAllSettlements(){
          self::connect();
          $settlements = array();
          $sql = "SELECT * FROM view_getallsettlements";
          $result = self::executeQuery($sql);
          $rowCounts = mysqli_num_rows($result);

          if($rowCounts > 0){
            while($row = mysqli_fetch_assoc($result)){
              $settlement_id = $row["settlement_id"];

              $name = $row["name"];

              $region = $row["region"];

              $municipality= $row["municipality"];

              $postCode = $row["post_code"];

              $settlement = new Settlement($settlement_id,$name,$region,$municipality,$postCode);

              $settlements[] = $settlement;
            }
          }
          return $settlements;
        }

        public static function getAutomobileById($id){
          Database::connect();
          $sql = "SELECT * FROM automobile WHERE automobile_id = $id";
          $result = self::executeQuery($sql);
          $rowCounts = mysqli_num_rows($result);
          $automobile;
          if($rowCounts > 0){
            while($row = mysqli_fetch_assoc($result)){
              $automobile_id = $row["automobile_id"];

              $brand = $row["brand"];

              $model = $row["model"];

              $registration = $row["registration"];

              $consumption = $row["consumption"];

              $automobile = new Automobile($automobile_id,$brand,$model,$registration,$consumption);

            }
          }
          return $automobile;
        }

        public static function getCourrierById($id){
          Database::connect();
          $sql = "SELECT * FROM courrier WHERE courrier_id = $id";
          $result = self::executeQuery($sql);
          $rowCounts = mysqli_num_rows($result);
          $courrier;

                if($rowCounts > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    $courrier_id = $row["courrier_id"];

                    $personalNumber = $row["personal_number"];

                    $username = $row["username"];

                    $password = $row["pass_word"];

                    $firstName = $row["first_name"];

                    $midName = $row["mid_name"];

                    $lastName = $row["last_name"];

                    $telephone = $row["telephone"];

                    $courrier= new Courrier($courrier_id,$personalNumber,$username,$password
                    ,$firstName,$midName,$lastName,$telephone);

                  }
                }
                return $courrier;
        }

        public static function getOfficeById($id){
          Database::connect();
          $sql = "SELECT * FROM office WHERE office_id = $id";
          $result = self::executeQuery($sql);
          $rowCounts = mysqli_num_rows($result);
          $office;

          if($rowCounts > 0){
            while($row = mysqli_fetch_assoc($result)){
              $office_id = $row["office_id"];

              $name = $row["name"];

              $address = $row["address"];

              $telephone = $row["telephone"];

              $manager = $row["manager"];

              $workingHours = $row["working_hours"];

              $office = new Office($office_id,$name,$address,$telephone,$manager,$workingHours);
            }
          }
          return $office;
        }

        public static function getSettlementById($id){
          self::connect();
          $settlement;
          $sql = "SELECT * FROM settlement WHERE settlement_id = $id";
          $result = self::executeQuery($sql);
          $rowCounts = mysqli_num_rows($result);

          if($rowCounts > 0){
            while($row = mysqli_fetch_assoc($result)){
              $settlement_id = $row["settlement_id"];

              $name = $row["name"];

              $region = $row["region"];

              $municipality= $row["municipality"];

              $postCode = $row["post_code"];

              $settlement = new Settlement($settlement_id,$name,$region,$municipality,$postCode);

            }
          }
          return $settlement;
        }
}

?>
