<?php include_once '/uri.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- inclui as metatags -->
        <?php include_once './include/admin/meta.include.php'; ?>
    </head>
    <body>
        <!-- inclui o cabeçalho com o titulo do site -->
        <?php include "./include/admin/header.include.php"; ?>
        <div id="main">
            <!-- Inclui o menu principal -->
            <?php include "./include/admin/menu.include.php"; ?>
            <div class="container">
                <!-- mostra o corpo do texto -->
                <?php echo $corpo; ?>
            </div>
        </div>

    </body>
</html>

