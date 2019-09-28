<h2>Ver detalhes do usuario</h2>
<p><strong>Nome:</strong> <?= $usuario['nome'] ?> <?= $usuario['sobrenome'] ?></p>
<p><strong>Email:</strong> <?= $usuario['email'] ?></p>
<p><strong>CPF:</strong> <?= $usuario['cpf'] ?></p>
<p><strong>Data de Nascimento:</strong> <?= $usuario['nascimento'] ?></p>
<p><strong>Sexo:</strong> <?= $usuario['sexo'] ?></p>
<p><strong>Tipo de Usuário:</strong> <?= $usuario['tipo'] ?></p>

<br><br>

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
			<td><a href="endereco/visualizar/<?= $endereco['idendereco'] ?>">Ver</a></td>
			<td><a href="endereco/editar/<?= $endereco['idusuario'] ?>/<?= $endereco['idendereco'] ?>">Alterar</a></td>
			<td><a href="endereco/deletar/<?= $endereco['idendereco'] ?>">Deletar</a></td>
		</tr>
	<?php endforeach; ?>
</table>

<a href="endereco/adicionar/<?= $usuario['idusuario'] ?>" class="btn btn-primary" style="color:black; text-decoration: underline;">Adicionar Endereço</a><br>

<?php if (acessoPegarPapelDoUsuario() == 'admin'):?>
	<a href="usuario/" class="btn btn-primary" style="color:black; text-decoration: underline;"><br><br>Voltar</a>
<?php endif;?>