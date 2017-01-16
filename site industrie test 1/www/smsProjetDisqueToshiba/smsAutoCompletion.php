<?php
require_once('LibraryAutoCompletion.php');

//Initialisation de la liste
$list = array();

//Connexion MySQL
try
{
    $db = new PDO('mysql:host=localhost;dbname=Client', 'root', 'root');
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}

//Construction de la requete
$strQuery = "SELECT CP CodePostal, VILLE Ville FROM autocomplete WHERE ";
if (isset($_POST["codePostal"]))
{
    $strQuery .= "CP LIKE :codePostal ";
}
else
{
    $strQuery .= "VILLE LIKE :ville ";
}
$strQuery .= "AND CODEPAYS = 'FR' ";
//Limite
if (isset($_POST["maxRows"]))
{
    $strQuery .= "LIMIT 0, :maxRows";
}
$query = $db->prepare($strQuery);
if (isset($_POST["codePostal"]))
{
    $value = $_POST["codePostal"]."%";
    $query->bindParam(":codePostal", $value, PDO::PARAM_STR);
}
else
{
    $value = $_POST["ville"]."%";
    $query->bindParam(":ville", $value, PDO::PARAM_STR);
}
//Limite
if (isset($_POST["maxRows"]))
{
    $valueRows = intval($_POST["maxRows"]);
    $query->bindParam(":maxRows", $valueRows, PDO::PARAM_INT);
}

$query->execute();

$list = $query->fetchAll(PDO::FETCH_CLASS, "AutoCompletionCPVille");;

echo json_encode($list);
?>
