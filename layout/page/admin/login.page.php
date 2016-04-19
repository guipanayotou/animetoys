<?php include_once '/uri.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- inclui as metatags -->
        <?php include_once './include/admin/meta.include.php'; ?>
    </head>
    <body>
        <!-- inclui o cabeçalho com o titulo do site -->

        <div id="main">
            <!-- Inclui o menu principal -->

            <div class="container text-center">
                <h1><i class="fa fa-sign-in color"></i> Login Sistema Administrativo</h1>
                <form method="post" class="form-login">
                    <label for="usuario">Usuário: </label><br />
                    <input type="text" name="usuario" autofocus required placeholder="Digite o seu usuário" /><br /><br />
                    <label for="senha">Senha: </label><br />
                    <input type="password" name="senha" required placeholder="Digite sua senha" /><br /><br />

                    <button type="submit" name="submit"><i class="fa fa-paper-plane-o"></i> Logar</button>
                    <?php if (isset($_GET['erro'])): ?>
                        <br /><br />
                        <p class="color">Ops, usuário ou senha incorretos, tente novamente.</p>
                    <?php endif; ?>
                </form>
                <!-- mostra o corpo do texto -->
                <?php echo $corpo; ?>
            </div>
        </div>

    </body>
</html>

