<?php
	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Aluno: <?php echo $aluno['nome']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">

	<dt>rua:</dt>
	<dd><?php echo $aluno['logradouro']; ?></dd>

	<dt>Numero:</dt>
	<dd><?php echo $aluno['numero']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Bairro:</dt>
	<dd><?php echo $aluno['bairro']; ?></dd>

	<dt>Cidade:</dt>
	<dd><?php echo $aluno['cidade']; ?></dd>

	<dt>Estado:</dt>
	<dd><?php echo $aluno['estado'];  ?></dd>

	<dt>Data de Cadastro:</dt>
	<dd><?php echo $aluno['data_criacao']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $aluno['id_aluno']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
