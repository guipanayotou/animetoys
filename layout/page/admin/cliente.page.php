<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-user-secret color"></i> Clientes</h1>
        <hr />

        <h2><?php
            if (!isset($_GET['id']))
                echo "Cadastrar ";
            else
                echo "Editar ";
            ?> Cliente</h2>
        <form method="post">
            <label for="nome"><b class="color">*</b> Nome: </label><br />
            <input type="text" autofocus value="<?php echo $cli->getNome(); ?>" name="nome" required placeholder="Digite o nome do cliente" title="Digite o nome do cliente" /><br /><br />

            <label for="tel">Telefone: </label><br />
            <input type="tel" id="telefone" value="<?php echo $cli->getTelefone(); ?>" name="telefone" placeholder="Digite o telefone do cliente" title="Digite o telefone do cliente" /><br /><br />

            <label for="E-Mail"><b class="color">*</b> E-Mail:</label><br />
            <input type="email" required value="<?php echo $cli->getEmail(); ?>" name="email" placeholder="Digite o E-Mail do cliente" title='Digite o E-Mail do cliente' /><br /><br />

            <label for="cpf">CPF:</label><br />
            <input type="text" id="cpf" value="<?php if($cli->getEmail() != '') echo substr($cli->getCpf(), 0, 3) . "." . substr($cli->getCpf(), 3, 3) . "." . substr($cli->getCpf(), 6, 3) . "-" . substr($cli->getCpf(), 9, 2); ?>" name="cpf" placeholder="Digite o CPF do cliente" title='Digite o CPF do cliente' /><br /><br />

            <label for="endereco">Endereço:</label><br />
            <input type="text" value="<?php echo $cli->getEndereco(); ?>" name="endereco" placeholder="Digite o endereço do cliente" title='Digite o endereço do cliente' /><br /><br />

            <label for="pontos">pontos:</label><br />
            <input min="0" type="number" value="<?php echo $cli->getPontos(); ?>" name="pontos" placeholder="Digite os pontos do cliente" title='Digite os pontos endereço do cliente' /><br /><br />

            <button type="submit" name="submit"> <?php
                if (!isset($_GET['id']))
                    echo "<i class='fa fa-save'></i> Cadastrar ";
                else
                    echo "<i class='fa fa-edit'></i> Editar ";
                ?>
            </button>
        </form>

    </div>
    <br />
    <h2>Clientes cadastrados</h2>
    <div style="overflow-x: auto; width: 100%;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Pontos</th>

                    <th>Editar</th> 
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo $u->getEmail(); ?></td>
                        <td><?php echo $u->getTelefone(); ?></td>
                        <td><?php echo substr($u->getCpf(), 0, 3) . "." . substr($u->getCpf(), 3, 3) . "." . substr($u->getCpf(), 6, 3) . "-" . substr($u->getCpf(), 9, 2); ?></td>
                        <td><?php echo $u->getPontos(); ?></td>



                        <td><a href="./cliente?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td>
                        <td><a href="./cliente?excluir=<?php echo $u->getId(); ?>"><i class="fa fa-remove color"></i></a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
</div>
