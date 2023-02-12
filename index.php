<html lang="en" class="notranslate" translate="no">
  <head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="google" content="notranslate" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
// Imposta il cookie
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Recupera il valore del cookie
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

// Modifica il tema
function toggleTheme() {
  var body = document.body;
  if (body.className === "light-theme") {
    body.className = "dark-theme";
    setCookie("theme", "dark-theme", 365);
  } else {
    body.className = "light-theme";
    setCookie("theme", "light-theme", 365);
  }
}

// Carica il tema salvato alla pagina caricata
window.onload = function() {
  var theme = getCookie("theme");
  if (theme) {
    document.body.className = theme;
  }
}
    </script>
  </head>
  <body class="light-theme">
    <header>
        <button id="theme-toggle-button" onclick="toggleTheme()">Cambia tema</button>
    </header>
    <div id="login-container">
    <h1>LOGIN</h1>
      <form action="login.php" method="post" id="login-form" autocomplete="off">
        <div style="display: flex; align-items: center; justify-content: center; margin-top: 10px; flex-direction: column; width: 100%; height: 100%;">
        <input name=username type="text" id="login-username" placeholder="Username" autocomplete = 'off'>
        <input name=password type="password" id="login-password" placeholder="Password" autocomplete = 'off'>
        <input type="submit" value="Login">
        </div>
      </form>
    </div>

    <div id="register-container">
    <h1>SIGIN</h1>
      <form action="registrazione.php" method="post" id="register-form" autocomplete="off">
        <div style="display: flex; align-items: center; justify-content: center; margin-top: 10px; flex-direction: column; width: 100%; height: 100%;">
          <input type="text" name=username id="register-username" placeholder="Username" autocomplete = 'off'>
          <input  name=password type="password" id="register-password" placeholder="Password" autocomplete = 'off'>
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </body>
</html>
