<?php

  require_once('../config.php') ;
  require_once (DBAPI);

  $cursos = null;
  $curso = null;

  $professores = null;
  $professor = null;



  function index(){
    global $cursos;
    global $professores;

    $cursos = find_all('curso');
    $professores = find_all('professor');
  }


   function findCurso($id)
  {
      $retorno = find('curso', $id);
      return $retorno['nome'];
  }




/**
 *  Cadastro de professores
*/
function add() {
  if (!empty($_POST['professor'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $professor = $_POST['professor'];
    //$professor['data_criacao'] = $aluno['data_criacao'] = $today->format("Y-m-d H:i:s");

    save('professor', $professor);
    header('location: index.php');
  }
}


/**
 *	Atualizacao/Edicao do professor
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['professor'])) {
      $professor = $_POST['professor'];
      //$customer['modified'] = $now->format("Y-m-d H:i:s");
      update('professor', $id, $professor);
      header('location: index.php');
    } else {
      global $professor;
      $professor = find('professor', $id);
      //echo $aluno['nome'];
    }
  } else {
    header('location: index.php');
  }
}


/**
 *  Exclusão de professor
 */
function delete($id = null) {
  global $customer;
  $customer = remove('professor', $id);
  header('location: index.php');
}




/**
 *  Visualização prof
 */
function view($id = null) {
  global $professor;
  $professor = find('professor', $id);
}


?>
