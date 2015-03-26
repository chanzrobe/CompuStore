<?php
    session_start();

    if (!isset($_SESSION['timestamp'])){
        ?>
        <script type="text/javascript"> window.location="index.html"; </script>
        <?php
    }else{            
            session_unset();
            session_destroy();
            ?>
            <div id="logout_page">
                <div id="logout_box">
                    <h1>Bye!</h1>
                    <p>You've been logged out. Closing your browser helps to ensure your account stays secure.</p>
                    <p>Redirecting back to CheapoMail home in 5 seconds...</p>
                </div>
            </div>

            <?php
                print_r($_SESSION);
        }
?>