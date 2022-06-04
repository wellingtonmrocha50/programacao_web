<?php
//chamando a conexao
include_once 'db_connect.php';

//header
include_once 'header.php';

//mensagem
include_once 'mensagem.php';
?>


<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">CLIENTES</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>SobreNome</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                </tr>
            </thead>

            <tbody>
                <!--criando banco de dados dinâmicos-->
                <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):


                //criando loop do banco de dados
                while($dados = mysqli_fetch_array($resultado)):  
                ?>
                <tr>
                    <td><?php echo $dados['nome'];?></td>
                    <td><?php echo $dados['sobrenome'];?></td>
                    <td><?php echo $dados['email'];?></td>
                    <td><?php echo $dados['endereco'];?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating purple"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    <!-- Modal Structure/ botao para excluindo dados-->
                        <div id="modal<?php echo $dados['id'];?>" class="modal">
                            <div class="modal-content">
                                <h4>Excluir Dados</h4>
                                <p>Tem certeza que deseja Excluir os Dados?</p>
                            </div>
                            <div class="modal-footer">
                            
                            <form action="deletar.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                                <button type="submit" name="btn-deletar" class="btn red">Sim,deletar</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat yellow">Cancelar</a>
                            </form>
                            </div>
                        </div>
                </tr>
                <!--fechando o loop-->
                <?php 
                endwhile; 
            else:?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php
                endif;
            ?>

            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Cliente</a>
    </div>
</div>

<?php
include_once 'footer.php';
?>
