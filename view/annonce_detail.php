<?php

$id_annonce=$_GET['id'];
$annonce=new Annonce();
$annonce->chargerAnnonceById($id_annonce);

$photo = $annonce->getPhoto();

?>

<div class="card mb-4 box-shadow-sm">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal"><?php echo $annonce->getTitle(); ?></h4>
  </div>
  <div class="card-body">
    <?php
    foreach($photo[0] as $k=>$val){
      echo "<img src=".$val[0]." class='img_thumbnail'>";
    }
    ?>
   
  <p class=""><?php echo $annonce->getDescription(); ?></p>
  <p class=""><?php echo "Prix: ".$annonce->getPrix()."€"; ?></p>
    <form action="" method= "get">
      <input type="hidden" name="idannonce" value="<?php echo $annonce->getId();?>">
      <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Acheter</button>
    </form>
  </div>
</div>

<?php

?>
