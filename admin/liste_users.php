<?php
$title="Liste utilisateurs";
require_once '../header_admin.php';
require_once '../function.php';

try {
    // Récupération des user avec la fonction getuser() définie dans functions.php
 $user=getuser();
} catch (Exception $e) {
    // Afficher le message en cas d'envoi d'exception
    echo $e->getMessage();
}
?>

<a href='backoffice.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='liste_categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='liste_annonce.php' class='btn btn-secondary m-2 active' role='button'>Annonce</a>



<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Membres</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='id'>id</th>
                <th scope='nom'>Nom</th>
                <th scope='prenom'>Prenom</th>
                <th scope='adresse'>Adresse</th>
                <th scope='code_postale'>Code_postale</th>
                <th scope='telephone'>Telephone</th>
                <th scope='date_inscription'>Date d'inscription</th>
                <th scope='hash'>Hash</th>
                <th scope='date_validite_email'>Date de validite d'email</th>
                <th scope='email'>Email</th>
                <th scope='montant_cagnotte'>Montant de cagnotte</th>
                <th scope='date_naissance'>Date de naissance</th>
                <th scope='is_admin'>Is admin</th>
                <th scope='url_photo_profil'>Url photo de profil</th>
                <th scope='username'>Username</th>
                <th scope='token'>Token</th>
                <th scope='date_validite_token'>Date dvalidite du token</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $use) : ?>
                <tr>
                    <td><?= $use['id'] ?></td>
                    <td><?= htmlentities($use['nom']) ?></td>
                    <td><?= htmlentities($use['prenom']) ?></td>
                    <td><?= htmlentities($use['adresse']) ?></td>
                    <td><?= htmlentities($use['code_postale']) ?></td>
                    <td><?= htmlentities($use['telephone']) ?></td>
                    <td><?= $use['date_inscription'] ?></td>
                    <td><?= $use['hash'] ?></td>
                    <td><?= $use['date_validite_email'] ?></td>
                    <td><?= htmlentities($use['email']) ?></td>
                    <td><?= $use['montant_cagnotte'] ?></td>
                    <td><?= htmlentities($use['date_naissance']) ?></td>
                    <td><?= $use['is_admin'] ?></td>
                    <td><?= $use['url_photo_profil'] ?></td>
                    <td><?= htmlentities($use['username']) ?></td>
                    <td><?= $use['token']?></td>
                    <td><?= $use['date_validite_token'] ?></td>
                    <td>
                        <a class="btn btn-outline-primary" href='user_modif.php?id=<?= $use['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='user_delete.php?id=<?= $use['id'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='ajouter-user.php' role='button'>Ajouter membre</a>
    </div>
</div>



<?php require_once '../footer_admin.php' ?>