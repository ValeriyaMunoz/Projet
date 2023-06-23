
  <?php
 $UserModel=new UserModel();
 $user=new User();
 $nb_user = $UserModel->CountUserForAdmin();
  //var_dump($nb_user);
 //$show_annonce=$annonce->showAllAnnonces();

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

    <div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='id'>id</th>
                <th scope='nom'>Nom</th>
                <th scope='prenom'>Prenom</th>
                <th scope='adresse'>Adresse</th>
                <th scope='email'>Email</th>
                <th scope='code_postale'>Code postale</th>
                <th scope='telephone'>Telephone</th>
                <th scope='Username'>Username</th>
                <th scope='date_naissance'>Date de naissance</th>
                <th scope='url_photo_profil'>Url_photo_profil</th>
                <th scope='montant_cagnotte'>Montant du cagnotte</th>
                <th scope='actif'>Actif</th>
                <th scope='Ville'>Ville</th>
                <th scope='is_admin'>is_admin</th>
                
            </tr>
        </thead>
         <tbody>
            <?php  
          
            for($i=0;$i<=$nb_user-1;$i++):
                 $user->showAllUser($i);
        
                 ?>
                 
                <tr>
                <td><?= $user->getId();?></td>
                <td><?= htmlentities($user->getNom()); ?></td>
                <td><?= htmlentities($user->getPrenom()); ?></td>
                <td><?= htmlentities($user->getAdresse()); ?></td>
                <td><?= htmlentities($user->getEmail()); ?></td>
                <td><?= htmlentities($user->getCodePostale()); ?></td>
                <td><?= htmlentities($user->getTelephone()); ?></td>
                <td><?= htmlentities($user->getUsername()); ?></td>
                <td><?= htmlentities($user->getDateNaissance()); ?></td>
                <td><?= $user->getUrl_photo_profil(); ?></td>
                <td><?= $user->getMontant_cagnotte(); ?></td>
                <td><?= $user->getActif(); ?></td>
                <td><?= htmlentities($user->getVille()); ?></td>
                <td><?= $user->getIsAdmin(); ?></td>
                
                <div class='row'>
                 <div class='col'>
                     <td>
               <form action="?p=modification_user_admin" method= "get">       
               <input type="hidden" name="p" value="modification_user_admin">  
              <input type="hidden" name="idUser" value="<?php echo $user->getId();?>">
              <button class="btn btn-outline-primary" type="submit" tardet="_blank">Modifier</button>
            </form>
                <form action="?p=supprimer_account_admin" method= "get">       
               <input type="hidden" name="p" value="supprimer_account_admin">  
                <input type="hidden" name="idUser" value="<?php echo $user->getId();?>">
               <button class="btn btn-outline-primary" type="submit" tardet="_blank">Supprimer</button></td>
                </form>      
                    </td>
                </tr>
                 </div>
             </div>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
