<?php
  include "includeDb.php";
  $id;
  $automobiles;
  $courriers;
  $isCourrierEmpty = false;

  if(isset($_POST["id"])){
    $id = $_POST["id"];
    $office = Database::getOfficeById($id);
    $automobiles= $office -> getAutomobiles();
  }

  if(!is_null($automobiles)){
    foreach($automobiles as $automobile){
      if(!is_null($automobile -> getCourrier())){
        $courriers[] = $automobile -> getCourrier();
      }
    }
  }

if(empty($courriers)){
  $isCourrierEmpty = true;
  echo "No Courriers to show";
}
  if(count($automobiles) <= 0){
    echo "No data to show";
  }
 ?>

 <table>
 <tr>
   <?php foreach($automobiles as $automobile):; ?>
     <?php foreach ($automobiles as $automobile):;?>
       <b>Автомобили</b>
       <?php break; ?>
     <?php endforeach;?>
   <th><button class="btnAutomobile" value="<?php echo $automobile -> getAutomobileId() ?>"/><?php echo $automobile -> getBrand(); ?>  </th>
 <?php endforeach; ?>
 </tr>
 <tr>
   <?php foreach($automobiles as $automobile):; ?>
    <td> <b>Модел:</b><?php echo $automobile -> getModel() ?></td>
   <?php endforeach;?>
 </tr>
 <tr>
   <?php foreach($automobiles as $automobile):; ?>
    <td> <b>Регистрация:</b><?php echo $automobile -> getRegistration() ?></td>
   <?php endforeach;?>
 </tr>
 <tr>
   <?php foreach($automobiles as $automobile):; ?>
    <td> <b>Разход на гориво:</b><?php echo $automobile -> getConsumption() ?></td>

   <?php endforeach;?>
 </tr>

 <tr>
   <?php if(!$isCourrierEmpty):; ?>
   <?php foreach($courriers as $courrier):; ?>
    <td> <b>Куриер:</b><?php echo $courrier -> getFirstName()." ".$courrier -> getLastName(); ?></td>
   <?php endforeach;?>
  <?php endif; ?>
 </tr>
 <?php foreach($automobiles as $automobile):; ?>
  <td><a class="editLink" href="editAutomobile.php?id=<?php echo $automobile -> getAutomobileId() ?>">Редактирай</a></td>
 <?php endforeach;?>
 <tr>

 </tr>
 </table>
