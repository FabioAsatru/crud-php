<?php

  require_once('../config.php') ;
  require_once (DBAPI);

  $cursos = null;
  $curso = null;


  function index(){
    global $cursos;
    $cursos = find_all('curso');
  }


/**
 *  Cadastro de Curso
*/
function add() {
  if (!empty($_POST['curso'])) {

    /*$today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    */
    $curso = $_POST['curso'];
    //$aluno['data_criacao'] = $aluno['data_criacao'] = $today->format("Y-m-d H:i:s");

    save('curso', $curso);
    header('location: index.php');
  }
}


/**
 *	Atualizacao/Edicao do curso
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['curso'])) {
      $curso = $_POST['curso'];
      //$customer['modified'] = $now->format("Y-m-d H:i:s");
      update('curso', $id, $curso);
      header('location: index.php');
    } else {
      global $curso;
      $curso = find('curso', $id);
      //echo $aluno['nome'];
    }
  } else {
    header('location: index.php');
  }
}


/**
 *  Exclusão de curso
 */
function delete($id = null) {
  global $curso;
  $curso = remove('curso', $id);
  header('location: index.php');
}


/**
 *  Visualização curso
 */
function view($id = null) {
  global $curso;
  $curso = find('notas', $id);
}









?>
