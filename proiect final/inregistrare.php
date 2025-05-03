<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stiluri-conectare.css">
    <title>Inregistrare</title>
</head>
<body>
    <div class="container">
        <?php 
          include("configurare.php");
           $nume = $_POST['nume'];
        $parola = $_POST['parola'];
          if (isset($_POST['submit'])) {
              $verify_query = mysqli_query($con, "SELECT * FROM users WHERE Username='$nume'");

              if (mysqli_num_rows($verify_query) != 0) {
                  echo "<div class='message'>
                            <p>Acest nume de utilizator este deja folosit. Incearca altul!</p>
                        </div> <br>";

              } else {

                  mysqli_query($con, "INSERT INTO users (Username, Password) VALUES ('$nume', '$parola')");

                  echo "<div class='message'>
                            <p>Inregistrare reusita!</p>
                        </div> <br>";
                  echo "<a href='logare.php'><button class='btn'>Logheaza-te acum</button></a>";
              }
          }
        ?>

        <form action="" method="post">
            <div>
                <label for="nume">Nume</label>
                <input type="text" name="nume" id="nume" required>
            </div>
            <div>
                <label for="parola">Parola</label>
                <input type="password" name="parola" id="parola" required>
            </div>
            <div>
                <input type="submit" class="btn" name="submit" value="Inregistreaza-te">
            </div>
            <div>
                Ai deja cont? <a href="logare.php">Logheaza-te</a>
            </div>
        </form>
    </div>
</body>
</html>
