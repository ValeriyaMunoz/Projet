<?php
if(session_status() !== PHP_SESSION_ACTIVE)
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Exo:wght@200&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title><?= $title?></title>
</head>
<body>
  
    <div id="header">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../image/logo.jpg" width=200px></h5>
            <nav class="my-2 my-md-0 mr-md-3">
            <a class=" p-2 text-dark" id="deposer" href="annonce.php" name="annonce">DEPOSER UNE ANNONCE</a>
            <a class="p-2 text-dark" href="../categorie.php" name="jeux">JOUET&JEUX</a>
            <a class="p-2 text-dark" href="../categorie.php"name="habillement">HABILLEMENT</a>
            <a class="p-2 text-dark" href="../categorie.php"name="maison">MAISON ET CUISINE</a>
            <a class="p-2 text-dark" href="../categorie.php"name="electronique">ELECTRONIQUE</a>
            <input class="form-control rounded" type="search" placeholder="Effectuez une recherche" aria-label="Search" aria-describedby="search-addon"/>
            <button class="btn btn-outline-primary" type="button" >RECHERCHER</button>
            
      
    <?php
 if(!isset($_SESSION["connection"])){
    $_SESSION["connection"]=0;
}
 if ($_SESSION["connection"]==0){?>
    
    <div class="connection">
    <a class="btn btn-outline-primary" href="../connexion.php" name="connection" tardet="_blank">SE CONNECTER</a>
    </div>
   
<?php }else{?>

    <div id="right_buttons" class="deconnection">
            <a class="btn btn-outline-primary" href="../index.php" name="deconnection" tardet="_blank">SE DECONNECTER</a>
    </div>

    <form method="post" action="../panier.php">
            <div id="panier">
            <button class="btn btn-outline-primary" type="submit" name="panier" tardet="_blank"><img src=image/panier.jpg alt="PANIER" width="30px"></button>
            </div>
    </form>
    <form method="post" action="../favoris.php">
            <div id="favoris">
            <button class="btn btn-outline-primary" type="submit" name="favoris" tardet="_blank"><img src=image/favoris.png alt="FAVORIS" width="30px"></button>
            </div>
    </form>
    </form method="post" action="projet/message.php">
            <div id="message">
            <button class="btn btn-outline-primary" type="submit" name="message" tardet="_blank"><img src=image/message.png alt="MESSAGE" width="30px"></button>
            </div>
    </form>

<?php }
?>
   </nav> 
  </div>
</div>
</html>

  