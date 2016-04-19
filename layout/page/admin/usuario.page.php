<div style="width: 100%; padding: 10px 0px;">
    <div>
        <h1><i class="fa fa-user color"></i> Usuários</h1>
        <hr />
        <?php if ($logado->getTipo() == 1 || $logado->getTipo() == 2): ?>
            <h2><?php
                if (!isset($_GET['id']))
                    echo "Cadastrar ";
                else
                    echo "Editar ";
                ?> Usuário</h2>
            <form method="post">
                <?php if (isset($_GET['msg'])): ?>
                    <p class="color">
                        <?php if ($_GET['msg'] == 1): ?>
                            <i class="fa fa-check"></i> Usuário cadastrado com sucesso!
                        <?php else: ?>
                            <i class="fa fa-warning"></i> Ops, houve um erro, tente novamente mais tarde :(
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
                <label for="nome"><b class="color">*</b> Nome: </label><br />
                <input type="text" autofocus value="<?php echo $usr->getNome(); ?>" name="nome" required placeholder="Digite o nome do usuário" title="Digite o nome do usuário" /><br /><br />

                <label for="usuario"><b class="color">*</b> Usuário para Login: </label><br />
                <input type="text" value="<?php echo $usr->getUsuario(); ?>" name="usuario" required placeholder="Digite o usuário para Login" title="Digite o usuário para Login" /><br /><br />

                <label for="senha"><?php if (!isset($_GET['id'])) echo '<b class="color">*</b> '; ?> Senha: </label><br />
                <input type="password" <?php if (!isset($_GET['id'])) echo 'required'; ?> name="senha" placeholder="Digite o telefone do usuário" title="Digite o telefone do usuário" /><br /><br />

                <label for="tel">Telefone: </label><br />
                <input type="tel" value="<?php echo $usr->getTelefone(); ?>" name="telefone" placeholder="Digite o telefone do usuário" title="Digite o telefone do usuário" /><br /><br />

                <label for="email">E-Mail</label><br />
                <input type="email" value="<?php echo $usr->getEmail(); ?>" name="email" placeholder="Digite o E-Mail do usuário" title='Digite o E-Mail do usuário' /><br /><br />

                <label for="descontomaximo"><b class="color"></b> Desconto Máximo ( % )</label><br />
                <input min="0" max="100" type="number" value="<?php echo $usr->getDescontomaximo(); ?>" name="descontomaximo" placeholder="Digite o desconto máximo que esse usuário pode dar" title='Digite o desconto máximo que esse usuário pode dar' /><br /><br />

                <label for="tipo"><b class="color"></b> Tipo:</label><br />
                <select name="tipo" required>
                    <option <?php if ($usr->getTipo() == 1) echo "selected" ?> value="1">Administrador</option>
                    <option <?php if ($usr->getTipo() == 2) echo "selected" ?> value="2">Gerente</option>
                    <option <?php if ($usr->getTipo() == 3) echo "selected" ?> value="3" <?php if (!isset($_GET['id'])) echo 'selected' ?>>Vendedor</option>
                    <option <?php if ($usr->getTipo() == 4) echo "selected" ?> value="4">Bloqueado</option>
                </select>
                <br /><br />
                <button type="submit" name="submit"> <?php
                    if (!isset($_GET['id']))
                        echo "<i class='fa fa-user-plus'></i> Cadastrar ";
                    else
                        echo "<i class='fa fa-edit'></i> Editar ";
                    ?></button>
            </form>
        <?php endif; ?>
    </div>
    <br />
    <h2>Usuários cadastrados</h2>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>tipo</th>
                    <th>Desconto Máximo</th>
                    <?php if ($logado->getTipo() == 1 || $logado->getTipo() == 2): ?>  <th>Editar</th> <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getUsuario(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo $u->getEmail(); ?></td>
                        <td><?php echo $u->getTelefone(); ?></td>
                        <td><?php
                            switch ($u->getTipo()) {
                                case 1:
                                    echo 'Administrador';
                                    break;
                                case 2:
                                    echo 'Gerente';
                                    break;
                                case 3:
                                    echo 'Vendedor';
                                    break;
                                case 4:
                                    echo 'Bloqueado';
                                    break;
                            }
                            ?></td>
                        <td><?php echo $u->getDescontomaximo() . "%"; ?></td>
                        <?php if ($logado->getTipo() == 1 || $logado->getTipo() == 2): ?>  <td><a href="./usuario?id=<?php echo $u->getId(); ?>"><i class="fa fa-edit color"></i></a></td><?php endif; ?>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
</div>