<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<h1>Dashboard</h1>
<hr />

<?php if ($db) : ?>



	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="alunos" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-users fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Alunos</p>
				</div>
			</div>
		</a>
	</div>
</div>

<div class="col-xs-6 col-sm-3 col-md-2">
	<a href="professores" class="btn btn-default">
		<div class="row">
			<div class="col-xs-12 text-center">
				<i class="fa fa-users fa-5x"></i>
			</div>
			<div class="col-xs-12 text-center">
				<p>professores</p>
			</div>
		</div>
	</a>
</div>


<div class="col-xs-6 col-sm-3 col-md-2">
	<a href="cursos" class="btn btn-default">
		<div class="row">
			<div class="col-xs-12 text-center">
				<i class="fa fa-book fa-5x"></i>
			</div>
			<div class="col-xs-12 text-center">
				<p>Cursos</p>
			</div>
		</div>
	</a>
</div>

<div class="col-xs-6 col-sm-3 col-md-2">
	<a href="notas" class="btn btn-default">
		<div class="row">
			<div class="col-xs-12 text-center">
				<i class="fa fa-bar-chart fa-5x"></i>
			</div>
			<div class="col-xs-12 text-center">
				<p>Notas</p>
			</div>
		</div>
	</a>
</div>






<div class="col-xs-6 col-sm-3 col-md-2">
	<a href="customers" class="btn btn-default">
		<div class="row">
			<div class="col-xs-12 text-center">
				<i class="fa fa-file-pdf-o fa-5x"></i>
			</div>
			<div class="col-xs-12 text-center">
				<p>Relatorios</p>
			</div>
		</div>
	</a>
</div>





</div>


<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
