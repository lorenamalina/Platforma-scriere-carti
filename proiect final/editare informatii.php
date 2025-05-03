<?php
session_start();
include("configurare.php");
    $id_carti = $_GET['id_carti'];
    $sql = "SELECT Titlu, Autor, Descriere FROM carti WHERE Id='$id_carti'";
    $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $titlu = $row['Titlu'];
        $autor = $row['Autor'];
        $descriere = $row['Descriere'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titlu_nou = $_POST['titlu'];
    $autor_nou = $_POST['autor'];
    $descriere_noua = $_POST['descriere'];
    $sql_update = "UPDATE carti SET Titlu='$titlu_nou', Autor='$autor_nou', Descriere='$descriere_noua' WHERE Id='$id_carti'";

    if (mysqli_query($con, $sql_update)) {
        header("Location: informatii.php?id_carti=" . $id_carti);
        exit();
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stiluri-conectare.css">
    <title>Editează informații</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <div>
                <label for="titlu">Titlu</label>
                <input type="text" name="titlu" id="titlu" value="<?php echo htmlspecialchars($titlu); ?>">
            </div>
            <div>
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($autor); ?>">
            </div>
            <div>
                <textarea id="descriere" name="descriere" rows="6" cols="40" placeholder="Descrierea cartii..."><?php echo htmlspecialchars($descriere); ?></textarea>
            </div>
            <div>
                <input type="submit" class="btn" name="submit" id="submit" value="Salvare">
            </div>
        </div>
    </form>
</body>
</html>


