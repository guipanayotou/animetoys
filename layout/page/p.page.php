<!-- Conteudo da página inicial -->
<section>
    <h1><i class="fa fa-ellipsis-h color"></i> <?php echo $produto->getNome(); ?></h1>
    <div class="bb2"></div>
       <img src="./layout/img/produtos/<?php echo $produto->getImg1(); ?>" alt="<?php echo $produto->getNome(); ?>" class="fr" style="margin: 10px auto;  max-height: 250px; padding: 30px;" />
             
    <small>
        <?php
        foreach ($categorias as $cat) {
            if ($cat->getId() == $produto->getIdcategoria()) {
                echo $cat->getNome();
                break;
            }
        }
        ?>
    </small>
    <p class="color">R$ <?php echo str_replace('.', ',', $produto->getPreco()); ?></p>
    <br /><br />
    <div>
        <?php echo $produto->getDescricao(); ?>
    </div>
    <br />
    <br />
    <br />
    <div class="bb2"></div>
    <a href="./produtos" title="Voltar para ver todos os produtos..."><i class="fa fa-chevron-left"></i> Voltar</a>
</section>

