<?php
include "auth_user.php";

unset($_SESSION['user']);
session_destroy();
?>
<script>
alert("You have been logged out!Log in to access system.");
window.location="login.php";
</script>
<?php
?>
