<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stiluri-conectare.css">
    <title>Creeaza carte noua</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
        <?php
session_start();
include("configurare.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titlu = $_POST['titlu'];
    $autor = $_POST['autor'];
    $descriere = $_POST['descriere'];
    $userId = $_SESSION['id'];

    $sql = "INSERT INTO carti (UserId, Titlu, Autor, Descriere) VALUES ('$userId', '$titlu', '$autor', '$descriere')";
    
    if (mysqli_query($con, $sql)) {
        echo "<script>window.location.href='cartiile mele.php';</script>";
    }
}
?>
                <div>
                    <label for="titlu">Titlu</label>
                    <input type="text" name="titlu" id="titlu">
                </div>
                <div>
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor">
                </div>
                <div>
                    <textarea id="descriere" name="descriere" rows="6" cols="40" placeholder="Descrierea cartii..."></textarea>
                </div>
                <div>
                    <input type="submit" class="btn" name="submit" id="submit" value="Salvare" required>
                </div>
        </div>
    </form>
</body>
</html>
