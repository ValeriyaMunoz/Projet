<?php

//print_r($_SESSION['id']);
$user= new User();
$id=$_GET['idUser'];
//print_r($id);


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


    <h2>SUPPRESSION DE COMPTE</h2>
       <p>Vous-etes sur?</p>
 
     <form method="POST" action="" class="container">
        <input type="hidden" name="action" value="oui_supprimer_admin" >
        <input type="hidden" name="idUser" value="<?php echo $id;?>">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">OUI</button>
     </form>  
        <a href ="?p=admin_users">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">NON</button>
        </a>
  
  </form>