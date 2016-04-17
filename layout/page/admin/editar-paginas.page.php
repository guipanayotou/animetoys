<div>
    <h1><i class="fa fa-edit color"></i> Aqui você pode editar o conteúdo de todas as páginas do site</h1>
    <?php foreach ($paginas as $pag): ?>
        <form method="post">
            <h2>Página <?php echo $pag->getTitulo(); ?></h2>
            <input type="hidden" name="id" value="<?php echo $pag->getId(); ?>">

            <label for="titulo">Titulo: </label><br />
            <input type="text" name="titulo" value="<?php echo $pag->getTitulo(); ?>" placeholder="Digite o titulo da página" required /><br />
            <br />
            <label for="texto">Conteúdo principal: </label><br />
            <textarea required name="texto" id="texto<?php echo $pag->getId(); ?>" rows="8"><?php echo $pag->getTexto(); ?></textarea><br /><br />

            <label for="mais">Conteúdo Secundário: </label><br />
            <textarea name="mais" id="mais<?php echo $pag->getId(); ?>" rows="8"><?php echo $pag->getMais(); ?></textarea><br /><br />

            <button type="submit" name="submit"><i class="fa fa-save"></i> Salvar</button>
        </form>
        <br />
        <div class="bb"></div>
        <br /><br />
    <?php endforeach; ?>

    <script>
<?php foreach ($paginas as $pag): ?>
            CKEDITOR.replace('texto<?php echo $pag->getId(); ?>');
            CKEDITOR.replace('mais<?php echo $pag->getId(); ?>');
<?php endforeach; ?>
    </script>
</div>