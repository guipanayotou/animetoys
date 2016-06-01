
<section>
    <h1><i class="fa fa-comments-o color"></i> <?php echo $pag->getTitulo(); ?></h1>
    <br />
    <div style="width: 100%; padding: 10px 0; ">
        <div class="coluna2 fl">
            <form method="GET">
                <p>Para entrar em contato com a gente, preencha o formulário abaixo. Os campos com ( <b class="color">*</b> )
                    são de preenchimento obrigatório.</p>
                <br />

                <label for="nome"><b class="color">*</b> Nome: </label><br />
                <input type="text" name="nome" required placeholder="Digite seu nome" title="Digite seu nome" /><br /><br />

                <label for="tel">Telefone: </label><br />
                <input type="tel"id="telefone" name="telefone" placeholder="Digite seu telefone" title="Digite seu telefone" /><br /><br />

                <label for="E-Mail"><b class="color">*</b> E-Mail</label><br />
                <input type="email" name="email" required placeholder="Digite seu E-Mail" title="digite seu E-Mail" /><br /><br />


                <label for="mensagem"><b class="color">*</b> Mensagem: </label><br />
                <textarea name="mensagem"  placeholder="Digite sua mensagem" required title="Digite sua mensagem"></textarea><br /><br />
                <button type="submit" name="submit"><i class="fa fa-paper-plane-o"></i> Enviar</button>
                <div id="msg"></div>

            </form>
            <br />
        </div>
        <div class="coluna2 fr">
            <h2><i class="fa fa-phone color"></i> Nosso Telefone</h2><br />
          
            <h3>(15) 3346 - 6777</h3>
                <?php echo $pag->getMais(); ?>
          
            <span class="bb2"></span>
            <br />
        </div>
    </div>
    <div class="clearfix"></div>
    <p><?php echo $pag->getTexto(); ?></p>
    <br />
    <h2><i class="fa fa-map-o color"></i> Nosso Endereço</h2>
    <span class="bb2"></span>
    <p>
        Avenida General Carneiro, 624, Vila Lucy - 
        Sorocaba - SP
    </p>
    <br/>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.787890306967!2d-47.476786650312306!3d-23.504148284636276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58ab062a62d0f%3A0x8e057813d2cb133d!2sAnime+Games+%26+Toys!5e0!3m2!1spt-BR!2sbr!4v1460871230919" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

