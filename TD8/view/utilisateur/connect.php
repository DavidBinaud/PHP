	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de Connexion:</legend>
	    
	    <p>
	      <label for="login_id">Login</label> :
	      <input type="text" name="login" id="login_id" required>
	    </p>

	    <p>
	      <label for="pass_id">Mot de Passe</label> :
	      <input type="password"  name="pass" id="pass_id" required/>
	    </p>

	    <p>
	      <input type='hidden' name='action' value='connected'>
	      <input type='hidden' name='controller' value='utilisateur'>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
