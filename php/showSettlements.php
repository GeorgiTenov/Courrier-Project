<?php
include "includeDb.php";
include "showOffices.php";
$settlements = Database::getAllSettlements();
?>
<link rel="stylesheet" href="../styles/showSettlements.css">
<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
</script>
<script>
$(document).ready(function(){
    $(".btn").click(function(){
        var id = $(this).val();
        $.post("showOffices.php",{id:id}, function(text) {
                   $("#offices").html(text);});
    })
});
</script>
<br>
    <table>
    <tr>
      <?php foreach($settlements as $settlement):; ?>
      <th><button class="btn" value="<?php echo $settlement -> getSettlementId() ?>"/><?php echo $settlement -> getName(); ?>  </th>
    <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach($settlements as $settlement):; ?>
       <td> <b>Област:</b><?php echo $settlement -> getRegion() ?></td>
      <?php endforeach;?>
    </tr>
    <tr>
      <?php foreach($settlements as $settlement):; ?>
       <td> <b>Община:</b><?php echo $settlement -> getMunicipality() ?></td>
      <?php endforeach;?>
    </tr>
    <tr>
      <?php foreach($settlements as $settlement):; ?>
       <td> <b>Пощенски код:</b><?php echo $settlement -> getPostCode() ?></td>
      <?php endforeach;?>
    </tr>
    </table>
    <br>

    <div id="offices"></div>
