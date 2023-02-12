<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styleadd.css">
</head>
<body>
<div id="contenitore">
<form id="formcontatto" action="aggiungi_contatto.php" method="post">
    <input type="text" id="nome" name="nome">
    <input type="submit" value="Aggiungi contatto">
    <input type="hidden" name="id_utente" value="<?php echo $_GET["id"]; ?>">
</form>
</div>
<script src="script.js"></script>
</body>
</html>
