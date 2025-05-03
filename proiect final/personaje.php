<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stiluri-home.css">
    <title>Personaje</title>
</head>
<body>
    <div class="button-container">
        <input type="button" class="btn" id="capitole" name="capitole" value="Capitole">
        <input type="button" class="btn" id="personaje" name="personaje" value="Personaje">
        <input type="button" class="btn" id="informatii" name="informatii" value="Informatii">
    </div>
 <?php
session_start();
include("configurare.php");


$id_carti = $_GET['id_carti'];

$sql = "SELECT Informatii FROM carti WHERE Id='$id_carti'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="" method="post">
        <textarea id="informatii-text" class="textare" name="informatii" rows="6" cols="40"><?php echo ($row['Informatii']); ?></textarea>
        <input type="submit" class="btn" name="salvare" value="Salvare">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvare'])) {
        $informatii = $_POST['informatii'];
        $update_sql = "UPDATE carti SET Informatii='$informatii' WHERE Id='$id_carti'";
        if (mysqli_query($con, $update_sql)) {
            header("Location: personaje.php?id_carti=$id_carti");
            exit();
        }
    }
}
mysqli_close($con);
?>


    <script>
        var idCarti = "<?php echo $id_carti; ?>";

        document.getElementById('capitole').addEventListener('click', function() {
            window.location.href = 'capitole.php?id_carti=' + idCarti;
        });
        document.getElementById('personaje').addEventListener('click', function() {
            window.location.href = 'personaje.php?id_carti=' + idCarti;
        });
        document.getElementById('informatii').addEventListener('click', function() {
            window.location.href = 'informatii.php?id_carti=' + idCarti;
        });
    </script>
</body>
</html>



