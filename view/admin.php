
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="?p=admin_annonces">ANNONCES</a></li>
            <li class="breadcrumb-item"><a href="?p=admin_users">USERS</a></li>
            <li class="breadcrumb-item"><a href="?p=admin">VALIDATION</a></li>
          </ol>
        </nav>
      </div>
    </div>

    <?php
    
    $AnnonceModel=new AnnonceModel();
    $annonce=new Annonce();
    $Statut_annonce_validee_bloque=4;
    $nb_annonce = $AnnonceModel->CountAnnonceStatus($Statut_annonce_validee_bloque);
    for($i=0;$i<=$nb_annonce-1;$i++):
        $annonce-> chargerAnnoncebyStatut($Statut_annonce_validee_bloque, $i);
    ?>
        <div class="card mb-4 box-shadow-sm">
          <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?php echo $annonce->getTitle(); ?></h4>
              <div class="card-body">
                <img src="<?php echo "http://localhost/projet/".$annonce->getPhoto();?>" class="img_thumbnail">
                <p class=""><?php echo $annonce->getDescription() ?></p>
                <p class=""><?php echo "Prix: ".$annonce->getPrix() ?></p>
                <p class=""><?php echo "Ville: ".$annonce->getVille() ?></p>
                <p class=""><?php echo "Categorie: ".$annonce->getCategorie() ?></p>


            <form action="?p=annonce_detail" method= "get">
              <input type="hidden" name="p" value="admin_modifier">  
              <input type="hidden" name="id" value="<?php echo $annonce->getId();?>">
              <button type="submit" class="btn btn-lg btn-block btn-outline-primary">MODIFIER</button>
            </form>

               <form action="?p=annonce_detail" method= "get">
              <input type="hidden" name="p" value="admin_valider">  
              <input type="hidden" name="id" value="<?php echo $annonce->getId();?>">
              <button type="submit" class="btn btn-lg btn-block btn-outline-primary">VALIDER</button>
            </form>

                <form action="?p=annonce_detail" method= "get">
              <input type="hidden" name="p" value="admin_bloquer">  
              <input type="hidden" name="id" value="<?php echo $annonce->getId();?>">
              <button type="submit" class="btn btn-lg btn-block btn-outline-primary">BLOQUER</button>
            </form>
          </div>
          </div>

        <?php endfor;?>
        </div>
</div>
