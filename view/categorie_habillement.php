<?php
    $AnnonceModel=new AnnonceModel();
    $annonce=new Annonce();
    $nom_categorie="HABILLEMENT";
    $idCategorie=2;
    $nb_annonce = $AnnonceModel->CountAnnonceCategorie($idCategorie);
    for($i=0;$i<=$nb_annonce-1;$i++):
        $annonce->chargerAnnoncebyCategorie($idCategorie, $i);
    ?>
        <div class="card mb-4 box-shadow-sm">
          <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?php echo $annonce->getTitle(); ?></h4>
              <div class="card-body">
                <img src="<?php echo "http://localhost/projet/".$annonce->getPhoto();?>" class="img_thumbnail">
                <p class=""><?php echo $annonce->getDescription() ?></p>
                <p class=""><?php echo "Prix: ".$annonce->getPrix() ?></p>
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