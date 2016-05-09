<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-shopping-basket color"></i> Produtos</h1>
        <hr />

        <h2><?php
            if (!isset($_GET['id']))
                echo "Cadastrar ";
            else
                echo "Editar ";
            ?> Produto</h2>

        <form method="post" enctype="multipart/form-data">
        <label for="nome"><b class="color">*</b> Nome do produto:</label><br />
        <input type="text" value="<?php echo $prod->getNome(); ?>" name="nome" placeholder="Digite o nome do produto" title="Digite o nome do produto" /><br /><br />


        <label for="idcategoria"><b class="color">*</b> Categoria: </label><br />
        <select name="idcategoria" required>
            <option value="" <?php if ($prod->getId() == '') echo 'selected'; ?> disabled>Selecione uma categoria...</option>
            <?php foreach ($categorias as $cat): ?>
                <option <?php if ($cat->getId() == $prod->getIdcategoria()) echo 'selected'; ?> value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNome(); ?></option>
            <?php endforeach; ?>

        </select><br /><br />

        <label for="preco">Preço: (Apenas números)</label><br />
        <input type="text" value="<?php echo $prod->getPreco(); ?>" name="preco" placeholder="Digite o preço do produto" title="Digite o preço do produto" /><br /><br />

        <label for="estoque">Estoque: </label><br />
        <input min="0" type="number" value="<?php echo $prod->getEstoque(); ?>" name="estoque" placeholder="Digite a quantidade em estoque" title="Digite a quantidade em estoque" /><br /><br />

        <label for="idfornecedor"> Fornecedor: </label><br />
        <select name="idfornecedor">
            <?php foreach ($fornecedores as $forn): ?>
                <option <?php if ($forn->getId() == $prod->getIdfornecedor()) echo 'selected'; ?> value="<?php echo $forn->getId(); ?>"><?php echo $forn->getNome(); ?></option>
            <?php endforeach; ?>

        </select><br /><br />

        <label for="descricao">Descrição: </label><br />
        <textarea name="descricao" placeholder="Digite informações do produto" title='Digite informações do produto' /><?php echo $prod->getDescricao(); ?></textarea><br /><br />

        <label for="ativo">Disponibilidade: </label><br />
        <select name="ativo">
            <option <?php
            if ($prod->getId() == '')
                echo 'selected';
            if ($prod->getAtivo() == 1)
                echo 'selected';
            ?> value="1">Produto ativo</option>
            <option <?php if ($prod->getAtivo() == '0') echo 'selected'; ?> value="0">Produto Inativo</option>
        </select><br /><br />
        <p>Escolha a imagem do produto:</p><br/>
        <input type="file" name="arquivo" id="arquivo" placeholder="Escolha a foto principal do produto"><br /><br />


        <button type="submit" name="submit"> <?php
            if (!isset($_GET['id']))
                echo "<i class='fa fa-save'></i> Cadastrar ";
            else
                echo "<i class='fa fa-edit'></i> Editar ";
            ?></button>
        </form>

    </div>
    <br />
    <h2>Produtos cadastrados</h2>
    <div style="overflow-x: auto; width: 100%;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Descrição</th>
                    <th>Disponibilidade</th>
                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo $u->getPreco(); ?></td>
                        <td class="<?php if ($u->getEstoque() < 10) echo "color"; ?>"><?php echo $u->getEstoque(); ?></td>
                        <td><?php echo substr($u->getDescricao(), 0, 20) . "..."; ?></td>
                        <td><?php
                            if ($u->getAtivo() == 1)
                                echo "ativo";
                            else
                                echo "inativo";
                            ?></td>
                        <td><a href="./produto?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                        <td><a href="./produto?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>
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