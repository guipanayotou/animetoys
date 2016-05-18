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
            <?php if (isset($_GET['erro'])): ?>
                <p class="color">
                    <?php
                    switch ($_GET['erro']) {
                        case 1:
                            echo 'Esse vendedor não pode dar um desconto tão alto :/ ';
                            break;
                        case 2:
                            echo 'Não existem produtos suficientes no estoque, <a href="./produto?id=' . $_GET['p'] . '" target="_blank">clique aqui</a> para atualizar o estoque desse produto...';
                            break;
                        case 3:
                            echo 'Não foi encontrado nenhum cliente com esse E-Mail...';
                            break;
                        case 4:
                            echo 'Não foi encontrado ninguem para atribuir esses pontos...';
                            break;
                        default :
                            echo $_GET['erro'];
                    }
                    ?>
                </p>
            <?php endif; ?>
            <label for="idproduto"><b class="color">*</b> Produto: </label><br />
            <select name="idproduto" required title="Selecione o produto">
                <option disabled value="" <?php if (!isset($_GET['id'])) echo 'selected'; ?>>Selecione um produto...</option>
                <?php foreach ($produtos as $p): ?>
                    <option <?php if ($vend->getIdproduto() == $p->getId()) echo 'selected' ?> value="<?php echo $p->getId(); ?>"><?php echo $p->getNome(); ?></option>
                <?php endforeach; ?>
            </select><br /><br />

            <label for="quantidade"><b class="color">*</b> Quantidade: </label><br />
            <input type="number" value="1" name="quantidade" required placeholder="Digite a quantidade desse produto que será vendida" title="Digite a quantidade desse produto que será vendida" /><br /><br />

            <label for="email">E-Mail do cliente: </label><br />
            <input type="email" value="<?php echo $c->getEmail() ?>" name="email" placeholder="Digite o E-Mail do cliente" title="Digite o E-Mail do cliente" /><br />
            <p><a href="./cliente" target="_blank" title="adicionar cliente"><i class="fa fa-plus"></i> Adicionar Cliente</a></p><br />
            <label for="pontos">Pontos de fidelidade extras: </label><br />
            <input type="number" value="0" name="pontos" required placeholder="Digite quantos pontos serão acrescidos ao cliente" title="Digite quantos pontos serão acrescidos ao cliente" /><br /><br />

            <label for="idusuario"><b class="color">*</b> Vendedor: </label><br />
            <select name="idusuario" required title="Selecione o usuário">
                <?php foreach ($usuarios as $p): ?>
                    <option <?php
                    if ($vend->getIdusuario() == $p->getId() && isset($_GET['id']))
                        echo 'selected';
                    if ($logado->getId() == $p->getId() && isset($_GET['id']))
                        
                        ?> value="<?php echo $p->getId(); ?>"><?php echo $p->getNome(); ?></option>
                    <?php endforeach; ?>
            </select><br /><br />

            <label for="desconto">Desconto da venda (%): </label><br />
            <input type="text" value="<?php
            if (isset($_GET['id']))
                echo $vend->getDesconto();
            else
                echo 0;
            ?>" name="desconto" placeholder="Digite o desconto da venda" title="Digite o desconto da venda" /><br /><br />


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
                    <th>Produto</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Desconto</th>
                    <th>Data</th>

                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td>
                            <?php
                            foreach ($produtos as $p) {
                                if ($p->getId() == $u->getIdproduto()) {
                                    echo $p->getNome();
                                    break;
                                }
                            }
                            ?>
                        </td>
                        <td><?php
                            if ($u->getIdcliente() != '') {
                                foreach ($clis as $p) {
                                    if ($p->getId() == $u->getIdcliente()) {
                                        echo $p->getNome();
                                        break;
                                    }
                                }
                            }
                            ?></td>
                        <td><?php
                            foreach ($usuarios as $p) {
                                if ($p->getId() == $u->getIdusuario()) {
                                    echo $p->getNome();
                                    break;
                                }
                            }
                            ?></td>
                        <td><?php echo $u->getDesconto(); ?>%</td>
                        <td><?php echo date("d/m/Y - H:i", strtotime($u->getData())); ?></td>
                        <td><a href="./venda?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                        <td><a href="./venda?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
</div>
