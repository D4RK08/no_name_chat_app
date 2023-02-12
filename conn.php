<?php

$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'whatsapp_clone';

$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica della connessione
if (!$conn) {
    die('Errore di connessione: ' . mysqli_connect_error());
}
?>
