<?php
    // Connessione al database
include 'conn.php';

    // Recupero dei dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Recupero dell'immagine
    $img = addslashes(file_get_contents("default.jpg"));
    
    // Query per l'inserimento dei dati nel database
    $sql = "INSERT INTO utenti (username, password, foto) VALUES ('$username', '$password', '$img')";

    // Esecuzione della query
    if (mysqli_query($conn, $sql)) {
        // Reindirizzamento alla pagina principale
        header("Location: index.php");
    } else {
        echo "Errore durante l'inserimento dei dati: " . mysqli_error($conn);
    }

    // Chiusura della connessione
    mysqli_close($conn);
?>
