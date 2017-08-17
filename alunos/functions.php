<?php

  require_once('../config.php') ;
  require_once (DBAPI);

  $alunos = null;
  $aluno = null;


  function index(){
    global $alunos;
    $alunos = find_all('aluno');
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
  if (!empty($_POST['aluno'])) {

    $today =
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $aluno = $_POST['aluno'];
    $aluno['data_criacao'] = $aluno['data_criacao'] = $today->format("Y-m-d H:i:s");

    //$data = $aluno['data_nascimento'];
    //$DFm = explode("/",$data);
    //echo $DFm[2].'-'.$DFm[1].'-'.$DFm[0];



    save('aluno', $aluno);
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
    if (isset($_POST['aluno'])) {
      $aluno = $_POST['aluno'];
      //$customer['modified'] = $now->format("Y-m-d H:i:s");
      update('aluno', $id, $aluno);
      header('location: index.php');
    } else {
      global $aluno;
      $aluno = find('aluno', $id);
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
  $customer = remove('aluno', $id);
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
