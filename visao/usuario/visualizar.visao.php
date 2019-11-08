<div class="perfil">
	<div class="div-perfil">
		<img src="" class="perfil-usuario">
		<p><strong><?= $usuario['nome'] ?> <?= $usuario['sobrenome'] ?></strong></p>
		<p><strong><?= $usuario['email'] ?></strong></p>
		<?php if ($usuario['tipo'] == 'admin'): ?>
			<p>Administrador</p>
		<?php endif; ?>
	</div>

	<div class="div-informacoes">
		<p>CPF: <?= $usuario['cpf'] ?></p>
		<p>Data de Nascimento: <?= $usuario['nascimento'] ?></p>
		<p>Sexo: <?= $usuario['sexo'] ?></p>
		<div class="">
			<a href="pedido/meusPedidos/<?= $usuario['idUsuario'] ?>">Meus Pedidos</a>
			<a href="usuario/editar/<?= $usuario['idUsuario'] ?>">Alterar informações</a>
		</div>
	</div>


	<?php if ($usuario['tipo'] == 'admin'):?>
		<a href="cupom/" class="">Cupons</a>
		<a href="FormaPagamento/" class="">Pagamentos</a>
		<a href="produto/" class="">Produtos</a>
		<a href="categoria/" class="">Categorias</a>
		<a href="marca/" class="">Marcas</a>
		<a href="endereco/" class="">Endereços</a>
	<?php endif;?>

	<table class="table">
		<thead>
			<tr>
				<th>Logradouro</th>
				<th>Número</th>
				<th>Complemento</th>
				<th>Bairro</th>
				<th>Cidade</th>
				<th>CEP</th>
				<th>Ver Detalhes</th>
				<th>Alterar</th>
				<th>Deletar o Endereço</th>
			</tr>
		</thead>
		<?php foreach ($enderecos as $endereco): ?>
			<tr>
				<td><?= $endereco['logradouro'] ?></td>
				<td><?= $endereco['numero'] ?></td>
				<td><?= $endereco['complemento'] ?></td>
				<td><?= $endereco['bairro'] ?></td>
				<td><?= $endereco['cidade'] ?></td>
				<td><?= $endereco['cep'] ?></td>
				<td><a href="endereco/visualizar/<?= $endereco['idEndereco'] ?>">Ver</a></td>
				<td><a href="endereco/editar/<?= $endereco['idUsuario'] ?>/<?= $endereco['idEndereco'] ?>">Alterar</a></td>
				<td><a href="endereco/deletar/<?= $endereco['idEndereco'] ?>">Deletar</a></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<a href="endereco/adicionar/<?= $usuario['idUsuario'] ?>" class="">Adicionar Endereço</a>

	<?php if (acessoPegarPapelDoUsuario() == 'admin'):?>
		<a href="usuario/" class="">Voltar</a>
	<?php endif;?>
</div>