<?php foreach ($pedidos as $pedido):?>
<div>
    <p>Id: <?=$pedido['idPedido']?></p><br>
    <p>Usuario: <?=$pedido['idUsuario']?></p><br>
    <p>Pagamento: <?=$pedido['idFormaPagamento']?></p><br>
    <p>Data: <?=$pedido['dataCompra']?></p>
</div>
<?php endforeach;?>