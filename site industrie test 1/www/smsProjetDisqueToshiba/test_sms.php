
<?php
  // formulaire 
  /*****************************************
  *  Constantes et variables
  *****************************************/
  define('IDENTIFIANT','ZITOUT');  // Login correct
  define('MOTDEPASSE','ABDELHAMID');  // Mot de passe correct
  $message = '';      // Message à afficher à l'utilisateur
 
  /*****************************************
  *  Vérification du formulaire
  *****************************************/
  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_GET))
  {
    // Le login est-il rempli ?
    if(empty($_GET['identifiant']))
    {
      $message = 'Veuillez indiquer votre Identifiant!';
    }
      // Le mot de passe est-il rempli ?
      elseif(empty($_GET['mot_de_passe']))
    {
      $message = 'Veuillez indiquer votre mot de passe!';
    }
      // Le login est-il correct ?
      elseif($_GET['identifiant'] !== IDENTIFIANT)
    {
      $message = 'Votre identifiant est faux !';
    }
      // Le mot de passe est-il correct ?
      elseif($_GET['mot_de_passe'] !== MOTDEPASSE)
    {
      $message = 'Votre mot de passe est faux !';
    }
      else
    {
      // L'identification a réussi
      $message = 'Bienvenue '. IDENTIFIANT .'!';
      echo $message;
    }
  }
  
  


?>