<?php
$user= new User();
$user->chargerAllInfoUserById($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Exo:wght@200&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title><?= $title?></title>
</head>
<body>

    <div id="header">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="assets/image/logo.jpg" width=200px></h5>
            <nav class="my-2 my-md-0 mr-md-3">
            <a class=" p-2 text-dark" id="deposer" href="?p=cree_annonce" name="annonce">DEPOSER UNE ANNONCE</a>
<?php
    if(!isset($_SESSION['actif']) || $_SESSION['actif']==0){
?>
        <a class="btn btn-outline-primary" href="?p=connexion"  tardet="_blank" style="position: relative; float: right;">SE CONNECTER</a>
        <a class="btn btn-outline-primary" href="?p=connexion"  tardet="_blank" style="position: relative; float: right;">CREER UN COMPTE</a>
<?php 
    }else{
?>
        <input type="hidden" name="action" value="deconnect" >
        <a class="btn btn-outline-primary" href="?p=deconnect"  tardet="_blank" style="position: relative; float: right;">SE DECONNECTER</a>

        <a href ="?p=account">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank" style="position: relative; float: right;">MON COMPTE</button>
        </a>

        
        
        
<?php }
?>
<br><br>


            <input class="form-control rounded" type="search" placeholder="Effectuez une recherche" aria-label="Search" aria-describedby="search-addon" />
            <button class="btn btn-outline-primary" type="submit" >RECHERCHER</button>
            <br>
            <a class="p-2 text-dark" href="?p=categorie_jeux" name="jeux">JOUET&JEUX</a>
            <a class="p-2 text-dark" href="?p=categorie_habillement" name="habillement">HABILLEMENT</a>
            <a class="p-2 text-dark" href="?p=categorie_maison"name="maison">MAISON ET CUISINE</a>
            <a class="p-2 text-dark" href="?p=categorie_electronique"name="electronique">ELECTRONIQUE</a>
            


    <?php
    //var_dump($_SESSION['actif']);
if(!isset($_SESSION['actif']) || $_SESSION['actif']==0){?>
    

    <a href ="index.php?p=home">
     <button class="btn btn-outline-primary" type="submit" tardet="_blank">ANNONCES</button>
     </a>

<?php }else{

    if($user->getIsAdmin()==1){?>

     <a href ="?p=admin">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">ADMIN</button>
        </a>

    <?php 
    }
    ?>

        <a href ="?p=panier">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">PANIER</button>
        </a>
        
        <a href ="?p=home">
        <button class="btn btn-outline-primary" type="submit" tardet="_blank">ANNONCES</button>
        </a>


<?php }
?>
   </nav>
  </div>
</div>

