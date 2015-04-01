<?php
    session_start();
    unset($_SESSION["user_id"]);
    unset($_SESSION["username"]);
    unset($_SESSION["laptopid"]);
    ?>
        <script type="text/javascript"> window.location="index.php"; </script>
    <?php
?>