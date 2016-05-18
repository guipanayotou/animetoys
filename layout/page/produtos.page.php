<!-- Conteudo da página inicial -->
<section>
    <h1><i class="fa fa-ellipsis-h color"></i> <?php echo $pag->getTitulo(); ?></h1>
    <br />
    <p><?php echo $pag->getTexto(); ?></p>
    <br />
    <?php
    $cont = 0;
    foreach ($produtos as $p):
        $cont++;
        ?>
        <div class="coluna2 <?php
        if ($cont % 2 == 0)
            echo 'fr';
        else
            echo 'fl';
        ?>" style="margin: 5px auto;">
            <div style="width: 60%;" class="fl">
                <a href="./p?id=<?php echo $p->getId(); ?>" title="Ver mais informações sobre o produto...">
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
                    <p class="color">R$ <?php echo str_replace('.', ',', $p->getPreco()); ?></p>
                   
                </a>
            </div>
             <a href="./p?id=<?php echo $p->getId(); ?>" title="Ver mais informações sobre o produto...">
            <img src="./layout/img/produtos/<?php echo $p->getImg1(); ?>" alt="<?php echo $p->getNome(); ?>" class="fr" style="margin: 10px; max-width: 30%; max-height: 100%;" />
             </a>
            <div class="bb2"></div>
        </div>
        <?php if ($cont % 2 == 0) echo '<div class="clearfix"></div>' ?>
    <?php endforeach; ?>
    <div class="clearfix"></div>
</section>

