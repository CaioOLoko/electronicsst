<!--
<div class="welcome">
    <figure>
        <img src="publico/img/slider/1.jpg">
        <img src="publico/img/slider/2.jpg">
        <img src="publico/img/slider/1.jpg">
    </figure>
</div>
-->

<div class="product-list">
    <?php foreach ($produto as $dados): ?>
        <a href="produto/ver/<?= $dados['idproduto'] ?>" class="product-link">
            <div class="product">
                <img src="<?= $dados['imagem'] ?>" class="img-produto-inicial">
                <p class="description-img-inicial"><?= $dados['nomeproduto'] ?></p>
                <p class="description-img-inicial">R$ <?= $dados['preco'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<div class="about">
    <img src="publico/img/index/smartphone.jpg" style="width: 100%;">
    <div class="content">
        <h1 class="about-title">Sobre</h1>
        <h4 class="about-title">Nossa História</h4>
        <p>Electronic's ST é uma Loja de eletrônicos online que dita tendências ao oferecer produtos de primeira qualidade e atendimento ao consumidor no conforto de sua casa. Nosso negócio é focado na inovação e orientado a constantemente atualizar e melhorar a experiência de compras online.</p>
    </div>
</div>

<div class="politics">
    <div class="imagem">
        <img style="width: 100%; height: auto;" src="publico/img/index/smartphone_2.jpg">
    </div>
    <div class="text-politic">
        <h1 class="politic-title">Políticas da Loja</h1>
        <h4 class="politic-title">Atendimento em primeiro lugar</h4>
        <p>Na Electronic's ST, queremos oferecer aos clientes a experiência de compra mais agradável possível. Essa experiência fará com que eles sempre volte à nossa loja. Por isso, acreditamos que nossas políticas devem ser justas, claras e transparentes. Não foi possível encontrar as informações que você está procurando? Não hesite em entrar em contato.</p>
    </div>
</div>

<div class="contact">
    <div class="div_contact">	
        <div class="contato">
            <h1 class="tit_cont">Entre em contato</h1>
            <p class="p_cont">Av. João Olímpio de Oliveira, 1561 | Vila Asem |<br> Itapetininga/SP CEP 18202-000</p>
            <p class="p_cont">electronicsst@gmail.com</p>
            <p class="p_cont">Tel: (15) 3376-9930</p>
        </div>
        <div class="contact-formulario">
            <form action="paginas/contato" method="POST" class="form_a">
                <input class="formul" type="text" name="nome" placeholder="Nome">
                <input class="formul" type="email" name="email" placeholder="E-mail">
                <input class="formul" type="text" name="assunto" placeholder="Assunto">
                <textarea class="message" rows="5" name="mensagem"  placeholder="Mensagem"></textarea>
                <button type="submit" class="submit-contact">Enviar</button>
            </form>
        </div>
    </div>
    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3010408302225!2d-48.023378984406136!3d-23.593534168667677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc0aa577fd79%3A0x94275cc265f55968!2sAv.+Jo%C3%A3o+Ol%C3%ADmpio+de+Oliveira+-+Vila+Asem%2C+Itapetininga+-+SP!5e0!3m2!1spt-BR!2sbr!4v1543014894277" 
                width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>