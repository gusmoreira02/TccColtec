<?php
    session_start();
$_SESSION['acesso_liberado'] = 0;
  unset($_SESSION['acesso_liberado']);
  session_destroy();

        header("Location: pagina_inicial_offline.php");