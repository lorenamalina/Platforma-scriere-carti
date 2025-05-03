<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stiluri-conectare.css">
    <title>Pagina de pornire</title>
</head>
<body>
<div class="container">
  <input type="button" class="btn" id="creare" value="Creeaza carte noua">
  <input type="button" class="btn" id="cartile mele" value="Cartile mele">
  <input type="button" class="btn" id="deconectare" value="Deconectare">
  <script>
        document.getElementById('creare').addEventListener('click', function() {
            window.location.href = 'creeaza carte.php';
        });
        document.getElementById('cartile mele').addEventListener('click', function() {
            window.location.href = 'cartiile mele.php';
        });
        document.getElementById('deconectare').addEventListener('click', function() {
            window.location.href = 'logare.php';
        });
    </script>
</div>
</body>
</html>