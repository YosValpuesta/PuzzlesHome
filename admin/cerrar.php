<?php
session_start();
session_unset();
session_destroy();
?>

<script>
    alert('Has finalizado sesión, no podras administrar los productos');
    window.location = '../login/login.php'
</script>

