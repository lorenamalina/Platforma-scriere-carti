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
    <?php
    session_start();
    include("configurare.php");
        $id_carti = $_GET['id_carti'];

        echo "<a href='editare informatii.php?id_carti=$id_carti'><button class='btn'>Editare</button></a>";
        $sql = "SELECT Titlu, Autor, Descriere FROM carti WHERE Id='$id_carti'";
        $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Titlu: " . $row['Titlu'] . "</p>";
                echo "<p>Autor: " . $row['Autor'] . "</p>";
                echo "<p>Descriere: " . $row['Descriere'] . "</p>";
            }

    mysqli_close($con);
    ?>

    <script>
        var idCarti = "<?php echo $id_carti; ?>";

        document.getElementById('personaje').addEventListener('click', function() {
            window.location.href = 'personaje.php?id_carti=' + idCarti;
        });

        document.getElementById('informatii').addEventListener('click', function() {
            window.location.href = 'informatii.php?id_carti=' + idCarti;
        });

        document.getElementById('capitole').addEventListener('click', function() {
            window.location.href = 'capitole.php?id_carti=' + idCarti;
        });
    </script>
</body>
</html>



