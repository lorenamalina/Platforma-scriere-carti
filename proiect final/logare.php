<?php 
   session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stiluri-conectare.css?v=1.0">
    <title>Logare</title>
</head>
<body>
    <div class="container">
        <?php
        include("configurare.php");

        if (isset($_POST['submit'])) {
        $nume = $_POST['nume'];
        $parola = $_POST['parola'];

        $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$nume' AND Password='$parola'");

        $row = mysqli_fetch_assoc($result);

        if ($row) {

        $_SESSION['username'] = $row['Username'];
        $_SESSION['id'] = $row['Id'];
        header("Location: home.php");
        exit();
        } else {
        echo "<div class='message'>
            <p>Nume sau parola incorecta</p>
        </div> <br>";
        }
        }
        ?>
        <form action="" method="post">
            <div>
                <label for="nume">Nume</label>
                <input type="text" name="nume" id="nume">
            </div>
            <div>
                <label for="parola">Parola</label>
                <input type="password" name="parola" id="parola">
            </div>
            <div>
                <input type="submit" class="btn" name="submit" value="Logare" required>
            </div>
            <div>
                Nu ai cont? <a href="inregistrare.php">Inregistreaza-te</a>
            </div>
        </form>
    </div>
</body>
</html>