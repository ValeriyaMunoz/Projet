<?php
/**
 *  class Annonce
 * @param int $id Identifiant de l annonce
 * @param string $title Title d annonce
 * @param string $description Description de l annonce
 * @param float $prix Prix de l annonce
 * @param string $photo Chemin pour recuperer du photo de l annonce
 * @param string $statut_echange_ou_paiement Montre le statut si c est l echange ou si c est pour vendre
 * @param string $Statut_annonce_validee_bloque Montre statut de l annonce pour l utilisateur (1 -"If faut modifier"; 2-"Validée"; 3-"Bloqué"; 4-"En attente de validation";
 * @param string $ville Nom de ville de l utilisateur
 * @param string $nom_categorie Categorie de l annonce
 * @param string $idCategorie id Categorie de l annonce
 * @param string $date_de_creation de l annonce
 * @param string $duree_publication Combien le temps l annonce va reste publiée
 * @param string $date_validation par l administrateur
 */
class Annonce
{
  private $id;
  private $title;
  private $description;
  private $prix;
  private $photo;
  private $statut_echange_ou_paiement;
  private $Statut_annonce_validee_bloque;
  private $ville;
  private $nom_categorie;
  private $idCategorie;
  private $date_de_creation;
  private $duree_publication;
  private $date_validation;
  private $date_fin_annonce;



  // Des functions getter et setter
   public function getDateValidation(){
    return $this->date_validation;
  }
   public function getDureePublication(){
    return $this->duree_publication;
  }
   public function getStatut_annonce_validee_bloque(){
    return $this->Statut_annonce_validee_bloque;
  }
  public function getStatut(){
    return $this->statut_echange_ou_paiement;
  }
    public function getDateCreationAnnonce(){
    return $this-> date_de_creation;
  }
     public function getDateFinAnnonce(){
    return $this-> date_fin_annonce;
  }

  public function getIdCategorie(){
    return $this->idCategorie;
  }
 public function getCategorie(){
    return $this->nom_categorie;
  }

  public function getId(){
    return $this->id;
  }
   public function getVille(){
    return $this->ville;
  }
  public function getTitle(){
    return $this->title;
  }
  public function setTitle($title){
    $this->title=$title;
  }
  public function getDescription(){
    return $this->description;
  }
  public function setDescription($description){
    $this->description=$description;
  }
  public function getPrix(){
    return $this->prix;
  }
  public function setPrix($prix){
    $this->prix=$prix;
  }
    public function getPhoto(){
      return $this->photo;
   }
  public function setPhoto($photo){
    $this->photo[]= $photo;
  }

