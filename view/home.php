
<h3 class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">ANNONCES</h3><br>
<!-- <div  class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm"> -->
<div class="d-flex flex-wrap" >
    <?php
    $AnnonceModel=new AnnonceModel();
    $annonce=new Annonce();
    $nb_annonce = $AnnonceModel->CountAnnonce();
    ?>
     <div class="card mb-4 box-shadow-sm">
     
       <?php
       
    for($i=0;$i<=$nb_annonce-1;$i++):
        $annonce->chargerAnnonce("date_de_creation", $i);
    ?>
       
          <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?php echo $annonce->getTitle(); ?></h4>
              <div class="card-body">
                <img src="<?php echo "http://localhost/projet/".$annonce->getPhoto();?>" class="img_thumbnail">
                <p class=""><?php echo $annonce->getDescription() ?></p>
                <p class=""><?php echo "Prix: ".$annonce->getPrix() ?></p>
                    <p class=""><?php echo "Ville: ".$annonce->getVille() ?></p>
            <form action="?p=annonce_detail" method= "get">
              <input type="hidden" name="p" value="annonce_detail">  
              <input type="hidden" name="id" value="<?php echo $annonce->getId();?>">
              <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Voir l'annonce</button>
            </form>
          </div>
          </div>

        <?php endfor;?>
        
    </div>
</div>
