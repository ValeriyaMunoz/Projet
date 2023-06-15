<?php
function envoyerMessageAdmin(){
if(!empty($_POST)){
        if(!empty($_POST["title"]) && strlen($_POST['title'])>=3){
        $subject=(htmlspecialchars($_POST['title']));
        //print_r($subject);
           if(!empty($_POST["email"])&& filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $from=(htmlspecialchars($_POST['email']));
                  //print_r($from);
                $to='orifeya@mail.ru';
                $headers=array('From:'=> $from,
                'MIME6Version'=>'1.0',
                'Content-type'=>'text/html;charset=utf-8',
                'Reply-To:'=> $to,
                'X-Mailer'=>' PHP/' . phpversion());
                  //print_r($headers);
                    if(!empty($_POST["message"])&& strlen($_POST['message'])>=20){
                $message=(htmlspecialchars($_POST['message']));
                  //print_r($message);
                $mail=mail($to,$subject,$message,$headers);
                  //print_r($mail);
                        if($mail){
                        echo 'Votre message a été envoye avec succés';
                        }else{ echo "Impossible d'envoyer votre message. Veuillez réessayer.";
                        }    
                    }else{
                        echo "Saissisez votre message au moins 20 caractéres";
                    }
             }else{
                echo "Saissisez une adresse email existante"; 
             }
            }else{
                echo "Saissisez une title";
            }
}else{
    echo "Remplissez tous les champs";
}


 
}

               
?>
