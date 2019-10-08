<div class="box-pedido"></div>
<form class="cupom"></form>
<div class="pagamento">
    <?php foreach($pagamentos as $pagamento):?>
    <div class="pagamento-descricao">
        <p><?=$pagamento['nome']?></p>
    </div>
    <?php endforeach;?>
</div>