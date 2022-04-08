<?php
   if(!isset($_GET["id"])) { 
     header("Location: ./index.php");
     exit();
   }
   $id = $_GET["id"];
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pdo_toets_herkansing";
   
   try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT id, burritoformaat, saus, bonen, rijst FROM burrito WHERE id=:id");
   
     $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
   
     $pizz = $stmt->fetch();
   
   }
   catch(PDOException $e) {
     echo $e->getMessage();
   }
   $conn = null;
   ?>
   
   <!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>Maak je eigen Burrito</h1>
      <div class=col-6>
         <form action="./create.php" method="post">
            <div class="mb-3">
               <label for="inputburritoFormaat" class="form-label">burritoformaat</label>
               <select class="form-control" type="text" name="burritoformaat" id="inputBurritoFormaat">
                  <option>20cm</option>
                  <option>25cm</option>
                  <option>30cm</option>
               </select>
            </div>
            <div class="mb-3">
               <label for="inputSaus" class="form-label">Saus</label>
               <select class="form-control" type="text" name="saus" id="inputSaus">
                  <option>Salsa crudo</option>
                  <option>salsa verde</option>
                  <option>salsa roja</option>
                  <option>Creme fraiche</option>
               </select>
               <h1>Bonen</h1>
               <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Kidney bonen
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Zwarte bonen
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Bruine Bonen
                </label>
                </div>
                <h1>Rijst</h1>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Witte Rijst
                </label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Zwarte Rijst
                </label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Bruine rijst
                </label>
                <div class="mb-3">
               <input class="form-control btn btn-primary" type="submit" value="verstuur">
            </div>
         </form>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
</html>