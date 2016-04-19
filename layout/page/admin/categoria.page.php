<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-th-list color"></i> Categorias</h1>
        <hr />

        <h2><?php
            if (!isset($_GET['id']))
                echo "Cadastrar ";
            else
                echo "Editar ";
            ?> Categoria</h2>
        <form method="post">
            <label for="nome"><b class="color">*</b> Nome: </label><br />
            <input type="text" autofocus value="<?php echo $cat->getNome(); ?>" name="nome" required placeholder="Digite o nome da categoria" title="Digite o nome da categoria" /><br /><br />

            <label for="descricao">Descrição: </label><br />
            <textarea name="descricao" placeholder="Digite informações sobre a categoria" title='Digite informações sobre a categoria' /><?php echo $cat->getDescricao(); ?></textarea><br /><br />

            <button type="submit" name="submit"> <?php
                if (!isset($_GET['id']))
                    echo "<i class='fa fa-save'></i> Cadastrar ";
                else
                    echo "<i class='fa fa-edit'></i> Editar ";
                ?></button>
        </form>

    </div>
    <br />
    <h2>Categorias cadastradas</h2>
    <div style="overflow-x: auto; width: 100%;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo substr($u->getDescricao(), 0, 20) . "..."; ?></td>
                        <td><a href="./categoria?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                        <td><a href="./categoria?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
</div>
<script>
    CKEDITOR.replace('descricao');
</script>