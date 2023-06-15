
<?php
$title="Accuiel";
require_once '../header_admin.php';
require_once '../function.php';

?>

<div class='row'>
    <div class=" align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
        <h3 class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">Bienvenue, Admin!</h3>
        <p class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">Ici vous pouvez gérer les cathegorie d'annonce, les annonces et les utilisateurs !</p>
        <hr class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">Cliquer sur un des boutons ci-dessous pour obtenir une liste des membres ou des types d'abos</p>
        <p class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <a class="p-2 text-dark" href='liste_annonce.php' role='button'>Annonce</a>
            <a class="p-2 text-dark" href='liste_users.php' role='button'>Utilisateur</a>
            <a class="p-2 text-dark" href='liste_categorie.php' role='button'>Categorie</a>
        </p>
    </div>
</div>



<?php
require "../footer_admin.php";   
?>