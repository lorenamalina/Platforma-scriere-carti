<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include("configurare.php");

    $id_carti = $_GET['id_carti'];
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM capitole WHERE id = $delete_id";
    if ($con->query($sql) === TRUE) {
       header("Location: capitole.php?id_carti=$id_carti");
        exit();
    } 
}

$sql = "SELECT id, titlu FROM capitole WHERE id_carti = $id_carti";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stiluri-home.css">
    <title>Capitole index</title>
</head>
<body>
    <div class="button-container">
        <input type="button" class="btn" id="capitole" name="capitole" value="Capitole">
        <input type="button" class="btn" id="personaje" name="personaje" value="Personaje">
        <input type="button" class="btn" id="informatii" name="informatii" value="Informatii">
    </div>
    <p></p>
    <input type="button" class="btn" id="creare capitol" name="creare capitol" value="Creare capitol">

   <?php
if ($result) {
    echo "<ul>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>
        <a href='creare capitol.php?id_carti=" . $id_carti . "&id_capitol=" . $row['id'] . "'>" . $row['titlu'] . "</a>
        <form method='post' style='display:inline; margin-left: 10px;'>
            <input type='hidden' name='delete_id'  value='" . $row['id'] . "'>
            <input type='submit' value='-'>
        </form>
    </li>";

    }
    echo "</ul>";
}
mysqli_close($con);
?>


   <script>
    var idCarti = "<?php echo $id_carti; ?>";
    var idUtilizator = "<?php echo $_SESSION['id']; ?>";

    document.getElementById('capitole').addEventListener('click', function() {
        window.location.href = 'capitole.php?id_carti=' + idCarti;
    });
    document.getElementById('personaje').addEventListener('click', function() {
        window.location.href = 'personaje.php?id_carti=' + idCarti;
    });
    document.getElementById('informatii').addEventListener('click', function() {
        window.location.href = 'informatii.php?id_carti=' + idCarti;
    });
    document.getElementById('creare capitol').addEventListener('click', function() {
        window.location.href = 'creare capitol.php?id_carti=' + idCarti;
    });
</script>

</body>
</html>

