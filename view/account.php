<?php
//print_r($_SESSION['id']);
$user= new User();
$user->chargerAllInfoUserById($_SESSION['id']);
//print_r($user->getUrl_photo_profil());

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

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src='<?php
    echo "http://localhost/Projet/".$user->getUrl_photo_profil();?>' alt="avatar"
              class="rounded-circle img-fluid" style="width: 300px;">
            <h5 class="my-3"><?php echo $user->getNom()." ". $user->getPrenom(); ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <a href ="index.php?p=new_message">
             <button class="btn btn-outline-primary" type="submit" tardet="_blank">Message</button>
            </a>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
       
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom/Prenom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->getNom()." ". $user->getPrenom(); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->getEmail() ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Telephone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->getTelephone() ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->getAdresse() ?></p>
              </div>
              <hr>
               <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Code Postale</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->getCodePostale() ?></p>
              </div>
            </div>
          </div>
        </div>
         <a href ="index.php?p=modification_info">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">MODIFIER INFORMATION</button>
        </a>
          <a href ="index.php?p=supprimer_compte">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">SUPPRIMER LE COMPTE</button>
        </a> 
         
  </div>
</section>

