<?php
 $AnnonceModel=new AnnonceModel();
 $annonce=new Annonce();
  $nb_annonce = $AnnonceModel->CountAnnonceForAdmin();
  //var_dump($annonce);
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
                <th scope='titre'>Titre</th>
                <th scope='description'>Description</th>
                <th scope='date_de_creation'>Date de creation</th>
                <th scope='prix'>Prix</th>
                <th scope='ville'>Ville</th>
                <th scope='Statut_annonce_validee_bloque'>Statut annonce</th>
                <th scope='date_fin_annonce'>Date fin annonce</th>
                <th scope='idMembre'>idMembre</th>
                <th scope='duree_publication'>Duree publication (j)</th>
                <th scope='date_validation'>Date validation</th>
                <th scope='idCategorie'>idCategorie</th>
                <th scope='photo'>chemin_photo</th>
                
            </tr>
        </thead>
         <tbody>
            <?php  
          
            //foreach ( $annonce as $k=>$val) :
                 for($i=0;$i<=$nb_annonce-1;$i++):
                 $annonce->showAllAnnonces($i);
                //var_dump($annonce);
                //print_r($val);
                
                 ?>
                 
                <tr>
                <td><?= $annonce->getId();?></td>
                <td><?= htmlentities($annonce->getTitle()); ?></td>
                <td><?= htmlentities($annonce->getDescription()); ?></td>
                <td><?= $annonce->getDateCreationAnnonce(); ?></td>
                <td><?= htmlentities($annonce->getPrix()); ?></td>
                <td><?= htmlentities($annonce->getVille()); ?></td>
                <td><?= $annonce->getStatut_annonce_validee_bloque(); ?></td>
                <td><?= $annonce->getDateFinAnnonce(); ?></td>
               <?php $idMembre=$AnnonceModel->getidMembrebyIDAnnonce($annonce->getId()); ?>
                <td><?= $idMembre[0];?></td>
                <td><?= $annonce->getDureePublication(); ?></td>
                <td><?= $annonce->getDateValidation();?></td>
                <td><?= $AnnonceModel->getCategorie($annonce->getId());?></td>
                <td><?= $annonce->getPhoto()[0][0][0];
                //$AnnonceModel->getMainPhoto($annonce->getId());?></td>
              <div class='row'>
                 <div class='col'>
                     <td>
                         <form action="?p=modification_annonce" method= "get"> 
               <input type="hidden" name="p" value="modification_annonce">  
              <input type="hidden" name="idAnnonce" value="<?php echo $annonce->getId();?>">
              <button class="btn btn-outline-primary" type="submit" tardet="_blank">Modifier</abutton>
                 </form>
                         <form action="?p=supprimer_annonce" method= "get"> 
               <input type="hidden" name="p" value="supprimer_annonce">  
              <input type="hidden" name="idAnnonce" value="<?php echo $annonce->getId();?>">
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
