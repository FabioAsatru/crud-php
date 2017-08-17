<?php
  require_once('functions.php');
  add();
  index();
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo professor</h2>

<form action="edit.php?id=<?php echo $professor['id_professor']; ?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" id="nome" class="form-control" name="professor['nome']" value="<?php echo $professor['nome']; ?>" >
    </div>

    <div class="form-group col-md-2">
    <label for="campo3">Curso</label>
    <select class="form-control" name="professor[id_curso]" value="<?php echo $professor['id_curso']; ?>">
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

    <div class="form-group col-md-4">
      <label for="campo3">Data de Nascimento</label>
      <input type="date" class="form-control" name="professor['data_nascimento']" value="<?php echo $professor['data_nascimento']; ?>" >
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
