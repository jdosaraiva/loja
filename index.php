<?php require_once("cabecalho.php"); ?> 
    <div class="principal">
        <h1>Bem vindo!</h1>
        <?php
        if(isset($_COOKIE["usuario_logado"])) {
        ?>
        <p class="text-success">Você está logado como <?= $_COOKIE["usuario_logado"] ?></p>
        <?php
        } else {
        ?>
        </div>
        <div class="principal">
            <h2>Login</h2>
        </div>
        <form action="login.php" method="post">
        <table class="table">
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="email" name="email"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha"></td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-primary">Login</button></td>
            </tr>
        </table>
        </form>
        <?php
        }
        ?>
<?php require_once("rodape.php"); ?> 
