<?php
session_start();

if(isset($_SESSION['mensagem'])): ?>

    <!--criando mensagem instântanea materialize-->
    <script>
        window.onload = function(){
            M.toast({html: ' <?php echo $_SESSION['mensagem']; ?>'});
        };
    </script>
    <?php
    endif;
    // destruindo a mensagem
    session_unset();
    ?>