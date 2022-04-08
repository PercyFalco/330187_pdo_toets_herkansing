<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdo_toets_herkansing";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO burrito (id, burritoformaat, saus, bonen, rijst)
  VALUES (:id, :burritoformaat, :saus, :bonen, :rijst)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':burritoformaat', $burritoformaat);
  $stmt->bindParam(':saus', $saus);
  $stmt->bindParam(':bonen', $bonen);
  $stmt->bindParam(':rijst', $rijst);

  $id = NULL;
  $burritoformaat = $_POST["burritoformaat"];
  $saus = $_POST["saus"];
  $bonen = $_POST["bonen"];
  $rijst = $_POST["rijst"];

  $stmt->execute();

  echo "New records created succesfully";
  header("Refresh:1; ./read.php");
} catch(PDOException $e) {
  echo $e->getMessage();
  header("Location; ./index.php");
}
$conn = null;
?>