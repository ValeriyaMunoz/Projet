<?php

//print_r($_SESSION['id']);
$user= new User();
$id=$_GET['idUser'];
$user->chargerAllInfoUserById($id);


?>

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

    <div class="row pt-5">
	<div class="col-lg-8 offset-lg-2 col-12 pt-5">
			
	<form  method="POST" enctype="multipart/form-data" action="">
		<input type="hidden" name="action" value="modification_user_admin" >
			<h5>MODIFICATION DES INFORMATION</h5>

				<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		    
				
				<label for="url_photo_profil">Changer la photo:</label>
				<input type="file" id="url_photo_profil" name="url_photo_profil">
				

		      	<div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              <label for="nom">Nom</label>
		              <input id="nom" class="form-control" type="text" name="nom" placeholder="<?php echo $user->getNom() ??  "Entrer votre nom"?>">
		            </div>

		         <div class="col-md-6">
		              <label for="prenom">Prénom</label>
		              <input id="prenom" class="form-control" type="text" name="prenom" placeholder="<?php echo $user->getPrenom() ??  "Entrer votre prénom"?>">
		          </div>
				
		          </div>
		      </div>
			  
		
		         <div class="col-md-6">
		              <label for="username">Username</label>
		              <input id="username" class="form-control" type="text" name="username" placeholder="<?php echo $user->getUsername() ??  "Entrer votre nouveau Username"?>">
		          </div>
		
		      <div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              <label for="email">Email</label>
		              <input id="email" class="form-control" type="email" name="email" placeholder="<?php echo $user->getEmail() ?? "Entrer votre email"?>">
		            </div>
	
		            <div class="col-md-6">
		              <label for="telephone">Numéro de télephone</label>
		              <input id="telephone" class="form-control" type="tel" name="telephone" placeholder="<?php echo $user->getTelephone() ?? "Entrer votre numéro de telephone"?>">
		            </div>
			
		          </div>
		      </div>
	
			  <div class="form-group">
		          <div class="row">
		            <div class="col-md-6">
		              <label for="ville">Ville</label>
		              <input id="ville" class="form-control" type="text" name="ville" placeholder="<?php echo $user->getVille() ?? "Entrer votre ville" ?>">
		            </div>
		
		            <div class="col-md-6">
		              <label for="code_postale">Code postale</label>
		              <input id="code_postale" class="form-control" type="number" name="code_postale" placeholder="<?php echo $user->getCodePostale() ?? "Entrer votre code postale"?>">
		            </div>
		          </div>
		
		      <div class="form-group">
		          <div class="row">
		            <div class="col-12">
		              <label for="adresse">Adresse</label>
		              <input id="adresse" class="form-control" type="text" name="adresse" placeholder="<?php echo $user->getAdresse() ?? "Entrer votre adresse"?>">
		            </div>
		          </div>
		      </div>
		
			  			
		      <div class="form-group">
		          <div class="row">
		            <div class="col-12">
		              <label for="date_naissance">Date de naissance</label>
		              <input id="date_naissance" class="form-control" type="date" name="date_naissance" placeholder="<?php echo $user->getDatenaissance() ?? "Entrer votre date de naissance"?>">
		            </div>
		          </div>
		      </div>
               <div class="form-group">
		          <div class="row">
		            <div class="col-12">
		              <label for="montant_cagnotte">Montant du cagnotte</label>
		              <input id="montant_cagnotte" class="form-control" type="number" name="montant_cagnotte" placeholder="<?php echo $user->getMontant_cagnotte() ?? "Montant cagnotte"?>">
		            </div>
		          </div>
		      </div>
               <div class="form-group">
		          <div class="row">
		            <div class="col-12">
		              <label for="actif">Actif</label>
		              <input id="actif" class="form-control" type="number" name="actif" placeholder="<?php echo $user->getActif() ?? "Actif"?>">
		            </div>
		          </div>
		      </div>
                 <div class="form-group">
		          <div class="row">
		            <div class="col-12">
		              <label for="is_admin">Is admin</label>
		              <input id="is_admin" class="form-control" type="number" name="is_admin" placeholder="<?php echo $user->getIsAdmin() ?? "Is Admin"?>">
		            </div>
		          </div>
		      </div>



		    <div class="form-group">
                <form method="POST" action="" class="container">
               <input type="hidden" name="action" value="modifier_user_admin" >
             <input type="hidden" name="id" value="<?php echo $id; ?>">
		      <button class="btn btn-primary" type="submit">MODIFIER</button>
            </form>
			  </div>
</form>
		</div>
	</div>
