<?php
$title="Mot de passe oublie";

?>

<div class="d-flex flex-wrap">  	
	<div class="form-label-group">
		<form method="POST" action="">
			<label for="chk" aria-hidden="true">MOT DE PASSE OUBLIE?</label>
			<input type="hidden" name="action" value="mot_passe_oublie">
			<input type="email" name="email" placeholder="Email" required="">
			<button class="btn btn-outline-primary">RENVOYER</button>
			<a href="?p=connexion">Retourner</a>
		</form>
	</div>
</div>