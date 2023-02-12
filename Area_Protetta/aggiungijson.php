<?php
include 'conn.php';

// Creiamo un array contatti
$contatti = array();

// Codifichiamo l'array in una stringa json
$contatti_json = json_encode(array("contatti" => $contatti));

// Aggiorniamo la tabella utenti con la nuova stringa json
$query = "UPDATE utenti SET contatti = '$contatti_json' WHERE id = 3";
mysqli_query($conn, $query);

// Chiudo la connessione al database
mysqli_close($conn);


header("Location: addcontatto.php");
echo json_encode(['success' => true]);
exit;

?>

