<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="script.js"></script>
  </head>
  <body>
      <button class="show-iframe" onclick="openaddcontatto()">+</button>
      <iframe src="addcontatto.php?id=<?php 
        session_start();
        echo $_SESSION['id_utente'];?>" id="contatto"><div id="close-button" onclick="closeaddcontatto()">&times;</div></iframe>
    
    
    <div class='contenitorecontatti'>
    <div class='top-bar'>
        <img src='data:image/jpeg;base64, <?php 
        include 'conn.php';
        session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $id_utente = $_SESSION['id_utente'];
            $query = "SELECT foto FROM utenti WHERE id = $id_utente";
            $profile_image = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($profile_image);
            $foto = $row['foto'];
            $foto_base64 = base64_encode($foto);
            echo $foto_base64;
        }; 
?>' class='profile-img'>
    <p id="username"><?php 
        include 'conn.php';
        // session_start();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            $id_utente = $_SESSION['id_utente'];
            $query = "SELECT username FROM utenti WHERE id = $id_utente";
            $profile_image = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($profile_image);
            $foto = $row['username'];
            echo $foto;
        }; 
?></p>
    <div class='dropdown'>
  <i class='fas fa-ellipsis-v'></i>
  <div class='dropdown-content'>
    <a href='settings' onclick="openimpostazioni()">Impostazioni</a>
    <a href='teme' onclick="opentema()">Tema</a>
    <iframe id="tema" src="tema.php">
        <div id="close-button" onclick="closetema()">&times;</div>
    </iframe>
    <iframe id="impostazioni" src="impostazioni.php">
        <div id="close-button" onclick="closeimpostazioni()">&times;</div>
    </iframe>
  </div>
</div>
    </div>
  
<div id="contatti">
<?php
include 'conn.php';

// Avvio la sessione
// session_start();

// Verifico se la sessione è attiva
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
    // Prendiamo l'id dell'utente dalla sessione
    $id_utente = $_SESSION['id_utente'];

    // Selezioniamo la stringa json contatti dalla tabella utenti
    $query = "SELECT contatti FROM utenti WHERE id = $id_utente";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $contatti_json = $row['contatti'];

    // Verifichiamo se esiste la stringa json
    if(!empty($contatti_json)) {
        // Decodifichiamo la stringa json in un array
        $contatti = json_decode($contatti_json, true);

        // Verifichiamo se ci sono contatti
        if(!empty($contatti)) {
            // Creiamo un div per ogni contatto
            foreach ($contatti['contatti'] as $contatto) {
                // Selezioniamo l'immagine e il nome utente del contatto
                $query = "SELECT foto, username FROM utenti WHERE id = $contatto";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $foto = $row['foto'];
                $foto_base64 = base64_encode($foto);
                $nome = $row['username'];

                // Creiamo il div con l'immagine e il nome utente
                echo "<div class='contatto'>";
                echo "<img src='data:image/jpeg;base64, $foto_base64'/>";
                echo "<p>$nome</p>";
                echo "</div>";
            }
        } else {
            echo "Non hai contatti";
        }
    } else {
        // Creiamo una nuova stringa json vuota per l'array contatti
        $contatti_json = json_encode(array("contatti" => array()));

        // Aggiorniamo la tabella utenti con la nuova stringa json
        $query = "UPDATE utenti SET contatti = '$contatti_json' WHERE id = $id_utente";
        mysqli_query($conn, $query);
        echo "Non hai contatti";
    }
} else {
    echo "Devi essere loggato per aggiungere contatti";
    exit;
}

// Chiudo la connessione al database
mysqli_close($conn);

?>
</div>
    </div>

  </body>
</html>