  //chargement d'annonces dans la page d'accueil by order 'date_de_creation'
  public function chargerAnnonce($orderby, $num_annonce){
    $AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnonce($orderby);
    //if($annonce && is_array($annonce) && isset($annonce[$num_annonce])){
        //print_r($annonce);
      $this->id=$annonce[$num_annonce]['id'];
      $this->title=$annonce[$num_annonce]['titre'];
      $this->description=$annonce[$num_annonce]['description'];
      $this->prix=$annonce[$num_annonce]['prix'];
      $this->ville=$annonce[$num_annonce]['ville'];
      $this->Statut_annonce_validee_bloque=[$num_annonce]['Statut_annonce_validee_bloque'] ?? 4;
      $photo=$AnnonceModel->getMainPhoto($this->id);
      $this->photo=$photo['fichier_chemin'];
    //}
    //ptint_r($photo);
 
  }
// Afficher tous les annonces pour l admin
  public function showAllAnnonces($num_annonce){
  $AnnonceModel=new AnnonceModel();
  $annonce=new Annonce();
  $showAnnonces= $AnnonceModel->AdminShowAllAnnonces();
  //var_dump($showAnnonces);
  if(isset($showAnnonces)&& $showAnnonces && is_array($showAnnonces)){
    $this->id=$showAnnonces[$num_annonce]['id'];
    $this->title=$showAnnonces[$num_annonce]['titre'];
    $this->description=$showAnnonces[$num_annonce]['description'];
    $this->prix=$showAnnonces[$num_annonce]['prix'];
     $this->ville=$showAnnonces[$num_annonce]['ville'];
    $this->photo[] = $AnnonceModel->getPhotobyId($this->id);
    $this->statut_echange_ou_paiement=$showAnnonces[$num_annonce]['statut_echange_ou_paiement'];
    $this->Statut_annonce_validee_bloque=$showAnnonces[$num_annonce]['Statut_annonce_validee_bloque'];
    $this->vildate_de_creationle=$showAnnonces[$num_annonce]['date_de_creation'];
    $this->date_fin_annonce=$showAnnonces[$num_annonce]['date_fin_annonce'];
    $this->duree_publication=$showAnnonces[$num_annonce]['duree_publication'];
    $this->date_validation=$showAnnonces[$num_annonce]['date_validation'];
     $this->idcategorie=$AnnonceModel->getCategorie($this->id);
    $this->idmembre=$AnnonceModel->getidMembrebyIDAnnonce($this->id);
  }
  }
// charger des annonce user dans la page Mes Annonce
    public function chargerAnnonceUser($id,$orderby, $num_annonce){
    $AnnonceModel=new AnnonceModel();
    //print_r($num_annonce);
    $annonce=$AnnonceModel->getAnnoncebyIdUser($id,$orderby);
    //print_r($annonce);
    $this->id=$annonce[$num_annonce]['id'];
    $this->title=$annonce[$num_annonce]['titre'];
    $this->description=$annonce[$num_annonce]['description'];
    $this->prix=$annonce[$num_annonce]['prix'];
    $this->ville=$annonce[$num_annonce]['ville'];
    $this->Statut_annonce_validee_bloque=$annonce[$num_annonce]['Statut_annonce_validee_bloque'];
    $this->photo[] = $AnnonceModel->getPhotobyId($this->id);
    //$categorie=$AnnonceModel->getCategorie($this->id);
    //$this->categorie=$categorie['nom_categorie'];
   
    //ptint_r($photo);
 
  }

public function StatutAnnonce($statut){
 
    switch ($statut) 
        {

            case "1":
            return "If faut modifier";
            break;
            case "2":
             return "Validée";
            break;
            case "3":
             return "Bloqué";
            break;
            case "4":
             return "En attente de validation";
            break;
}
}


