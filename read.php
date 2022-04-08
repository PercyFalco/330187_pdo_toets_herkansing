<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdo_toets_herkansing";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, burritoformaat, saus, bonen, rijst FROM burrito");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

   $tableRows = "";
  foreach ($stmt->fetchAll() as $key=>$value) {
    $tableRows .= "<tr>
                    <td>$value->id</td>
                    <td>$value->burritoformaat</td>
                    <td>$value->saus</td>
                    <td>$value->bonen</td>
                    <td>$value->rijst</td>
                    <td><a href='update.php?id=$value->id'><img class='bi bi-pencil-square' src='./img/update.png' height='25'></i></></td>
                    <td><a href='delete.php?id=$value->id'><img class='bi bi-x-circle' src='./img/delete.png' height='25'></i></i></></td>
                  </tr>";
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>PDO</title>
   </head>
   <body>
      <div class="container">
         <div class="card mt-5">
            <div class="card-header">
               <h2>All burrito's</h2>
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>id</th>
                        <th>Burritoformaat</th>
                        <th>Saus</th>
                        <th>bonen</th>
                        <th>rijst</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?= $tableRows; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>