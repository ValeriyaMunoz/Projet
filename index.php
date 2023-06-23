<?php
session_start();
$title="Accueil";
require_once "config.php";
require_once "model/AnnonceModel.php";
require_once "model/UserModel.php";
require_once "model/Connect.php";
require_once "controller/Annonce.php";
require_once "controller/Message_admin.php";
require_once "controller/User.php";




$AnnonceModel=new AnnonceModel();
$annonce=new Annonce();
$user=new User();
$UserModel=new UserModel();

/****** ROUTING *********/
//réalisation du système de routage
// le fichier .htccess effectue une redirection automatique depuis l'url /nom_de_la_route vers index.php?page=nom_de_la_route
// on va donc gérer notre routage depuis le paramètre $_GET["page"]
try
{
    // si $_GET['page'] est vide alors on charge simplement la page d'index
   

        // on décompose le paramètre $_GET['page'] d'après le "/"
      if (empty($_GET['p']))
      {
       $page="index";
       
      }else { // sinon on traite au cas par cas nos routes
     
           $page=$_GET['p'];
     
      }

      if($_SERVER["REQUEST_METHOD"]==="POST"){
      $action=$_POST['action']?? "";
      switch($action){

          case 'modification_annonce':
          //print_r($_POST);
          $idannonce=$_POST['idAnnonce'];
          $idUser=$_POST['idUser'];
          $act=$annonce->ModificationAnnonce($idannonce,$idUser);
          $page='mes_annonces';
          break;

           case 'oui_supprimer_admin':
            //print_r($_POST["idUser"]);
            $act=$user->adminSupprimerUser($_POST["idUser"]);
           $page='admin_users';
            break;

            case 'modifier_user_admin':
            //print_r($_POST["id"]);
            $act=$user->modification_info_user($_POST["id"]);
           // $page='modification_user_admin';
            break;
          case 'supprimer_account_admin':
            //print_r($_POST["id"]);
            $act=$user->adminSupprimerUser($_POST["id"]);
            //$page='supprimer_account_admin';
            break;

           case 'admin_modifier':
            //print_r($_POST["id"]);
            $act=$annonce->adminModifierAnnonce($_POST["id"]);
            //$page='admin';
            break;
            
            case 'admin_valider':
            //print_r($_POST["id"]);
            $act=$annonce->adminValiderAnnonce($_POST["id"]);
            $page='admin';
            break;

            case 'admin_bloquer':
            //print_r($_POST["id"]);
            $act=$annonce->adminBloquerAnnonce($_POST["id"]);
            $page='admin';
            break;

          case 'oui_supprimer':
          //print_r($_POST);
          $id=$_SESSION['id'];
          $act=$annonce->SupprimerAnnonceOui($_POST['idannonce'],$id); 
          $page="mes_annonces";
          break;
        
          case 'supprimer_compte':
          $act=$user->SupprimerCompte();
          $page='deconnect';
          break;

          case 'modification_info_user':
          $id=$_SESSION['id'];
          $act=$user->modification_info_user($id);
          $page='modification_info';
          break;
        
          case 'connexion':
          $act=$user->addUser();
          break;

          case 'cree_annonce':
          $act=$annonce->CreeAnnonce($_POST['idannonce']);
          break;

          case 'login':
          $act=$UserModel->logUser();
          //print_r($message);
          if($act==="Connexion réussie"){
            //print_r($page);
          $_SESSION['actif']=1;
          $page="account";
          
          //print_r($page);
          }else{
          //print_r($message);
           $_SESSION['actif']=0;
          $page="connexion";
          }
          break;

          case 'message_admin':
          $act=envoyerMessageAdmin();
          break;
          
          case 'mot_passe_oublie':
          $act=$UserModel->mailChangePwd();
          $page="connexion";
          break;
          }
 }


 // Activation de l'enregistrement par lien, desactivation et lien vers récuperation du mot de passe
if ($page=='non_supprimer'){
   $page="mes_annonces";
}


 if ($page=='activation'){
  $act=$UserModel->activUser();
}

if ($page=='deconnect'){
   session_unset();
   session_destroy();
   $page="home";
   echo "Vous etes déconnecté";
}
if ($page=='reset' && !isset($GET['t'])){
  echo "Lien invalide. Veuillez réessayer";
  $page="mot_passe_oublie";
}
echo $page;
require "view/header.php";

// Router: Redirections de pages
        switch ($page) 
        {
            // route "/home"
            case "home":
            case "index":
            case "deconnect":
            require_once "view/home.php";
            break;

            case "modification_info":
            require_once "view/modification_info.php"; 
            break;

            case "supprimer_compte":
            require_once "view/supprimer_compte.php"; 
            break;

            case "new_message":
            require_once "view/new_message.php"; 
            break;
            
            case "modification_user_admin":
            require_once "view/modification_user_admin.php"; 
            break;

            case "supprimer_account_admin":
            require_once "view/supprimer_account_admin.php"; 
            break;

            case "admin":
            require_once "view/admin.php"; 
            break;


            case "admin_annonces":
            require_once "view/admin_annonces.php"; 
            break;

            case "admin_users":
            require_once "view/admin_users.php"; 
            break;

            case "connexion":
            require_once "view/connexion.php"; 
            break;

           case "annonce_detail":
           require_once "view/annonce_detail.php"; 
           break;
            
            case "mot_passe_oublie":
            require_once "view/mot_passe_oublie.php"; 
            break;

            case "account":
            require_once "view/account.php"; 
            break;

            case "panier":
            require_once "index.php?p=panier.php"; 
            break;

            case "favoris":
            require_once "index.php?p=favoris.php"; 
            break;

            case "message":
            require_once "index.php?p=message.php"; 
            break;
            
            case "message_admin":
            require_once "view/message-admin.php"; 
            break;
           
            case "mes_annonces":
            require_once "view/mes_annonces.php"; 
            break;

            case "messagerie":
            require_once "view/messagerie.php"; 
            break;

            case "supprimer_account":
            require_once "view/supprimer_compte.php"; 
            break;

            case "cree_annonce":
            if(isset($_SESSION['actif'])){
            require_once "view/cree_annonce.php"; 
            }else{
            require_once "view/connexion.php";
            }
            break;

            case "categorie_jeux":
            require_once "view/categorie_jeux.php"; 
            break;

            case "categorie_habillement":
            require_once "view/categorie_habillement.php"; 
            break;

            case "categorie_maison":
            require_once "view/categorie_maison.php"; 
            break;

            case "categorie_electronique":
            require_once "view/categorie_electronique.php"; 
            break;

            case "modification_annonce":
            require_once "view/modification_annonce.php"; 
            break;

            case "supprimer_annonce":
            require_once "view/supprimer_annonce.php"; 
            break;

            case "default":
            http_response_code(404);
             echo "La page recherchée n'existe pas";
            break;
        }
    }catch (Exception $e) {
    // en cas d'exeption l
    echo $e->getMessage();
    }
  

require "view/footer.php";
?>
