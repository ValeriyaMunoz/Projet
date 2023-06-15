
<body>
  
  <div class="d-flex flex-wrap ">
  <form method="POST" action="" class="container">
      <h5>CONNEXION</h5>
      <div class="form-label-group">
         <input type="hidden" name="action" value="login" >
          <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address">
      </div>
      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe">
      </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">SE CONNECTER</button>
              <a href="?p=mot_passe_oublie"> Mot de passe oublié? </a>
          
  </form>
 
  <form method="POST" action="" class="container">
      <h5>ENREGISTREMENT</h5>
      <div class="form-label-group">
         <input type="hidden" name="action" value="connexion" >
		   <input id="username" class="form-control" type="text" required name="username" placeholder="Creez votre username">
		  </div>
      <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" required class="form-control" placeholder="Email address" >
      </div>
      <div class="form-label-group">
        <input type="password" name="pwd" id="inputPassword" required class="form-control" placeholder="Mot de passe" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial">
      </div>
       <div class="form-label-group">
        <input type="password" name="pwd2" id="inputPassword2" required class="form-control" placeholder="Confirmation du mot de passe">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">ENREGISTREMENT</button>
  
  </form>
</div>

</body>



