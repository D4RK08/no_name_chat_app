<?php
// connessione al database
include 'conn.php';


    // recupero l'id dell'utente loggato
    $id_utente = $_POST['id_utente'];
    // recupero l'username del contatto da aggiungere
    $username_contatto = $_POST['nome'];
    // recupero l'id del contatto con l'username fornito
    $query = "SELECT id FROM utenti WHERE username = '$username_contatto'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $id_contatto = $row['id'];
    // recupero la stringa json dei contatti dell'utente loggato
    $query = "SELECT contatti FROM utenti WHERE id = $id_utente";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $contatti = $row['contatti'];
    // verifico se la stringa json esiste
    if($contatti){
        // decodifico la stringa json
        $contatti_array = json_decode($contatti, true);
        // verifico se esiste l'array "dru"
        if(array_key_exists("contatti", $contatti_array)){
            // se esiste aggiungo l'id del contatto all'array "dru"
            array_push($contatti_array["contatti"], $id_contatto);
        } else {
            // se non esiste creo un nuovo array "dru" con l'id del contatto
            $contatti_array["contatti"] = array($id_contatto);
        }
        // codifico l'array in una nuova stringa json
        $contatti = json_encode($contatti_array);
    } else {
        // se non esiste creo un nuovo array con l'array "dru" e l'id del contatto
        $contatti_array = array("contatti" => array($id_contatto));
        // codifico l'array in una nuova stringa json
        $contatti = json_encode($contatti_array);
    }
    // aggiorno la stringa json dei contatti dell'utente loggato
    $query = "UPDATE utenti SET contatti = '$contatti' WHERE id = $id_utente";
    $result = mysqli_query($conn, $query);
    // verifico se la query è andata a buon fine
    if($result){
        echo "Contatto aggiunto con successo";
    } else {
        echo "Errore nell'aggiunta del contatto";
    }

// Chiudo la connessione al database
mysqli_close($conn);
?>
