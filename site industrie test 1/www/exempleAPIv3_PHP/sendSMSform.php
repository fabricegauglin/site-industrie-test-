<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Send SMS form</title>
</head>

<body>

<h1>API envoi SMS, PHP POST, XML.</h1>
<p><a href="http://www.smsfactor.com/html/SMSFactor-DOC-API_V3.pdf" target="_blank" title="API SMS">Documentation API</a></p>
<hr />
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <td width="50%">
      <u>Formulaire pour envoyer un SMS :</u><br /><br />
      <label>Login : <input name="username" id="username" type="text" size="20" /></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Mot de passe : <input name="password" id="password" type="password" size="20" /></label><br /><br />
      <label>Expéditeur : <input name="sender" id="sender" type="text" size="15" /></label><br /><br />
      <label>Destinataire : <input name="dest" id="dest" type="text" size="14" /></label><br /><br />
      <label>Message : <textarea name="message" id="message" cols="30" rows="5"></textarea></label><br /><br />
      <input type="hidden" name="XML" id="XML">
      <label><input type="submit" name="submit" id="submit" value="Envoyer" /></label>
    </td>
    <td width="50%">
      <p><u>Format XML</u></p>
      <p><code>
        &lt;sms><br />
        &lt;authentification><br />
        &lt;username>VOTRE LOGIN SMSFACTOR.COM&lt;/username><br />
        &lt;password>VOTRE MOT DE PASSE&lt;/password><br />
        &lt;/authentification><br />
        &lt;message><br />
        &lt;sender>EXPEDITEUR&lt;/sender><br />
        &lt;text>VOTRE MESSAGE&lt;/text><br />
        &lt;/message><br />
        &lt;recipients><br />
        &lt;gsm gsmsmsid="">DESTINATAIRE(S)&lt;/gsm><br />
        &lt;/recipients><br />
        &lt;/sms> <br />
      </code></p>
    </td>
  </table>
</form>

<hr />
<u>Formulaire pour recevoir un accusé de réception :</u><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">
        <form id="sendAR" name="sendAR" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <label>Login : <input name="loginAR" id="loginAR" type="text" size="20" /></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Mot de passe : <input name="passwordAR" id="passwordAR" type="password" size="20" /></label><br /><br />
            <label>Ticket : <input name="ticket" id="ticket" type="text" size="10" /></label><br /><br />
            <input type="hidden" name="XML" id="XML">
            <label><input type="submit" name="submit" id="submit" value="Valider" /></label>
        </form>
    </td>
    <td width="50%">
        <p><u>Format XML</u></p>
        <p><code>
                &lt;deliveryreport> <br />
                &lt;authentification> <br />
                &lt;username>VOTRE LOGIN SMSFACTOR.COM&lt;/username> <br />
                &lt;password>VOTRE MOT DE PASSE&lt;/password> <br />
                &lt;/authentification> <br />
                &lt;message> <br />
                &lt;ticket gsmsmsid="">TICKET&lt;/ticket><br /> 
                &lt;/message> <br />
              &lt;/deliveryreport> <br />
        </code></p>
    </td>
  </tr>
</table>
<hr />

<?php

if (isset($_POST['submit']) and $_POST['submit'] == "Envoyer") {
	require_once('sendSMSclass.php');
	
	$dest = array(); //gsm numbers must be in the array
	$dest[0] = $_POST['dest']; //sample

	$username 		= $_POST['username'];    	//your username
	$password 		= $_POST['password'];    	//your password
	$sender 		= $_POST['sender'];
	$messagetext 	        = $_POST['message'];


	$SENDSMS = new SendSMSclass();
	$response = $SENDSMS->SendSMS($username,$password,$sender,$messagetext,$dest);	
	echo htmlentities($response, ENT_QUOTES);
}

if (isset($_POST['submit']) AND $_POST['submit'] == "Valider") {
  require_once('AccuseReceptionSMSClass.php');

  $loginAR   = $_POST['loginAR'];     //your username
  $passwordAR   = $_POST['passwordAR'];     //your password
  $ticket     = $_POST['ticket'];         //your ticket

  $ARSMS = new AccuseReceptionSMSClass();

  $response = $ARSMS->AccuseReceptionSMS($loginAR,$passwordAR,$ticket);

  echo htmlentities($response, ENT_QUOTES);
}
?>
</body>
</html>


