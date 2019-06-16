<div class="welcome">
	<h1>Welcome</h1>
</div>
<div class="product-list">
	<?php foreach($produto as $dados):?>
		<a href="./produto/ver/<?=$dados['idproduto']?>">
		<div class="product">
			<img src="<?=$dados['imagem']?>" style="height: 60px; width:auto;">
			<p style="color:#000;"><?=$dados['nomeproduto']?></p>
			<p style="color:#000;">R$ <?=$dados['preco']?></p>
		</div>
	</a>
	<?php endforeach;?>
</div>
<div class="about">
	<h1>Sobre</h1>
	<h4>Nossa História</h4>
	<p>Electronic's ST é uma Loja de eletrônicos online que dita tendências ao 
	oferecer produtos de primeira qualidade e atendimento ao consumidor no 
	conforto de sua casa. Nosso negócio é focado na inovação e orientado a 
	constantemente atualizar e melhorar a experiência de compras online.</p>
</div>
<div class="politics">
	<h1>Políticas da Loja</h1>
	<h4>Atendimento em primeiro lugar</h4>
	<p>Na Electronic's ST, queremos oferecer aos clientes a experiência de compra 
	mais agradável possível. Essa experiência fará com que eles sempre volte à nossa 
	loja. Por isso, acreditamos que nossas políticas devem ser justas, claras e 
	transparentes. Não foi possível encontrar as informações que você está procurando? 
	Não hesite em entrar em contato.</p>
</div>
<div class="contact">
	<div class="informations">
		<h1>Entre em contato</h1>
		<h3>Av. João Olímpio de Oliveira, 1561 | Vila Asem | Itapetininga/SP CEP 18202-000</h3>
		<h3>electronicsst@gmail.com</h3>
		<h3>Tel: (15) 3376-9930</h3>
	</div>
	<form action="" method="POST">
	   	<input type="text" name="nome" placeholder="Nome">
	   	<input type="email" name="email" placeholder="E-mail">
	   	<input type="text" name="assunto" placeholder="Assunto">
	   	<textarea name="mensagem" placeholder="Mensagem"></textarea>
	   	<button type="submit">Enviar</button>
	</form>
</div>
<div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3010408302225!2d-48.023378984406136!3d-23.593534168667677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc0aa577fd79%3A0x94275cc265f55968!2sAv.+Jo%C3%A3o+Ol%C3%ADmpio+de+Oliveira+-+Vila+Asem%2C+Itapetininga+-+SP!5e0!3m2!1spt-BR!2sbr!4v1543014894277" 
	width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>