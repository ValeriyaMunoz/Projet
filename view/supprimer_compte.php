<section>
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="?p=mes_annonces">MES ANNONCES</a></li>
            <li class="breadcrumb-item"><a href="?p=messagerie">MESSAGERIE</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="?p=account">PROFILE</a></li>
          </ol>
        </nav>
      </div>
    </div>

 
 <form method="POST" action="" class="container">
   <input type="hidden" name="action" value="supprimer_compte" >
    <h2>SUPPRESSION DE COMPTE</h2>
       <p>Pour supprimer votre compte, vous devez entrer votre mot de passe</p>
        <div class="form-label-group">
            <input type="password" name="pwd" id="inputPassword" required class="form-control" placeholder="Mot de passe" pattern="/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*?[!?@#$&*^=+-]).{8,}$/" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial">
        </div>
 
      <button class="btn btn-lg btn-primary btn-block" type="submit">SUPPRIMER</button>
  
  </form>
