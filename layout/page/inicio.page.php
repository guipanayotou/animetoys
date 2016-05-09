<!-- Conteudo da página inicial -->
<section>
    <h1><?php echo $pag->getTitulo(); ?></h1>
    <?php if (isset($_GET['pontos'])): ?> 
        <div>
            <p>Você possui <?php echo $_GET['pontos']; ?> pontos.</p>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
        <div>
            <p class="color">Ops, não foi encontrado ninguém com esse E-Mail...</p>
        </div>
    <?php endif; ?>
    <br />
    <?php echo $pag->getTexto(); ?>


    <div id="cp_widget_2f3a8403-2d69-46b2-866e-9018c569e73f">...</div><script type="text/javascript">
        var cpo = [];
        cpo["_object"] = "cp_widget_2f3a8403-2d69-46b2-866e-9018c569e73f";
        cpo["_fid"] = "AYIAMcdKWW2C";
        var _cpmp = _cpmp || [];
        _cpmp.push(cpo);
        (function () {
            var cp = document.createElement("script");
            cp.type = "text/javascript";
            cp.async = true;
            cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";
            var c = document.getElementsByTagName("script")[0];
            c.parentNode.insertBefore(cp, c);
        })();</script><noscript>Powered by Cincopa <a href='http://www.cincopa.com/video-hosting'>Video Hosting Platform</a> for Business solution.<span>slider_anime</span><span>fotos produtos anime toys</span><span>Magic TCG</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 500</span><span>height</span><span> 500</span><span>Pokémon TCG</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 588</span><span>height</span><span> 331</span><span>Magic TCG</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 450</span><span>height</span><span> 410</span><span>Pokémon TCG</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 563</span><span>height</span><span> 353</span><span>Mangás</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>height</span><span> 535</span><span>width</span><span> 720</span><span>orientation</span><span> 1</span><span>camerasoftware</span><span> Adobe Photoshop CS3 </span><span>Quadrinhos</span><span>originaldate</span><span> 1/1/0001 6:00:00 AM</span><span>width</span><span> 580</span><span>height</span><span> 350</span></noscript>

    <div>
        <h4>Digite seu E-mail para ver seus pontos de fidelidade:</h4><br />
        <form method="post">
            <input name="email" required="" type="email" placeholder="Digite seu E-Mail" /><br />
            <br /> 
            <button type="submit" name="submit"><i class="fa fa-star-o" ></i> Ver Pontos</button>
        </form>
        <br />
    </div>



</section>

