<!-- Conteudo da página inicial -->
<section>
    <h1><i class="fa fa-shopping-cart color"></i> <?php echo $pag->getTitulo(); ?></h1>
    <br />
    <p><?php echo $pag->getTexto(); ?></p>
    <br />
    <?php
    $cont = 0;
    foreach ($produtos as $p):
        $cont++;
        ?>
    <div class="coluna2 <?php if($cont % 2 == 0) echo 'fr'; else echo 'fl'; ?>" style="margin: 5px auto;">
        <div style="width: 60%;">
            <h2><?php echo $p->getNome(); ?></h2>
            <small>
                <?php
                foreach ($categorias as $cat) {
                    if ($cat->getId() == $p->getIdcategoria()) {
                        echo $cat->getNome();
                        break;
                    }
                }
                ?>
            </small>
            <p class="color">R$<?php echo $p->getPreco(); ?></p>
            <p><?php echo $p->getDescricao(); ?></p>
        </div>
            <img src="" alt="<?php echo $p->getNome(); ?>" class="fr" style="margin: 10px; max-width: 40%; max-height: 100%;" />
            <div class="bb2"></div>
        </div>
    <?php endforeach; ?>
</section>

