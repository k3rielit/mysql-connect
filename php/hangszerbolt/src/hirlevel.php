<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BADERBOLT</title>
  <link rel="icon" type="image/jpg" href="kepek/h4n.jpg" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background: #ececec;">

<?php
$siker = true;
$error = "";

$conn = new mysqli("localhost", "root", "", "hangszerbolt");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO hirlevel (nev, email, honap, nap)
VALUES ('".$_POST["vezeteknev"]." ".$_POST["keresztnev"]."', '".$_POST["email"]."', '".date('m')."', '".date('d')."')";

if ($conn->query($sql) === TRUE) {
  $siker = true;
} else {
  $siker = false;
  $error = "Hiba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><s>BADERBOLT Bt</s> MUZIKER</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php" id="navBemutatkozas">Bemutatkozás</a>
          <a class="nav-link disabled" href="#" id="navKapcsolat5">Kapcsolat</a>
          <a class="nav-link disabled" href="#" id="navForum">Fórum</a>
          <a class="nav-link" href="termekek.php" id="navTermekek">Termékek</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- szigorú a tesst -->
  <div class="container">

    <div class="row">&nbsp;</div>

    <div class="card text-center">
      <div class="card-header">
        Hírlevél
      </div>
      <div class="card-body">
        <h5 class="card-title">
          <?php
          if($siker) {
            print("Kedves ".$_POST["vezeteknev"]." ".$_POST["keresztnev"]."!");
          }
          else {
            print("Hoppá!");
          }
          ?>
        </h5>
        <p class="card-text">
          <?php
          if($siker) {
            print("Sikeresen feliratkozott a hírlevélre a <code>".$_POST["email"]."</code> email címmel, nemsokára jelentkezünk az akciós hangszerekkel!");
          }
          else {
            print("Hiba adódott a művelet közben! Kérjük próbálja újra később!");
          }
          ?>
        </p>
        <a href="index.php" class="btn btn-primary">Vissza a főoldalra</a>
      </div>
      <div class="card-footer text-muted">
        Épp most
      </div>
    </div>

    <div class="row">&nbsp;</div>


  </div>

  <!-- footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <div class="me-5 d-none d-lg-block">
        <span>További információk</span>
      </div>
    </section>
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>(c) BaderBolt Bt. 2077
            </h6>
            <p>
              Cégünk már 1956 óta árul kiváló minőségű hangszereket, és ezen nem tervezünk változtatni a közeljövőben
              sem!
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Linkek
            </h6>
            <p>
              <a href="index.php" class="text-reset">Bemutatkozás</a>
            </p>
            <p>
              <a href="#" class="text-reset">Kapcsolat</a>
            </p>
            <p>
              <a href="#" class="text-reset">Fórum</a>
            </p>
            <p>
              <a href="termekek.php" class="text-reset">Termékek</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Kapcsolat
            </h6>
            <p><i class="fas fa-home me-3"></i>69305 Gyöngyös, Duranda negyed</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              kapcsolat@baderhangszerek.hu
            </p>
            <p><i class="fas fa-phone me-3"></i> +36 30 11 33 966</p>
          </div>
        </div>
      </div>
    </section>
  </footer>


  <!-- MODAL -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hírlevél</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- hírlevél -->
          <form action="hirlevel.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Fontos: válasszon egy megbízható email szolgáltatót, azaz ne
                freemailt, bármit csak azt ne...</div>
            </div>

            <div class="mb-3">
              <label for="form_vezeteknev" class="form-label">Név</label>
              <input type="text" class="form-control" id="form_vezeteknev" aria-describedby="emailHelp"
                placeholder="Vezetéknév">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="form_keresztnev" aria-describedby="emailHelp"
                placeholder="Keresztnév">
            </div>

          </form>
          <!-- hírlevél -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
          <button type="button" class="btn btn-primary">Feliratkozás</button>
        </div>
      </div>
    </div>
  </div>

  <!-- szxszript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>