<?php
$title="Modification utilisateurs";
// Import des fonctions
require_once '../function.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un membre. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'user avec l'id spécifié. 
if (isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Charger les informations de l'user depuis la BDD pour remplir le formulaire
    try {
        // Se connecter à la BDD avec la fonction connect() définie dans functions.php
        $db = connect();

        // Préparer $userQuery pour récupérer les informations de l'user
        $userQuery = $db->prepare('SELECT * FROM membre WHERE id= :id');
        // Exécuter la requête
        $userQuery->execute(['id' => $id]);
        // Récupérer les données et les assigner à $user
        $user = $aboQuery->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Afficher le message s'il y a une exception
        echo $e->getMessage();
    }

    // Fermer la connection à la BDD
    $userQuery=null;
    $db=null;
}

// Récupérer les users
$user = getuser();

?>

<?php require_once '../header_admin.php' ?>

<a href='backoffice.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='liste_categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='liste_annonce.php' class='btn btn-secondary m-2 active' role='button'>Annonce</a>
<a href='liste_users.php' class='btn btn-secondary m-2 active' role='button'>Utilisateur</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Utilisateur Form</h1>
</div>
<div class='row'>
    <form method='post' action='add_edit_user.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $use['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='is_admin'></label>
            <input type='number' name='is_admin' class='form-control' id='is_admin' placeholder='Enter is_admin=1, si non is_admin=0' required autofocus value='<?= isset($use['is_admin']) ? htmlentities($use['is_admin']) : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once '../footer_admin.php' ?>