<?php
/**
 *  class User
 * @param int $id Identifiant de l utilisateur
 * @param string $nom Nom de l utilisateur
 * @param string $prenom Prenom de l utilisateur
 * @param string $adresse Adresse de l utilisateur
 * @param string $email Adresse de l utilisateur
 * @param int    $code_postale Code postale de l utilisateur
 * @param int    $telephone Telephone de l utilisateur
 * @param string $password Hash du password de l utilisateur
 * @param string $username Username de l utilisateur (unique)
 * @param int    $date_naissance Date de la naissance de l utilisateur
 * @param string $url_photo_profil Chemin pour recuperer du photo de l utilisateur
 * @param float  $montant_cagnotte NoMontant de cagnotte de l utilisateur
 * @param bool   $actif Montre actif l utilisateur ou pas
 */
class User
{
  private $id;
  private $nom;
  private $prenom;
  private $adresse;
  private $email;
  private $code_postale;
  private $telephone;
  private $password;
  private $username;
  private $date_naissance;
  private $url_photo_profil;
  private $montant_cagnotte;
  private $actif;
  private $ville;


  // Functions getter et setter
  public function getId(){
    return $this->id;
  }
    public function getUrl_photo_profil(){
    return $this->url_photo_profil;
  }

  public function getNom(){
    return $this->nom;
  }
  public function setNom($nom){
    if(strlen($nom)>3){
    $this->nom=$nom;
    }else{
    echo "Saissiser un nom existant";
    }
}
  public function getPrenom(){
    return $this->prenom;
  }
  public function setPrenom($prenom){
     if(strlen($prenom)>3){
    $this->prenom=$prenom;
    }else{
    echo "Saissiser un prenom existant";
    }
}

  public function getAdresse(){
    return $this->adresse;
  }
  public function setAdresse($adresse){
     if(strlen($adresse)>5 && preg_match('/^(\\d{1,}) [a-zA-Z0-9\\s]$/',$adresse)){
    $this->adresse=$adresse;
    }else{
    echo "Saissiser une adresse existant";
    }
    
}
  public function getEmail(){
    return $this->email;
  }
  public function setEmail($email){
    if(preg_match('/^(\\S+@\\S+\\.\\S+)$/',$email)){
      if($email!=$user->getEmail){
      $this->email=$email;
      }else{
      echo "Cet email est déjà utilisée";
      }
    }else{
    echo "Saissiser un email existant";
    }
}

  public function getCodePostale(){
    return $this->code_postale;
  }
  public function setCodePostale($code_postale){
  if ( preg_match ("/^[0-9]{5}$/",$code_postale)){
    $this->code_postale=$code_postale;
  }else{
  echo "Saissiser une code postale existant";
  }
  }
  public function getTelephone(){
    return $this->telephone;
  }
  public function setTelephone($telephone){
   
    $this->telephone=$telephone;
 
  }

  public function getPassword($email){
    $pasword=getUserByEmail($email);
    return $this->password;
  }
 
  public function getUsername(){
    return $this->username;
  }
  public function setUsername($username){
   
     if($username!=$user->getUsername){
     $this->username=$username;
     }else{
      echo "Ce username est déjà utilisé, veuillez en sélectionner un autre";
     }
    }

  public function getDatenaissance(){
    return $this->date_naissance;
  }

