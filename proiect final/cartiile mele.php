<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stiluri-conectare.css">
    <title>Cartiile mele</title>
</head>
<body>
 <?php
session_start();
include("configurare.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titlu'])) {
    $titlu = $_POST['titlu'];
    $userId = $_SESSION['id'];

    $sql = "DELETE FROM carti WHERE Titlu='$titlu' AND UserId='$userId'";
    
    if (mysqli_query($con, $sql)) {
        header("Location: cartiile mele.php");
        exit();
    } 
}

$sql = "SELECT Id, Titlu FROM carti WHERE UserId='{$_SESSION['id']}'";
$result = mysqli_query($con, $sql);
echo"<ul>";
while ($row = mysqli_fetch_assoc($result)) {
echo "<li>";
echo $row['Titlu'];
echo "<a href='informatii.php?id_carti=" . $row['Id'] . "'> Mergi la carte</a>";
echo "<form action='' method='post' >"; 
echo "<input type='hidden' name='titlu' value='" . $row['Titlu'] . "'>";
echo "<input type='submit' class='btn' value='Sterge'>";
echo "</form>";
echo "</li>";
}
echo "</ul>";
mysqli_close($con);
?>
</body>
</html>
