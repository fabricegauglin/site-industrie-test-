<?php
require_once 'AutoCompletionDestNum.class.php';

//Initialisation de la liste
$list = array();

//Connexion MySQL
try
{
    $db = new PDO('mysql:host=localhost;dbname=smsbase', 'root', '');
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}

//Construction de la requete
$strQuery = "SELECT destinataire Dest, numero Num FROM client WHERE ";
if (isset($_POST["Destinataire"]))
{
    $strQuery .= "destinataire LIKE :Destinataire "; // destName
}
else
{
    $strQuery .= "numero LIKE :Numero "; //numName
}

//Limite
if (isset($_POST["maxRows"]))
{
    $strQuery .= "LIMIT 0, :maxRows";
}
$query = $db->prepare($strQuery);
if (isset($_POST["Destinataire"]))
{
    $value = $_POST["Destinataire"]."%";
    $query->bindParam(":Destinataire", $value, PDO::PARAM_STR); //destName
}
else
{
    $value = $_POST["Numero"]."%"; 
    $query->bindParam(":Numero", $value, PDO::PARAM_STR);  //numName
}
//Limite
if (isset($_POST["maxRows"]))
{
    $valueRows = intval($_POST["maxRows"]);
    $query->bindParam(":maxRows", $valueRows, PDO::PARAM_INT);
}

$query->execute();

$list = $query->fetchAll(PDO::FETCH_CLASS, "AutoCompletionDestNum");

echo json_encode($list);
?>
