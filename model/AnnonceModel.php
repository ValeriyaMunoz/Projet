<?php

// Affiche toutes les annonces dans l'ordre, de la plus récente à la plus ancienne

class AnnonceModel{
  private $table='annonce';
  private $table_photo='photo';
  private $table_cat='categorie';
  private $table_user='membre';

 public function getAnnonce($orderby){

    try {
 
        global $db;
        $query=$db->prepare('SELECT * FROM '. $this->table .' WHERE Statut_annonce_validee_bloque = 2 ORDER BY '.$orderby.' LIMIT 10');
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
public function AdminShowAllAnnonces(){
try {
 
        global $db;
        $query=$db->prepare('SELECT * FROM '. $this->table .'  LIMIT 10');
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
  public function ajouterDateValidation($idAnnonce,$date_fin_annonce,$date_validation,$duree_publication){
 try{

    //$db = connect();
      global $db;
    $query=$db->prepare('UPDATE '.$this->table.' SET date_fin_annonce=:date_fin_annonce, date_validation=:date_validation, duree_publication=:duree_publication WHERE id=:id');
    $query->execute(['date_fin_annonce'=>$date_fin_annonce, 'date_validation'=>$date_validation, 'duree_publication'=>$duree_publication,'id'=>$idAnnonce, ]); 
    
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
        $query=$db->prepare('SELECT * FROM '.$this->table.' where id=:id LIMIT 10' );
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

public function getPhotobyId($idannonce){
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
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.' WHERE Statut_annonce_validee_bloque = 2');
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
  public function CountAnnonceForAdmin(){ 
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.' LIMIT 10');
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

public function CountAnnonceCategorie($idCategorie){ 
      try {
        //$db = connect();
      global $db;
        $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.' WHERE idCategorie=:idCategorie');
        $query->execute(['idCategorie'=>$idCategorie]);
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

public function creeNouvelCategorie($nom_categorie,$idAnnonce){

    try{

    //$db = connect();
      global $db;
    $query=$db->prepare('INSERT INTO '.$this->table_cat.' ( nom_categorie, idAnnonce) VALUES (:nom_categorie,:idAnnonce) ');
    $query->execute(['nom_categorie'=>$nom_categorie, 'idAnnonce'=>$idAnnonce, ]); 
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  
}


 public function creeNouvelleAnnonce($idMembre,$titre,$description,$prix,$ville,$statut_echange_ou_paiement,$date_de_creation,$idCategorie){

  try{

    //$db = connect();
      global $db;
    $query=$db->prepare('INSERT INTO '.$this->table.' ( titre, description, prix, statut_echange_ou_paiement, ville, idMembre, date_de_creation,idCategorie) VALUES (:titre,:description,:prix,:statut_echange_ou_paiement,:ville,:idMembre,:date_de_creation,:idCategorie) ');
    $query->execute(['titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'ville'=>$ville, 'statut_echange_ou_paiement'=>$statut_echange_ou_paiement, 'idMembre'=>$idMembre, 'date_de_creation'=>$date_de_creation,'idCategorie'=>$idCategorie]); 
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

 public function SupprimerAnnonce($idAnnonce, $idMembre){
  try{

    //$db = connect();
      global $db;
    $query=$db->prepare('DELETE FROM '.$this->table_cat.' WHERE idAnnonce=:idAnnonce');
    $query->execute(['idAnnonce'=>$idAnnonce]); 
    $query=$db->prepare('DELETE FROM '.$this->table_photo.' WHERE idAnnonce=:idAnnonce');
    $query->execute(['idAnnonce'=>$idAnnonce]); 
    $query=$db->prepare('DELETE FROM '.$this->table.' WHERE id=:id AND idMembre=:idMembre LIMIT 1');
    $query->execute(['idMembre'=>$idMembre,'id'=>$idAnnonce]); 
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  

}
  
public function getCategorie($idAnnonce){
try{
$annonce=new Annonce();
    //$db = connect();
      global $db;
    $query=$db->prepare('SELECT idCategorie FROM '.$this->table.' WHERE id=:id');
    $query->execute(['id'=>$idAnnonce]);
    $result = $query->fetch();
    $result=$annonce->categories($result['idCategorie']);
    return $result;
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  

}

public function getIdMembre($idAnnonce){
try{
$annonce=new Annonce();
    //$db = connect();
      global $db;
    $query=$db->prepare('SELECT idMembre FROM '.$this->table.' WHERE id=:id');
    $query->execute(['id'=>$idAnnonce]);
    $result = $query->fetch();
    $result=$annonce->categories($result['idMembre']);
    return $result;
    
} catch (Exception $e) {
  echo $e->getMessage();
 }
    return false;  

}

public function ChangerCategorie($idAnnonce, $nom_categorie){
try{
      //$db = connect();
        global $db;
        $query=$db->prepare('UPDATE '.$this->table_cat.' SET idAnnonce=:idAnnonce, nom_categorie=:nom_categorie');
        $query->execute(['idAnnonce'=>$idAnnonce, 'nom_categorie'=>$nom_categorie]); 
        
} catch (Exception $e) {
        echo $e->getMessage();
 }
    return false;

}

 public function ModifierAnnonce($idAnnonce,$titre,$description,$prix, $ville,$statut_echange_ou_paiement, $idCategorie){

try{

      //$db = connect();
        global $db;
        $query=$db->prepare('UPDATE '.$this->table.' SET titre=:titre, description=:description, prix=:prix, ville=:ville, statut_echange_ou_paiement=:statut_echange_ou_paiement,idCategorie=:idCategorie WHERE id=:id');
        $query->execute(['titre'=>$titre, 'description'=>$description, 'prix'=>$prix, 'ville'=>$ville, 'statut_echange_ou_paiement'=>$statut_echange_ou_paiement, 'id'=>$idAnnonce, 'idCategorie'=>$idCategorie]); 
        
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



public function getAnnoncebyCategorie($idCategorie){
  //print_r($idCategorie);
try {
        //$db = connect();
        global $db;
        $query=$db->prepare('SELECT * FROM '. $this->table .' WHERE idCategorie=:idCategorie');
        $query->execute(['idCategorie'=>$idCategorie]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce

            return $query->fetchAll();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
  }

public function CountAnnonceStatus($Statut_annonce_validee_bloque){
    try {
    //$db = connect();
  global $db;
    $query=$db->prepare('SELECT COUNT(id) FROM '.$this->table.' WHERE Statut_annonce_validee_bloque=:Statut_annonce_validee_bloque');
    $query->execute(['Statut_annonce_validee_bloque'=>$Statut_annonce_validee_bloque]);
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

public function getAnnoncebyStatut($Statut_annonce_validee_bloque){
  //print_r($idCategorie);
try {
        //$db = connect();
        global $db;
        $query=$db->prepare('SELECT * FROM '. $this->table .' WHERE Statut_annonce_validee_bloque=:Statut_annonce_validee_bloque');
        $query->execute(['Statut_annonce_validee_bloque'=>$Statut_annonce_validee_bloque]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce

            return $query->fetchAll();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;

  }

public function adminModifierAnnoncebyIdAnnonce($idAnnonce,$Statut_annonce_validee_bloque){
  try{

        global $db;
        $query=$db->prepare('UPDATE '.$this->table.' SET Statut_annonce_validee_bloque=:Statut_annonce_validee_bloque WHERE id=:id');
        $query->execute(['Statut_annonce_validee_bloque'=>$Statut_annonce_validee_bloque, 'id'=>$idAnnonce]); 
        
} catch (Exception $e) {
        echo $e->getMessage();
 }
    return false;

}

public function RecupererEmailUserbyIdAnnonce($idAnnonce){
  try {
        global $db;
        $query=$db->prepare('SELECT email FROM '. $this->table_user .' AS u INNER JOIN '. $this->table .' AS a ON a.idMembre=u.id WHERE a.id=:id');
        $query->execute(['id'=>$idAnnonce]);
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce
            print_r($query->rowCount());
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
}

public function getidMembrebyIDAnnonce($idannonce){
 // print_r($idannonce);
  try {
        global $db;
        $query=$db->prepare('SELECT idMembre FROM  '. $this->table .'  WHERE id=:id');
        $query->execute(['id'=>$idannonce]);
       
        if ($query->rowCount()){
            // Renvoie toutes les infos de l'annonce
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;

}
}

  


