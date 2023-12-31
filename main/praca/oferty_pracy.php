<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>System Ogłoszeniowy</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
    <a href="../glowna.html" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="../images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="../glowna.html" class="nav-link">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../praca/oferty_pracy.html" class="nav-link  active">
            Oferty pracy
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../uzytkownik/profil.html" class="nav-link">
            Mój profil
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="../praca/ogloszenie_dodaj.html" class="nav-link custom-link me-3">
            Moje konto
            <img class="d-inline-block align-top" src="../images/account.png" style="height: 30px;" />
          </a>
        </li>
        <li class="nav-item">
          <a href="../praca/ogloszenie_dodaj.html" class="nav-link custom-link me-2">
            Dodaj ogłoszenie
            <img class="d-inline-block align-top" src="../images/icon_add.png" style="height: 30px;" />
          </a>
        </li>
      </ul>
    </div>
  </nav>
 

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza_systemogloszeniowy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ogloszenie.*, firma.* FROM ogloszenie JOIN firma ON ogloszenie.id_firmy = firma.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 0; 
?>
    <div class="container">
        <div class="row">
<?php
    while ($row = $result->fetch_assoc()) {
        if ($counter > 0 && $counter % 3 === 0) {
          
?>
            </div>
        </div>
        <div class="container">
            <div class="row">
<?php
        }
?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nazwa']; ?></h5>
                        <p class="offerts-cost">
                            <?php echo $row['widełki_wynagrodzenia']; ?>
                        </p>
                        <div class="container">
                            <div class="row">
                                <div class="col-5 col-sm-4">
                                    <img src="<?php echo $row['logo_url']; ?>" class="image-offerts img-fluid">
                                </div>
                                <div class="col-7 col-sm-8">
                                    <span id="name-offerts"><?php echo $row['nazwa_firmy']; ?></span>
                                    <p class="adress-offerts">
                                        <?php echo $row['adres']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="aplicate-offets">Aplikuj</a>
                    </div>
                </div>
            </div>
<?php
        $counter++;
    }
?>
        </div>
    </div>
<?php
} else {
    echo "Brak wyników";
}
$conn->close();
?>


  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</body>
</html>
