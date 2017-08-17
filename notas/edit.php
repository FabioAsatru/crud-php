<?php
  require_once('functions.php');

  index();
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Curso</h2>

<form action="edit.php?id=<?php echo $nota['id_notas']; ?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">

    <div class="form-group col-md-6 ">
    <label for="campo3">Aluno</label>

    <select class="form-control" name="nota['id_aluno']" disabled >
    <?php if ($alunos) : ?>
    <?php foreach ($alunos as $aluno) : ?>
      <option value=<?php echo $aluno['id_aluno'] ?>>
            <?php echo $aluno['nome'] ?>
      </option>
    <?php endforeach; ?>
    <?php else : ?>
      <option value="0">Sem cursos</option>
    <?php endif; ?>
    <select>
    </div>

    <div class="form-group col-md-4 ">
    <label for="campo3">Curso</label>
    <select class="form-control" name="nota['id_curso']" disabled>
    <?php if ($cursos) : ?>
    <?php foreach ($cursos as $curso) : ?>
      <option value=<?php echo $curso['id_curso'] ?>>
            <?php echo $curso['nome'] ?>
      </option>
    <?php endforeach; ?>
    <?php else : ?>
      <option value="0">Sem cursos</option>
    <?php endif; ?>
    <select>
    </div>

    <div class="form-group col-md-7 ">
    <label for="campo3">Professor</label>
    <select class="form-control" name="nota['id_professor']" disabled>
    <?php if ($professores) : ?>
    <?php foreach ($professores as $professor) : ?>
      <option value=<?php echo $professor['id_professor'] ?>>
            <?php echo $professor['nome'] ?>
      </option>
    <?php endforeach; ?>
    <?php else : ?>
      <option value="0">Sem cursos</option>
    <?php endif; ?>
    <select>
    </div>






    <!--
    <div class="form-group col-md-7">
      <label for="name">professor</label>
      <input type="text" id="nome" class="form-control" name="nota['id_professor']">
    </div>
    <div class="form-group col-md-7">
      <label for="name">aluno</label>
      <input type="text" id="notas" class="form-control" name="nota['id_aluno']">
    </div>
    <div class="form-group col-md-7">
      <label for="name">curso</label>
      <input type="text" id="curso" class="form-control" name="nota['id_curso']">
    </div>-->
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="name">nota 1</label>
      <input type="text" id="nome" class="form-control" name="nota['nota1']" value="<?php echo $nota['nota1']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="name">nota 2</label>
      <input type="text" id="notas" class="form-control" name="nota['nota2']" value="<?php echo $nota['nota2']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="name">nota 3</label>
      <input type="text" id="curso" class="form-control" name="nota['nota3']" value="<?php echo $nota['nota3']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="name">nota 4</label>
      <input type="text" id="curso" class="form-control" name="nota['nota4']" value="<?php echo $nota['nota4']; ?>">
    </div>

  </div>


  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