  public function setDatenaissance($date_naissance){
   if ( preg_match ("",$date_naissance)){
  $this->date_naissance=$date_naissance;
  }else{
  echo "Saissiser une date de naissance en format xx/xx/xxxx";
  }
   
}
  public function getPhotoprofil(){
    return $this->url_photo_profil;
  }
  public function setPhotoprofil($url_photo_profil){
    $this->url_photo_profil=$url_photo_profil;
}
  public function getMontant_cagnotte(){
    return $this->montant_cagnotte;
  }
  public function setMontant_cagnotte($montant_cagnotte){
    $this->montant_cagnotte=$montant_cagnotte;
}

public function getActif(){
    return $this->actif;
  }
  public function setActif($actif){
    $actif=setActif($actif);
   
}

public function getVille(){
    return $this->ville;
  }
  public function setVille($ville){
    $actif=setVille($ville);
   
}
  //chargement tous les info d'user by Id
  public function chargerAllInfoUserById($id){ 
  $UserModel= new UserModel();
  $user=$UserModel->chargerUserById($id);
  
  $this->id=$user[0]['id'];
  $this->nom=$user[0]['nom'];
  $this->prenom=$user[0]['prenom'];
  $this->adresse=$user[0]['adresse'];
  $this->email=$user[0]['email'];
  $this->code_postale=$user[0]['code_postale'];
  $this->telephone=$user[0]['telephone'];
  $this->password=$user[0]['hash'];
  $this->username=$user[0]['username'];
  $this->date_naissance=$user[0]['date_naissance'];
  $this->montant_cagnotte=$user[0]['montant_cagnotte'];
  $this->actif=$user[0]['actif'];
  $this->ville=$user[0]['ville'];
  $this->url_photo_profil=$user[0]['url_photo_profil'];
   //print_r($user[0]['url_photo_profil']);
  }

//Ajouter un nouvel user après l'enregistrement
function addUser(){
$UserModel=new UserModel();
if(!empty($_POST)){
    if($_POST['pwd']===$_POST['pwd2']){
            if(!empty($_POST["username"])){
               if($UserModel->getUsernames($_POST["username"])===false){
                $username=htmlentities($_POST["username"]);
                 //var_dump($username);
                    if(!empty($_POST["email"])&& filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                         if($UserModel->getUserByEmail($_POST["email"])===false){
                                    $email=htmlentities($_POST["email"]);
                                    //var_dump($email);
                                if (!empty($_POST["pwd"])&& preg_match("/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*?[!?@#$&*^=+-]).{8,}$/", $_POST["pwd"])){
                                    $pwd=password_hash($_POST["pwd"],PASSWORD_DEFAULT);
                                     //var_dump($pwd);
                                    $token=bin2hex(random_bytes(16));
                                    //var_dump($token);
                                    
                                $mail=$UserModel->ActivationUserByMail($pwd,$email,$username,$token);

                                }else{
                                    echo "Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule, 1 caractère spécial";
                                }
                            }else{
                                echo "Cet email est déjà utilisée. Choisissez un autre email"; 
                            }
                        }else{
                            echo "Un compte existe déjà pour cet email";
                        }  
                         
                    }else{
                        echo "L'adresse mail est obligatoire sous la format xxxx@xxx.xx";
                    }
              
               }else{
                     echo "Ce username est déjà utilisé. Choisissez un autre username";
               }
            }else{
               echo "Tous les champs doivent etre remplis.";
            }

    }else{
        echo "Les 2 saisies de mot de passes doivent etre identique.";
    }
}

function modification_info_user(){
    //$id=$_SESSION['id'];
    $user= new User();
    $user->chargerAllInfoUserById($id);
    $UserModel=new UserModel();
    
     // Changer Avatar
if(isset($_FILES['url_photo_profil'])){
        
    //print_r($_FILES);
        //Si le fichier a bien été téléchargé et qu'il n'y a pas eu d'erreur
        if(is_uploaded_file($_FILES['url_photo_profil']['tmp_name']) && ($_FILES['url_photo_profil']['error'] == UPLOAD_ERR_OK)) {
            //unlink($user->getUrl_photo_profil());
          
            $old_name=$_FILES['url_photo_profil']['name'];
 
            $new_name="AvatarID".$id.".jpg";
   
            $url_photo_profil="assets/image_profil/".basename($new_name);
            //enregistrement du ficher
            move_uploaded_file($_FILES['url_photo_profil']['tmp_name'],$url_photo_profil);
         
            
           
        }else{
             $photo_default="assets/image_profil/avatar.jpg";
             $url_photo_profil=$user->getUrl_photo_profil() ?? $photo_default;  
           echo "Mauvais format de la photo téléchargée";
        }
}else{
    $photo_default="assets/image_profil/avatar.jpg";
    $url_photo_profil=$user->getUrl_photo_profil() ?? $photo_default;  
}



        if(!empty($_POST["nom"])){
            $nom=(htmlspecialchars($_POST['nom']));
            
        }else{
             $nom=$user->getNom();
            
        }
        if(!empty($_POST["prenom"])){
            $prenom=(htmlspecialchars($_POST['prenom']));
             
        }else{
            $prenom=$user->getPrenom();
          
        }
      
         if(!empty($_POST["username"])){
                if($UserModel->getUsernames($_POST["username"])===false){
                    $username=(htmlspecialchars($_POST['username']));
                }else{
                 $username=$user->getUsername(); 
                  echo "Ce username est déjà utilisé. Choisissez un autre username"; 
                }
        }else{
            $username=$user->getUsername();  
        }

        if(!empty($_POST["adresse"])){
            $adresse=(htmlspecialchars($_POST['adresse']));
           
        }else{
            $adresse=$user->getAdresse();
        }
        if(!empty($_POST["email"])&& filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
             if(getUserByEmail($_POST["email"])===false){
                $email=(htmlspecialchars($_POST['email']));
             }else{
                $email=$user->getEmail();
                echo "Cet email est déjà utilisée. Choisissez un autre email"; 
             }
        }else{
            $email=$user->getEmail(); 
            
         }
        
        if(!empty($_POST["code_postale"] && preg_match("/[0-9]{5}/",$_POST["code_postale"]))){
            $code_postale=(htmlspecialchars($_POST['code_postale']));
            
        }else{
            $code_postale=$user->getCodePostale();
           
        }
        if(!empty($_POST["telephone"]) && preg_match("/(\+33[1-9][0-9]{8})|(0[1-9][0-9]{8})/",$_POST["telephone"])){
           
            $telephone=(htmlspecialchars($_POST['telephone']));
            
        }else{
            $telephone=$user->getTelephone();
            
        }
    
        if(!empty($_POST["date_naissance"]) && preg_match("/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/",$_POST["date_naissance"])){
            if($user->checkAge($_POST["date_naissance"])){
                $date_naissance=(htmlspecialchars($_POST['date_naissance']));
            }else{
                $date_naissance=$user->getDatenaissance();
                echo "Entrez votre age réel";
            }
          
        }else{
            $date_naissance=$user->getDatenaissance();
        
           
        }
          if(!empty($_POST["ville"] )){
           $ville = htmlspecialchars($_POST['ville']);
    //doc de l'API curl 'https://geo.api.gouv.fr/communes?nom=Antibes&fields=departement&boost=population&limit=5'
    //$response=file_get_contents("https://geo.api.gouv.fr/communes?nom=$_POST['ville']&fields=departement&boost=population&limit=5");
    //$ville=json_decode($response,true);
 
        }else{
            $ville=$user->getVille();
        }
    
    $setInfoUser=$UserModel->setModificationUserById($id, $nom, $prenom, $username, $adresse, $email, $code_postale, $telephone, $date_naissance, $ville, $url_photo_profil); 

}


function checkAge($date){
    $now=new DateTime();
    $birthday=new DateTime($date);
    $difference=$birthday->diff($now);
    return($difference->y >=7 && $difference->y <=100);
}

function SupprimerCompte(){
  $UserModel=new UserModel();
    if (!empty($_POST["pwd"]) && preg_match("/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*?[!?@#$&*^=+-]).{8,}$/", $_POST["pwd"])){
        $pwd=htmlentities($_POST["pwd"]);
        //$hash=password_hash($_POST["pwd"],PASSWORD_DEFAULT);
        //print_r($hash);
        $id=$_SESSION['id'];
        $hash_bd=$UserModel->getPasswordbyID($id);
        //print_r($hash_bd['hash']);
            if(password_verify($pwd,$hash_bd['hash'])){
                $supprime=$UserModel->SupprimerUserByID($id);
            echo "Votre compte a été supprimé";
            }  else{
            echo "Saisissez le mot de passe correct";
            }     
    }else{
     echo "Saisissez le mot de passe correct";   
    }
}
// Affichage de chaine charactere Bonjour, Nom Prenom dans l'account de l'utilisateur
function BonjourUser($nom, $prenom){
 echo "Bonjour, ".$this->nom." ".$this->prenom;
}

  }
