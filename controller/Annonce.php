<?php
/**
 *  class Annonce
 * @param int $id Identifiant de l annonce
 * @param string $title Title d annonce
 * @param string $description Description de l annonce
 * @param float $prix Prix de l annonce
 * @param string $photo Chemin pour recuperer du photo de l annonce
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


  // Des functions getter et setter
   public function getStatut_annonce_validee_bloque(){
    return $this->Statut_annonce_validee_bloque;
  }
  public function getStatut(){
    return $this->statut_echange_ou_paiement;
  }
  public function getId(){
    return $this->id;
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
    $this->photo=$photo;
  }

  //chargement d'annonces dans la page d'accueil by order 'date_de_creation'
  public function chargerAnnonce($orderby, $num_annonce){
    $AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnonce($orderby);
    $this->id=$annonce[$num_annonce]['id'];
    $this->title=$annonce[$num_annonce]['titre'];
    $this->description=$annonce[$num_annonce]['description'];
    $this->prix=$annonce[$num_annonce]['prix'];
    $this->Statut_annonce_validee_bloque=[$num_annonce]['Statut_annonce_validee_bloque'] ?? 4;
    $photo=$AnnonceModel->getMainPhoto($this->id);
    $this->photo=$photo['fichier_chemin'];
   
    //ptint_r($photo);
 
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
    $this->Statut_annonce_validee_bloque=$annonce[$num_annonce]['Statut_annonce_validee_bloque'];
    $this->photo[] = $AnnonceModel->getPhotobyId($this->id);
   
   
    //ptint_r($photo);
 
  }

function StatutAnnonce($statut){
 
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
    $AnnonceModel=new AnnonceModel();
    $annonce=$AnnonceModel->getAnnoncebyId($idannonce);
    $this->id=$annonce['id'];
    $this->title=$annonce['titre'];
    $this->description=$annonce['description'];
    $this->prix=$annonce['prix'];
    $this->photo[] = $AnnonceModel->getPhotobyId($idannonce);
    $this->statut_echange_ou_paiement=$annonce['statut_echange_ou_paiement'];
    $this->Statut_annonce_validee_bloque=$annonce['Statut_annonce_validee_bloque'];
  }


function CreeAnnonce(){
    $id=$_SESSION['id'];
    //$annonce= new Annonce();
    //$annonce->chargerAnnonceById($id);
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
      
       $date_de_creation=date('Y-m-j H:i:s');
        //$date_de_creation=$datetime->date;
    

        $idAnnonce=$AnnonceModel->creeNouvelleAnnonce($id,$titre,$description,$prix,$ville,$statut_echange_ou_paiement,$date_de_creation);
        

              
                        //print_r($_FILES);
                          if(isset($_FILES['file'])){
                            foreach($_FILES['file']['error'] as $k=>$error){
                            //Si le fichier a bien été téléchargé et qu'il n'y a pas eu d'erreur
                                if ($error == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
                                    $old_name=$_FILES['file']['name'][$k];
                                    $new_name="ID_user".$id."Annonce-".$idAnnonce."-".$k.".jpg";
                                    $image= new Imagick($new_name);
                                    $image->adaptativeResizeImage(1024,768);
                                
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


function SupprimerAnnonceOui(){
$AnnonceModel=new AnnonceModel();
$idAnnonce=$_SESSION['idAnnonce'];
$AnnonceModel->SupprimerAnnonce($idAnnonce);

}
 /*public function testjson()
    {
        // si on souhaite gérer des appels AJAX, on peut directement renvoyer du JSON, sans avoir besoin d'une vue
        $result = array("name" => "toto", "age" => 31, "country" => "France") ;
        echo json_encode($result);
    }*/
}

?>
