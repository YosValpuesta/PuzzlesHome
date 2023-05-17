<?php
session_start();
session_unset();
session_destroy();
?>

<script>
    alert('Para realizar compras debes iniciar sesión');
    window.location = '../index.php'
</script>

