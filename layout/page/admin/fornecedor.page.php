<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-share-alt color"></i> Fornecedores</h1>
        <hr />

        <h2><?php
            if (!isset($_GET['id']))
                echo "Cadastrar ";
            else
                echo "Editar ";
            ?> Fornecedor</h2>
        <form method="post">
            <label for="nome"><b class="color">*</b> Nome: </label><br />
            <input type="text" autofocus value="<?php echo $forn->getNome(); ?>" name="nome" required placeholder="Digite o nome do fornecedor" title="Digite o nome do fornecedor" /><br /><br />

            <label for="tel">Telefone: </label><br />
            <input type="tel" id="telefone" value="<?php echo $forn->getTelefone(); ?>" name="telefone" placeholder="Digite o telefone do fornecedor" title="Digite o telefone do fornecedor" /><br /><br />

            <label for="email">E-Mail:</label><br />
            <input type="email" value="<?php echo $forn->getEmail(); ?>" name="email" placeholder="Digite o E-Mail do fornecedor" title='Digite o E-Mail do fornecedor' /><br /><br />

            <label for="endereco">Endereço:</label><br />
            <input type="text" value="<?php echo $forn->getEndereco(); ?>" name="endereco" placeholder="Digite o endereço do fornecedor" title='Digite o endereço do fornecedor' /><br /><br />

            <label for="descricao">Descrição: </label><br />
            <textarea name="descricao" placeholder="Digite informações sobre o fornecedor" title='Digite informações sobre o  fornecedor' /><?php echo $forn->getDescricao(); ?></textarea><br /><br />

            <button type="submit" name="submit"> <?php
                if (!isset($_GET['id']))
                    echo "<i class='fa fa-save'></i> Cadastrar ";
                else
                    echo "<i class='fa fa-edit'></i> Editar ";
                ?></button>
        </form>

    </div>
    <br />
    <h2>Fornecedores cadastrados</h2>
    <div style="overflow-x: auto; width: 100%;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Descrição</th>
                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fornecedores as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo $u->getEmail(); ?></td>
                        <td><?php echo $u->getTelefone(); ?></td>
                        <td><?php echo substr($u->getEndereco(), 0, 20) . "..."; ?></td>
                        <td><?php echo substr($u->getDescricao(), 0, 20) . "..."; ?></td>
                        <?php if ($u->getId() != 1): ?>
                            <td><a href="./fornecedor?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                            <td><a href="./fornecedor?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>
                                <?php else: ?>
                            <td></td><td></td>
                        <?php endif; ?>
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