<!-- Conteudo da página inicial -->
<section>
    <h1><?php echo $pag->getTitulo(); ?></h1>
    <?php if (isset($_GET['pontos'])): ?>
    <div>
        <p>Você possuí <?php echo $_GET['pontos']; ?> pontos.</p>
    </div>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
    <div>
        <p class="color">Ops, não foi enconrado ninguém com esse E-Mail...</p>
    </div>
    <?php endif; ?>
    <br />
    <?php echo $pag->getTexto(); ?>
</section>

