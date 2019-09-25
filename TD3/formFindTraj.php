<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Requete Utilisateur </title>
    </head>
   
    <body>
        
        
          <!-- Ceci est un commentaire PHP sur une ligne
          /* Ceci est le 2ème type de commentaire PHP
          sur plusieurs lignes */
           
          // On met la chaine de caractères "hello" dans la variable 'texte'
          // Les noms de variable commencent par $ en PHP
          $texte = "hello world !";

          // On écrit le contenu de la variable 'texte' dans la page Web
          echo $texte;-->

          <form method="get" action="testFindTraj.php">
            <fieldset>
            <legend>Mon formulaire :</legend>
            <p>
              <label for="login">login</label> :
              <input type="text" placeholder="Ex : binaudd" name="login" id="login" required/>
            </p>
            
            <p>
              <input type="submit" value="Envoyer" />
            </p>
            </fieldset> 
          </form>

        

    </body>
</html> 



