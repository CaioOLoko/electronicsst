<?php foreach ($marcas as $marca):?>
<div>
    <p>Id: <?=$marca['idMarca']?></p><br>
    <p>Nome: <?=$marca['nome']?></p>
    <a href="marca/visualizar/<?=$marca['idMarca']?>">Detalhes</a>
    <a href="marca/editar/<?=$marca['idMarca']?>">Editar</a>
    <a href="marca/deletar/<?=$marca['idMarca']?>">Remover</a>
</div>
<?php endforeach;?>
<a href="marca/adicionar">Cadastrar Marca</a>