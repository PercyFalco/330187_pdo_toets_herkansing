<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdo_toets_herkansing";

// var_dump($_POST);exit();

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE burrito
          SET    burritoformaat = :burritoformaat,
                 saus = :saus,
                 bonen = :bonen,
                 rijst = :rijst
          WHERE  id = :id";

  $stmt = $conn->prepare($sql);

  
  $stmt->bindParam(':burritoformaat', $burritoformaat);
  $stmt->bindParam(':saus', $saus);
  $stmt->bindParam(':bonen', $bonen);
  $stmt->bindParam(':rijst', $rijst);
  $stmt->bindParam(':id', $id);
  
  $bodemformaat = $_POST["burritoformaat"];
  $saus = $_POST["saus"];
  $pizzatoppings = $_POST["bonen"];
  $kruiden = $_POST["rijst"];
  $id = $_POST['id'];

  $stmt->execute();

  echo "Record met id={$id} is gewijzigd";
  header('Refresh:2; ./read.php');
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
