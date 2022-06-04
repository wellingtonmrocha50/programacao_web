<?php
//verificando se existe a sessão mensagem
session_start();

if(isset($_SESSION['mensagem'])):?>
<script>
    //mensagem da pagina
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
    };
</script>

<?php
endif;
//limpando a sessão/mesagem
session_unset();
?>