<?php

  require_once('../config.php') ;
  require_once (DBAPI);

  $notas = null;
  $nota = null;


/*  function index(){
    global $notas;
    $notas = find_all('notas');
  }
*/

  function index(){
    global $cursos;
    global $professores;
    global $alunos;
    global $notas;

    $cursos = find_all('curso');
    $professores = find_all('professor');
    $alunos = find_all('aluno');
    $notas = find_all('notas');
  }








  function findProfessor($id)
    {
        $retorno = find('professor', $id);
        return $retorno['nome'];
    }

     function findAluno($id)
    {
       $retorno = find('aluno', $id);
       return $retorno['nome'];
    }

    function findCurso($id)
   {
      $retorno = find('curso', $id);
      return $retorno['nome'];
   }


/**
 *  Cadastro de Alunos
*/
function add() {
  if (!empty($_POST['nota'])) {

    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $nota = $_POST['nota'];
    //$aluno['data_criacao'] = $aluno['data_criacao'] = $today->format("Y-m-d H:i:s");

    //$data = $aluno['data_nascimento'];
    //$DFm = explode("/",$data);
    //echo $DFm[2].'-'.$DFm[1].'-'.$DFm[0];


    save('notas', $nota);
    header('location: index.php');
  }
}



/**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['nota'])) {
      $nota = $_POST['nota'];
      //$customer['modified'] = $now->format("Y-m-d H:i:s");
      update('notas', $id, $nota);
      header('location: index.php');
    } else {
      global $nota;
      $nota = find('notas', $id);
    }
  } else {
    header('location: index.php');
  }
}


/**
 *  Exclusão de Aluno
 */
function delete($id = null) {
  global $customer;
  $customer = remove('notas', $id);
  header('location: index.php');
}



/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $aluno;
  $aluno = find('aluno', $id);
}




?>
