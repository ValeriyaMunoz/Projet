<?php
//print_r($_SESSION['id']);
//$user= new User();
//$user->chargerAllInfoUserById($_SESSION['id']);
 $AnnonceModel=new AnnonceModel();
 $annonce=new Annonce();
$idUser=$_SESSION['id'];
//print_r($idUser);
$idannonce=$_GET['idAnnonce'];
//print_r($idannonce);
$annonce->chargerAnnonceById($idannonce);

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

<div class="row pt-5">
	<div class="col-lg-8 offset-lg-2 col-12 pt-5">
			
	<form  method="POST" enctype="multipart/form-data" action="">
		<input type="hidden" name="action" value="modification_annonce" >
			<h5>MODIFIER UNE ANNONCE</h5>

				<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              
				
				<label for="file">Télécharger des photo:</label>
				 <input type="file" name="file[]" id="file" multiple>
				

		      	<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              <label for="titre">Titre</label>
		              <input id="titre" class="form-control" type="text" name="titre" placeholder="<?php echo $annonce->getTitle()?>" >
		            </div>

		         <div class="col-md-6">
		              <label for="description">Description</label>
		              <textarea id="description" class="form-control" type="text" name="description" placeholder="<?php echo $annonce->getDescription()?>" ></textarea>
		          </div>
				
		          </div>
		      </div>
			  		<div class="form-group">
			  <div class="row">
		         <div class="col-md-6">
					<label for="categorie_annonce">Choisissez la catégorie</label>
					<select name="categorie" id="categorie_annonce">
					<option value="jeux">JOUET&JEUX</option>
					<option value="habillement">HABILLEMENT</option>
					<option value="maison">MAISON ET CUISINE</option>
					<option value="electronique">ELECTRONIQUE</option>
					</select>

		   </div>
		<div class="form-group">
		          <div class="row">
		         <div class="col-md-6">
		              <label for="prix">Prix</label>
		              <input id="prix" class="form-control" type="text" name="prix" placeholder="<?php echo $annonce->getPrix()?>">
		          </div>
		
                    
                  <div class="col-md-6"> 
                      <input id="statut"  type="radio" name="statut" value= "Vendre" checked>Vendre
                      <input id="statut"  type="radio" name="statut" value="Echange"> Echange
                      <input type="hidden" name="statut" value="">
					</div>


		    
		            <div class="col-md-6">
		              <label for="ville">Ville</label>
		              <input id="ville" class="form-control" type="text" name="ville" placeholder="<?php echo $annonce->getVille()?>">
		            </div>
	
		     
                <br>
                <br>
				
			  <input type="hidden" name="idUser" value="<?php echo $idUser;?>">
              <input type="hidden" name="idAnnonce" value="<?php echo $annonce->getId();?>">
              <button class="btn btn-outline-primary" type="submit" tardet="_blank">MODIFIER</button>
          

	</div>
</div>
</form>
	



         
          
          
           
              

  

    	  