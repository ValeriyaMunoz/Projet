<?php
//print_r($_SESSION['id']);
$user= new User();
$user->chargerAllInfoUserById($_SESSION['id']);

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

    	      <a href ="index.php?p=modification_annonce">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">MODIFIER L'ANNONCE</button>
        </a>
          <a href ="index.php?p=supprimer_annonce">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">SUPPRIMER L'ANNONCE</button>
        </a> 