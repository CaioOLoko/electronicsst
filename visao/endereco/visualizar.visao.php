<h2>Ver detalhes do endereço</h2>
<p><strong>Logradouro:</strong> <?= $endereco['logradouro'] ?></p>
<p><strong>Número:</strong> <?= $endereco['numero'] ?></p>
<p><strong>Complemento:</strong> <?= $endereco['complemento'] ?></p>
<p><strong>Bairro:</strong> <?= $endereco['bairro'] ?></p>
<p><strong>Cidade:</strong> <?= $endereco['cidade'] ?></p>
<p><strong>CEP:</strong> <?= $endereco['cep'] ?></p>

<a href="cliente/ver/<?=$endereco['idusuario']?>" class="btn btn-primary" style="color:black; text-decoration: underline;"><br><br>Voltar</a>

