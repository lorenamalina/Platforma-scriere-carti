<?php
session_start();
include("configurare.php");
$id_carti = $_GET['id_carti'];
$titlu = "";
$continut = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titlu = $_POST['titlu'];
    $continut = $_POST['continut'];

    if(isset($_GET['id_capitol'])) {
        $id_capitol = $_GET['id_capitol'];
        $sql_update_capitol = "UPDATE capitole SET titlu = '$titlu', continut = '$continut' WHERE id_carti = '$id_carti' AND id = '$id_capitol'";
        if ($con->query($sql_update_capitol) === TRUE) {
            header("Location: capitole.php?id_carti=$id_carti");
            exit();
        } 
    } else {
        $sql_insert_capitol = "INSERT INTO capitole (id_carti, titlu, continut) VALUES ('$id_carti', '$titlu', '$continut')";
        if ($con->query($sql_insert_capitol) === TRUE) {
            header("Location: capitole.php?id_carti=$id_carti");
            exit();
        } 
    }
}

if(isset($_GET['id_capitol'])) {
    $id_capitol = $_GET['id_capitol'];
    $sql_select_capitol = "SELECT titlu, continut FROM capitole WHERE id_carti = '$id_carti' AND id = '$id_capitol'";
    $result_select_capitol = $con->query($sql_select_capitol);
    if ($result_select_capitol->num_rows > 0) {
        $row = $result_select_capitol->fetch_assoc();
        $titlu = $row['titlu'];
        $continut = $row['continut'];
    }
}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stiluri-home.css">
    <title>Creare/Editare capitol</title>
</head>
<body>
    <div class="button-container">
        <input type="button" class="btn" id="capitole" name="capitole" value="Capitole">
                <input type="button" class="btn" id="personaje" name="personaje" value="Personaje">
        <input type="button" class="btn" id="informatii" name="informatii" value="Informatii">
    </div>

    <form method="post" action="">
        <input type="text" name="titlu" value="<?php echo $titlu; ?>" rows="1" placeholder="Titlul capitolului..." required>
        <textarea class="textare" name="continut" placeholder="Începe să scrii..." required><?php echo $continut; ?></textarea>
        <input type="submit" class="btn" value="Salvare">
    </form>

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