  //chargement d'annonce dans la page d'annonce_detail by Id
  public function chargerAnnonceById($idannonce){
    //print_r($idannonce);
    $AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnoncebyId($idannonce);
    //print_r($annonce);
    $this->id=$annonce['id'];
    $this->title=$annonce['titre'];
    $this->description=$annonce['description'];
    $this->prix=$annonce['prix'];
     $this->ville=$annonce['ville'];
    $this->photo[] = $AnnonceModel->getPhotobyId($idannonce);
    $this->statut_echange_ou_paiement=$annonce['statut_echange_ou_paiement'];
    $this->Statut_annonce_validee_bloque=$annonce['Statut_annonce_validee_bloque'];
    $this->ville=$annonce['ville'];
    $this->statut_echange_ou_paiement=$annonce['statut_echange_ou_paiement'];
     //$categorie=$AnnonceModel->getCategorie($this->id);
    //$this->categorie=$categorie['nom_categorie'];
  }


public function CreeAnnonce($id){

$AnnonceModel=new AnnonceModel();
if(!empty($_POST)){
        if(!empty($_POST["titre"]) && strlen($_POST["titre"])>=3){
        $titre=(htmlspecialchars($_POST["titre"]));

             if(!empty($_POST["description"]) && strlen($_POST["description"])>=3){
             $description=(htmlspecialchars($_POST["description"]));

                if(!empty($_POST["prix"]) && ($_POST["prix"])>0){
                $prix=(htmlspecialchars(round($_POST["prix"]),2));

                    if(!empty($_POST["ville"] )){
                     $ville = htmlspecialchars($_POST["ville"]);

                       $action=$_POST['statut'];
                        switch($action){

                        case 'Vendre':
                        $statut_echange_ou_paiement=1;
                        break;

                        case 'Echange':
                        $statut_echange_ou_paiement=0;
                        break;
                        }
//print_r($_POST);
                              $action_categorie=$_POST['categorie'];
                              switch($action_categorie){

                              case 'jeux':
                              $nom_categorie="JOUET&JEUX";
                              $idCategorie=1;
                              break;

                              case 'habillement':
                              $nom_categorie="HABILLEMENT";
                              $idCategorie=2;
                              break;

                               case 'maison':
                              $nom_categorie="MAISON ET CUISINE";
                              $idCategorie=3;
                              break;

                               case 'electronique':
                              $nom_categorie="ELECTRONIQUE";
                              $idCategorie=4;
                              break;
                              }
      
       $date_de_creation=date('Y-m-j H:i:s');
        //$date_de_creation=$datetime->date;
    

        $idAnnonce=$AnnonceModel->creeNouvelleAnnonce($id,$titre,$description,$prix,$ville,$statut_echange_ou_paiement,$date_de_creation,$idCategorie);
      
                        //print_r($_FILES);
                          if(isset($_FILES['file'])){
                            foreach($_FILES['file']['error'] as $k=>$error){
                            //Si le fichier a bien été téléchargé et qu'il n'y a pas eu d'erreur
                                if ($error == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
                                    $old_name=$_FILES['file']['name'][$k];
                                    $new_name="ID_user".$id."Annonce-".$idAnnonce."-".$k.".jpg";
                                    //$image= new Imagick($new_name);
                                    //$image->adaptativeResizeImage(1024,768);
                                
                                    //print_r($new_name);
                                    //rename($old_name,$new_name);
                                    $fichier_chemin="assets/image_user/".basename($new_name);
                                    //print_r($fichier_chemin);
                                    //enregistrement du ficher
                                    move_uploaded_file($_FILES['file']['tmp_name'][$k],$fichier_chemin);
                                    
                                    if($k==0){
                                    $is_main_photo=1;
                                    }else{
                                     $is_main_photo=0;   
                                    }
                                   
                                    
         $nouvelle_annonce_photo=$AnnonceModel->creeNouvelleAnnoncePhoto($idAnnonce,$fichier_chemin,$is_main_photo);
    //print_r($fichier_chemin);      
                                }else{
                                     echo "Mauvais format de la photo téléchargée";
                                }
                            
                            }
                            }else{
                                 echo "Remplissez tous les champs";
                            }
                        
                    }else{
                    echo "Entrez une ville existante";
                    }
                }else{
                    echo "Entrez un prix supérieur à zéro";
                }
             }else{
            echo "Entrez une description plus longue";
             }
        }else{
            echo "Entrez un titre plus long";
        }
}else{
    echo "Remplissez tous les champs";
}
}


public function SupprimerAnnonceOui($idAnnonce,$idUser){
$AnnonceModel=new AnnonceModel();
$photosServer[]=$AnnonceModel->MontrerCheminPhoto($idAnnonce);
 foreach($photosServer[0] as $k=>$val){
  $filename=$photosServer[0][$k][0];
  unlink($filename);
 }
$AnnonceModel->SupprimerAnnonce($idAnnonce,$idUser);

}

public function ModificationAnnonce($idAnnonce,$id){
  //print_r($idannonce);

$AnnonceModel=new AnnonceModel();
$this->chargerAnnonceById($idAnnonce);

        if(!empty($_POST["titre"]) && strlen($_POST["titre"])>=3){
           $titre=(htmlspecialchars($_POST["titre"]));
        }else{
          $titre=$this->getTitle();
          //print_r($titre); 
        }

        if(!empty($_POST["description"]) && strlen($_POST["description"])>=3){
             $description=(htmlspecialchars($_POST["description"]));
        }else{
            $description=$this->getDescription();
            //print_r($description);
             }

        if(!empty($_POST["prix"]) && ($_POST["prix"])>0){
            $prix=(htmlspecialchars(round($_POST["prix"]),2));
        }else{
            $prix=$this->getPrix();
           // print_r($prix);
        }

        if(!empty($_POST["ville"] )){
          $ville = htmlspecialchars($_POST["ville"]);
        }else{
          $ville =$this->getVille();
           //print_r($ville);
          }
          //print_r($_POST);
        if(!empty($_POST["statut"])){

              $action=$_POST['statut'];
              switch($action){

              case 'Vendre':
              $statut_echange_ou_paiement=1;
              break;

              case 'Echange':
              $statut_echange_ou_paiement=0;
              break;
              }
              
            }else{
             $statut_echange_ou_paiement=$this->getStatut();
             //print_r( $statut_echange_ou_paiement);
            }
            //print_r($_POST);
                    if(!empty($_POST["categorie"])){
                              $action_categorie=$_POST['categorie'];
                              switch($action_categorie){

                              case 'jeux':
                              $nom_categorie="JOUET&JEUX";
                              $idCategorie=1;
                              break;

                              case 'habillement':
                              $nom_categorie="HABILLEMENT";
                              $idCategorie=2;
                              break;

                               case 'maison':
                              $nom_categorie="MAISON ET CUISINE";
                              $idCategorie=3;
                              break;

                               case 'electronique':
                              $nom_categorie="ELECTRONIQUE";
                              $idCategorie=4;
                              break;
                              }
                            }else{
                              $idCategorie=$this->getIdCategorie();
                            }  

           


  $nouvelle_annonce=$AnnonceModel->ModifierAnnonce($idAnnonce,$titre,$description,$prix, $ville,$statut_echange_ou_paiement,$idCategorie);
                //print_r($_FILES['file']['name'][0]);       
    if(filesize($_FILES['file']['name'][0])!=0 ){
     $deletePhoto=$AnnonceModel->DeleteLastPhoto($idAnnonce);
        foreach($_FILES['file']['error'] as $k=>$error){
        //Si le fichier a bien été téléchargé et qu'il n'y a pas eu d'erreur
            if ($error == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
                $old_name=$_FILES['file']['name'][$k];
                $new_name="ID_user".$id."Annonce-".$idAnnonce."-".$k.".jpg";
                $fichier_chemin="assets/image_user/".basename($new_name);
                //print_r($_FILES);
                //print_r($fichier_chemin);    
                //enregistrement du ficher
                if(isset($_FILES['file']['tmp_name'][$k])){
                move_uploaded_file($_FILES['file']['tmp_name'][$k],$fichier_chemin);
                }
                if($k==0){
                $is_main_photo=1;
                }else{
                  $is_main_photo=0;   
                }
                
     // print_r($fichier_chemin);          
$nouvelle_annonce_photo=$AnnonceModel->ModifierAnnoncePhoto($idAnnonce,$fichier_chemin,$is_main_photo);
  
            }else{ 
              $fichier_chemin=$this->getPhoto();
              }
            }
      }else{
         $fichier_chemin=$this->getPhoto();

      }

}


public function chargerAnnoncebyCategorie($idCategorie, $num_annonce){
$AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnoncebyCategorie($idCategorie);
    $this->id=$annonce[$num_annonce]['id'];
    $this->title=$annonce[$num_annonce]['titre'];
    $this->description=$annonce[$num_annonce]['description'];
    $this->prix=$annonce[$num_annonce]['prix'];
    $this->Statut_annonce_validee_bloque=[$num_annonce]['Statut_annonce_validee_bloque'] ?? 4;
    $photo=$AnnonceModel->getMainPhoto($this->id);
    $this->photo=$photo['fichier_chemin'];
    //$categorie=$AnnonceModel->getCategorie($this->id);
    //$this->categorie=$categorie['nom_categorie'];
}

public function chargerAnnoncebyStatut($Statut_annonce_validee_bloque, $num_annonce){
$AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnoncebyStatut($Statut_annonce_validee_bloque);
    $this->id=$annonce[$num_annonce]['id'];
    $this->title=$annonce[$num_annonce]['titre'];
    $this->description=$annonce[$num_annonce]['description'];
    $this->prix=$annonce[$num_annonce]['prix'];
    $this->ville=$annonce[$num_annonce]['ville'];
    $this->Statut_annonce_validee_bloque=[$num_annonce]['Statut_annonce_validee_bloque'] ?? 4;
    $photo=$AnnonceModel->getMainPhoto($this->id);
    $this->photo=$photo['fichier_chemin'];
    $categorie=$AnnonceModel->getCategorie($this->id);
    $this->nom_categorie=$categorie;
    //print_r($categorie);
    //$this->categorie=$categorie['nom_categorie'];

    
}


public function categories($idCategorie){
    
        switch($idCategorie){

        case '1':
        $nom_categorie="JOUET&JEUX";
        break;

        case '2':
        $nom_categorie="HABILLEMENT";
        break;

          case '3':
        $nom_categorie="MAISON ET CUISINE";
        break;

          case '4':
        $nom_categorie="ELECTRONIQUE";
        break;
        }

 return $nom_categorie;

}

public function adminModifierAnnonce($idAnnonce){
  $Statut_annonce_validee_bloque=1;
  $AnnonceModel=new AnnonceModel();
  $admin_modifier=$AnnonceModel->adminModifierAnnoncebyIdAnnonce($idAnnonce, $Statut_annonce_validee_bloque);
  $from="admin@lm.com";
                  //print_r($from);
          $EmailUser=$AnnonceModel->RecupererEmailUserbyIdAnnonce($idAnnonce);
                $to=$EmailUser;
                $subject="";
                $headers=array('From:'=> $from,
                'MIME6Version'=>'1.0',
                'Content-type'=>'text/html;charset=utf-8',
                'Reply-To:'=> $to,
                'X-Mailer'=>' PHP/' . phpversion());
                $message= "Vous avez publié une annonce sur notre site Web ". NAME_SITE." Votre annonce a été renvoyée pour révision. Cela peut signifier que certains champs ne correspondent pas à votre annonce.";
                $mail=mail($to,$subject,$message,$headers);
  
}

public function adminValiderAnnonce($idAnnonce){
 $Statut_annonce_validee_bloque=2;
  $AnnonceModel=new AnnonceModel();
  $admin_valider=$AnnonceModel->adminModifierAnnoncebyIdAnnonce($idAnnonce, $Statut_annonce_validee_bloque);
  $from="admin@lm.com";
                  //print_r($from);
          $EmailUser=$AnnonceModel->RecupererEmailUserbyIdAnnonce($idAnnonce);
                $to=$EmailUser;
                $subject="";
                $headers=array('From:'=> $from,
                'MIME6Version'=>'1.0',
                'Content-type'=>'text/html;charset=utf-8',
                'Reply-To:'=> $to,
                'X-Mailer'=>' PHP/' . phpversion());
                $message= "Vous avez publié une annonce sur notre site Web ". NAME_SITE." Votre annonce a été validée.";
                $mail=mail($to,$subject,$message,$headers);
  $date_fin_annonce=date('Y-m-j',strtotime('+30 days'));
  $date_validation=date('Y-m-j H:i:s');
  $duree_publication=30;

  $date_validation=$AnnonceModel->ajouterDateValidation($idAnnonce,$date_fin_annonce,$date_validation,$duree_publication);
}

public function adminBloquerAnnonce($idAnnonce){
   $Statut_annonce_validee_bloque=3;
     $AnnonceModel=new AnnonceModel();
  $admin_bloquer=$AnnonceModel->adminModifierAnnoncebyIdAnnonce($idAnnonce, $Statut_annonce_validee_bloque);
  $from="admin@lm.com";
                  //print_r($from);
          $EmailUser=$AnnonceModel->RecupererEmailUserbyIdAnnonce($idAnnonce);
                $to=$EmailUser;
                $subject="";
                $headers=array('From:'=> $from,
                'MIME6Version'=>'1.0',
                'Content-type'=>'text/html;charset=utf-8',
                'Reply-To:'=> $to,
                'X-Mailer'=>' PHP/' . phpversion());
                $message= "Vous avez publié une annonce sur notre site Web ". NAME_SITE." Votre annonce a été bloquée. Il peut contenir du contenu interdit. Consultez nos politiques";
                $mail=mail($to,$subject,$message,$headers);

}
 /*public function testjson()
    {
        // si on souhaite gérer des appels AJAX, on peut directement renvoyer du JSON, sans avoir besoin d'une vue
        $result = array("name" => "toto", "age" => 31, "country" => "France") ;
        echo json_encode($result);
    }*/



}

?>
