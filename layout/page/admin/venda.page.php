<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-dollar color"></i> Vendas</h1>
        <hr />

        <h2><?php
            if (!isset($_GET['id']))
                echo "Registrar ";
            else
                echo "Editar ";
            ?> venda</h2>
        <form method="post">
            <label for="nome"><b class="color">*</b> Nome: </label><br />
            <input type="text" autofocus value="<?php echo $vend->getId(); ?>" name="nome" required placeholder="Digite o nome da venda" title="Digite o nome da venda" /><br /><br />

            <button type="submit" name="submit"> <?php
                if (!isset($_GET['id']))
                    echo "<i class='fa fa-save'></i> Registrar ";
                else
                    echo "<i class='fa fa-edit'></i> Editar ";
                ?></button>
        </form>

    </div>
    <br />
    <h2>Vendas cadastradas</h2>
    <div style="overflow-x: auto; width: 100%;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
           
                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                   
                        <td><a href="./venda?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                        <td><a href="./venda?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
</div>
