<?php

// Avvio la sessione
session_start();

// Connessione al database
include 'conn.php';


// Gestione del form di login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupero i dati del form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Verifica dei dati di login nel database
    $query = "SELECT id, username, password FROM utenti WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
    // Login riuscito, imposto la sessione e reindirizzo alla pagina protetta
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        $_SESSION['id_utente'] = $row['id'];
        header('Location: Area_Protetta');
        exit;
    } else {
    // Login fallito, visualizzo un messaggio di errore
        $error_message = 'Username o password non validi';
    }
}?>
