<?php
//print_r($_SESSION['id']);
$user= new User();
$user->chargerAllInfoUserById($_SESSION['id']);
 $AnnonceModel=new AnnonceModel();
    $annonce=new Annonce();
    $idMembre=$_SESSION['id'];
    $nb_annonce = $AnnonceModel->CountAnnoncebyID($idMembre);
   

?>
<section>
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="?p=mes_annonces">MES ANNONCES</a></li>
            <li class="breadcrumb-item"><a href="?p=messagerie">MESSAGERIE</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="?p=account">PROFILE</a></li>
          </ol>
        </nav>
      </div>
    </div>
</section>
<?php
   
   
    for($i=0;$i<=$nb_annonce-1;$i++):
        $annonce->chargerAnnonceUser($idMembre,"date_de_creation", $i);
        $photo=$annonce->getPhoto();
     
       
    ?>
        <div class="card mb-4 box-shadow-sm">
          <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?php echo $annonce->getTitle(); ?></h4>
              <div class="card-body">
                <?php
                foreach($photo[$i] as $k=>$val){
                 echo "<img src=".$val[0]." class='img_thumbnail'>";
                  }
                  ?>
                
                <p class=""><?php echo $annonce->getDescription() ?></p>
                <p class=""><?php echo "Prix: ".$annonce->getPrix() ?></p>
            <?php
              $nb_statut=$annonce->getStatut_annonce_validee_bloque();
              $statut=$annonce->StatutAnnonce($nb_statut);   ?>
               <p>Statut de l'annonce:  <?php echo $statut ?? "à l'étude"; ?></p>
 
            
         
            <form action="?p=modification_annonce" method= "get"> 
               <input type="hidden" name="p" value="modification_annonce">  
              <input type="hidden" name="idAnnonce" value="<?php echo $annonce->getId();?>">
              <button class="btn btn-outline-primary" type="submit" tardet="_blank">MODIFIER L'ANNONCE</button>
            </form>
          
              <form action="?p=supprimer_annonce" method= "get"> 
               <input type="hidden" name="p" value="supprimer_annonce">  
              <input type="hidden" name="idAnnonce" value="<?php echo $annonce->getId();?>">
              <button class="btn btn-outline-primary" type="submit" tardet="_blank">SUPPRIMER L'ANNONCE</button>
              </form>
            
          </div>
          </div>

        <?php endfor;?>
  </div>

    	  