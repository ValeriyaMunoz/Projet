
<div class="d-flex flex-wrap ">
<form method="POST" action="" class="container">
<input type="hidden" name="action" value="newpassword" >
<h5>REINITIALISATION</h5>
<input type="hidden" name="token" value="<?=$token?>" >
    <div class="form-label-group">
        <input type="password" name="pwd" id="inputPassword" required class="form-control" placeholder="Mot de passe" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial">
      </div>
   <div class="form-label-group">
        <input type="password" name="pwd" id="inputPassword" required class="form-control" placeholder="Mot de passe" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial">
    </div>

