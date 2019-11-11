<p align="center" class="div-p">Usuários no Sistema</p>
<div class="table-dados">
	<div class="indice-tabela">
		<p class="title-table"><a href="usuario/index/nome">Nome</a></p>
		<p class="title-table"><a href="usuario/index/email">Email</a></p>
		<p class="title-table"><a href="usuario/index/cpf">CPF</a></p>
		<p class="data-manipulation">Manipulação<p>
	</div>
	
	<?php foreach ($usuarios as $usuario):
		// if (acessoPegarUsuarioLogado() == $usuario['idUsuario']){
		// 	continue;
		// }
		?>
		<div class="registro">
			<p class="data-table">
				<?php if ($usuario['tipo'] == 'admin') :?>
				(Adm)
				<?php endif;?>
				<?= $usuario['nome'] ?>
			</p>
			<p class="data-table"><?= $usuario['email'] ?></p>
			<p class="data-table"><?= $usuario['cpf'] ?></p>
			<div class="manipulacao">
				<p class="data-operational-table"><a href="usuario/visualizar/<?= $usuario['idUsuario'] ?>">Visualizar</a></p>
				<p class="data-operational-table"><a href="usuario/editar/<?= $usuario['idUsuario'] ?>">Alterar</a></p>
				<p class="data-operational-table"><a href="usuario/deletar/<?= $usuario['idUsuario'] ?>">Deletar</a></p>
				<?php if ($usuario['tipo'] != 'admin') :?>
					<p class="data-operational-table"><a href="usuario/adm/<?=$usuario['idUsuario']?>">Promover</a></p>
				<?php endif;?>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<a href="usuario/adicionar"><p align="center">Adicionar</p></a>

<br>

<a href="usuario/upload"><p align="center">Adicionar Lista de Usuários</p></a>