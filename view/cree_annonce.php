<?php
$id=$_SESSION['id'];

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
		<input type="hidden" name="action" value="cree_annonce" >
			<h5>DEPOSER UNE ANNONCE</h5>

				<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              
				
				<label for="file">Télécharger des photo:</label>
				 <input type="file" name="file[]" id="file" multiple>
				

		      	<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              <label for="titre">Titre</label>
		              <input id="titre" class="form-control" type="text" name="titre" placeholder="Entrer un titre" required>
		            </div>

		         <div class="col-md-6">
		              <label for="description">Description</label>
		              <textarea id="description" class="form-control" type="text" name="description" placeholder="Entrer une description" required></textarea>
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
		           <div class="row">
		         <div class="col-md-6">
		              <label for="prix">Prix</label>
		              <input id="prix" class="form-control" type="text" name="prix" placeholder="Entrer le prix" required>
		          </div>
		
                  
                  <div class="col-md-6">
                      <input id="statut"  type="radio" name="statut" value= "Vendre" checked>Vendre
                      <input id="statut"  type="radio" name="statut" value="Echange"> Echange
                </div>


		    
		            <div class="col-md-6">
		              <label for="ville">Ville</label>
		              <input id="ville" class="form-control" type="text" name="ville" placeholder="Entrer votre ville">
		            </div>
	
		     
		    <div class="form-group">
			<input type="hidden" name="idannonce" value="<?php echo $id;?>">
		      <button class="btn btn-primary" type="submit">DEPOSER</button>
		</div>

	</div>
	 </div>
</div>
</form>
	


