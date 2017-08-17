<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Lançamento de Notas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Adicionar</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
    <th width="10%">Curso</th>
    <th width="10%">Professor</th>
    <th width="10%">Aluno</th>
    <th width="10%">Nota 1</th>
    <th width="10%">Nota 2</th>
    <th width="10%">Nota 3</th>
    <th width="10%">Nota 4</th>
    <th width="30%">Opcoes</th>


	</tr>
</thead>
<tbody>
<?php if ($notas) : ?>
<?php foreach ($notas as $nota) : ?>
	<tr>
		<td><?php echo $nota['id_notas']; ?></td>
    <td><?php echo findCurso($nota['id_curso']); ?></td>
    <td><?php echo findProfessor($nota['id_professor']); ?></td>
    <td><?php echo findAluno($nota['id_aluno']); ?></td>
    <td><?php echo $nota['nota1'] ?></td>
    <td><?php echo $nota['nota2'] ?></td>
    <td><?php echo $nota['nota3'] ?></td>
    <td><?php echo $nota['nota4'] ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $nota['id_notas']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $nota['id_notas']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal"
      data-customer="<?php echo $nota['id_notas']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>
