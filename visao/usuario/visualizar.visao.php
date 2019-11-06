<div>
	<div class="">
		<p><strong>Nome:</strong> <?= $usuario['nome'] ?> <?= $usuario['sobrenome'] ?></p>
		<p><strong>Email:</strong> <?= $usuario['email'] ?></p>
	</div>
	<p><strong>CPF:</strong> <?= $usuario['cpf'] ?></p>
	<p><strong>Data de Nascimento:</strong> <?= $usuario['nascimento'] ?></p>
	<p><strong>Sexo:</strong> <?= $usuario['sexo'] ?></p>
	<?php if ($usuario['tipo'] == 'admin'):?>
		<p><strong>Tipo de Usuário:</strong> <?= $usuario['tipo'] ?></p>
	<?php endif;?>

</div>

<?php if ($usuario['tipo'] == 'admin'):?>
<a href="cupom/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Cupons</a>
<a href="FormaPagamento/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Pagamentos</a>
<a href="produto/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Produtos</a>
<a href="categoria/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Categorias</a>
<a href="marca/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Marcas</a>
<a href="endereco/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Endereços</a>
<?php endif;?>

<br>

<table class="table" border="1">
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

<a href="endereco/adicionar/<?= $usuario['idUsuario'] ?>" class="btn btn-primary" style="color:black; text-decoration: underline;">Adicionar Endereço</a>

<?php if (acessoPegarPapelDoUsuario() == 'admin'):?>
	<a href="usuario/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br>Voltar</a>
<?php endif;?>