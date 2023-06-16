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
<?php
 $id=$_SESSION['id'];
 
 $idAnnonce=$_GET['idAnnonce'];
 //print_r($idAnnonce);
 //$_SESSION['idAnnonce']=$idAnnonce;


 $annonce=new Annonce();
$annonce->chargerAnnonceById($idAnnonce);
 
 //$annonce_title= $annonce->chargerAnnonceById($id);

?>
 
 
    <h5>SUPPRESSION DE L'ANNONCE?</h5>
   
       <p>Etes-vous sur de vouloir supprimer l'annonce <?php echo $annonce->getTitle(); ?></p>
       <form method="POST" action="" class="container">
        <input type="hidden" name="action" value="oui_supprimer" >
        <input type="hidden" name="idannonce" value="<?php echo $idAnnonce;?>">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">OUI</button>
     </form>  
        <a href ="?p=non_supprimer">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">NON</button>
        </a>
      
       

