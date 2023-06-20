<?php

// Affiche toutes les annonces dans l'ordre, de la plus récente à la plus ancienne

class AnnonceModel{
  private $table='annonce';
  private $table_photo='photo';

 public function getAnnonce($orderby){
    try {
        //$db = connect();
        global $db;
        /*$db->test();
        die;*/
        $query=$db->prepare('SELECT * FROM '. $this->table .' ORDER BY '.$orderby);
        $query->execute();
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce

            return $query->fetchAll();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
  }

  //Affiche la photo principale de l'annonce par son ID

 public function getMainPhoto($idannonce){
      try {
      //$db = connect();
      global $db;
      $query=$db->prepare('SELECT fichier_chemin FROM '.$this->table_photo.' WHERE is_main_photo=1 AND idAnnonce='.$idannonce);
      $query->execute();
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce

            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
  }

  //Affiche toutes les informations d'annonce par ID. Utilise pour afficher
  //les détails de l'annonce


 public function getAnnoncebyId($idannonce){
    try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT * FROM '.$this->table.' where id=:id');
        $query->execute(['id'=>$idannonce]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
  }



  //Affiche toutes les photos d'annonce.Utilise pour afficher les détails de l'annonce.

public  function getPhotobyId($idannonce){
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT fichier_chemin FROM '.$this->table_photo.' where idAnnonce='.$idannonce);
        $query->execute();
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
        
            return $query->fetchAll();

        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    return false;

  }

  public function CountAnnonce(){ 
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.'');
        $query->execute();
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
            $result=$query->fetch();
            return $result[0];

        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    return false;

  }

  public function CountAnnoncebyID($idMembre){ 
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.' WHERE idMembre=:idMembre');
        $query->execute(['idMembre'=>$idMembre]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
            $result=$query->fetch();
            return $result[0];

        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    return false;

  }

public function getAnnoncebyIdUser($id,$orderby){

try {
        //$db = connect();
        global $db;
        /*$db->test();
        die;*/
        $query=$db->prepare('SELECT * FROM '. $this->table .' WHERE idMembre=:idMembre ORDER BY '.$orderby);
        $query->execute(['idMembre'=>$id]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce

            return $query->fetchAll();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;

  
}
 public function creeNouvelleAnnonce($idMembre,$titre,$description,$prix,$ville,$statut_echange_ou_paiement,$date_de_creation){

  try{

    //$db = connect();
      global $db;
    $query=$db->prepare('INSERT INTO '.$this->table.' ( titre, description, prix, statut_echange_ou_paiement, ville, idMembre, date_de_creation) VALUES (:titre,:description,:prix,:statut_echange_ou_paiement,:ville,:idMembre,:date_de_creation) ');
    $query->execute(['titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'ville'=>$ville, 'statut_echange_ou_paiement'=>$statut_echange_ou_paiement, 'idMembre'=>$idMembre, 'date_de_creation'=>$date_de_creation]); 
    $last_id=$db->lastInsertId();
    return $last_id;
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  

}

//
public function creeNouvelleAnnoncePhoto($idAnnonce,$fichier_chemin,$is_main_photo){

try{

    //$db = connect();
      global $db;
    $query=$db->prepare('INSERT INTO   '.$this->table_photo.' (idAnnonce,fichier_chemin, is_main_photo) VALUES (:idAnnonce,:fichier_chemin,:is_main_photo)');
    $query->execute(['idAnnonce'=>$idAnnonce,'fichier_chemin'=>$fichier_chemin, 'is_main_photo'=>$is_main_photo]); 
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  
}

public function MontrerCheminPhoto($idAnnonce){
 try{

    //$db = connect();
      global $db;
    $query=$db->prepare('SELECT fichier_chemin FROM '.$this->table_photo.' WHERE idAnnonce=:idAnnonce');
    $query->execute(['idAnnonce'=>$idAnnonce]);
    $result = $query->fetchAll();
    return $result;
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  
}

 public function SupprimerAnnonce($idAnnonce){
  try{

    //$db = connect();
      global $db;
    $query=$db->prepare('DELETE FROM '.$this->table_photo.' WHERE idAnnonce=:idAnnonce');
    $query->execute(['idAnnonce'=>$idAnnonce]); 
    $query=$db->prepare('DELETE FROM '.$this->table.' WHERE id=:id LIMIT 1');
    $query->execute(['id'=>$idAnnonce]); 
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  

}
  
 public function ModifierAnnonce($idAnnonce,$titre,$description,$prix, $ville,$statut_echange_ou_paiement){

try{

      //$db = connect();
        global $db;
        $query=$db->prepare('UPDATE '.$this->table.' SET titre=:titre, description=:description, prix=:prix, ville=:ville, statut_echange_ou_paiement=:statut_echange_ou_paiement WHERE id=:id');
        $query->execute(['titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'ville'=>$ville, 'statut_echange_ou_paiement'=>$statut_echange_ou_paiement, 'id'=>$idAnnonce]); 
        
} catch (Exception $e) {
        echo $e->getMessage();
 }
    return false;
  } 

public function ModifierAnnoncePhoto($idAnnonce,$fichier_chemin,$is_main_photo){
 //var_dump($fichier_chemin);
  //var_dump($idAnnonce);
 // var_dump($is_main_photo);
  try{


      //$db = connect();
        global $db;
        $query=$db->prepare('INSERT INTO '.$this->table_photo.' (fichier_chemin, is_main_photo,idAnnonce) VALUES (:fichier_chemin,:is_main_photo,:idAnnonce)');
        $query->execute(['fichier_chemin'=>$fichier_chemin, 'is_main_photo'=>$is_main_photo, 'idAnnonce'=>$idAnnonce]); 
        
} catch (Exception $e) {
        echo $e->getMessage();
 }
    return false;
  } 


    public function CountPhotos($idAnnonce){ 
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table_photo.' WHERE idAnnonce=:idAnnonce');
        $query->execute(['idAnnonce'=>$idAnnonce]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
            $result=$query->fetch();
           // print_r( $result);
            return $result[0];

        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    return false;

  }

public function DeleteLastPhoto($idAnnonce){
   try {
        //$db = connect();
      global $db;
        $query=$db->prepare('DELETE FROM '.$this->table_photo.' WHERE idAnnonce=:idAnnonce');
        $query->execute(['idAnnonce'=>$idAnnonce]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'Annonce
            $result=$query->fetch();
      
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    return false;
}


  }


