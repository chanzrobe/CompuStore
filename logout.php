<?php
    session_start();
    unset($_SESSION["user_id"]);
    unset($_SESSION["username"]);
    ?>
        <script type="text/javascript"> window.location="index.html"; </script>
    <?php
?>