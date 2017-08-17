<?php
  require_once('functions.php');
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Aluno</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text" id="nome" class="form-control" name="aluno['nome']">
    </div>


    <div class="form-group col-md-2">
      <label for="campo3">CEP</label>
      <input type="text" id="cep" class="form-control" name="aluno['cep']">
    </div>



    <div class="form-group col-md-2">
      <label for="campo3">Data de Nascimento</label>
      <input type="date" class="form-control" name="aluno['data_nascimento']" >
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">logradouro</label>
      <input type="text" id="rua" class="form-control" name="aluno['logradouro']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" id="bairro" class="form-control" name="aluno['bairro']">
    </div>


    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="aluno['data_criacao']" disabled>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Cidade</label>
      <input type="text" id="cidade" class="form-control" name="aluno['cidade']">
    </div>

    <div class="row">
      <div class="form-group col-md-3">
        <label for="campo1">Numero</label>
        <input type="text" id="cidade" class="form-control" name="aluno['numero']">
      </div>


    <div class="form-group col-md-1">
      <label for="campo3">Estado</label>
      <input type="text" id="uf" class="form-control" name="aluno['estado']">
    </div>


  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>


<script type="text/javascript" >


       $(document).ready(function() {


           function limpa_formulário_cep() {
               // Limpa valores do formulário de cep.
               $("#rua").val("");
               $("#bairro").val("");
               $("#cidade").val("");
               $("#uf").val("");
               $("#ibge").val("");
           }

           //Quando o campo cep perde o foco.
           $("#cep").blur(function() {

               //Nova variável "cep" somente com dígitos.
               var cep = $(this).val().replace(/\D/g, '');

               //Verifica se campo cep possui valor informado.
               if (cep != "") {

                   //Expressão regular para validar o CEP.
                   var validacep = /^[0-9]{8}$/;

                   //Valida o formato do CEP.
                   if(validacep.test(cep)) {

                       //Preenche os campos com "..." enquanto consulta webservice.
                       $("#rua").val("...");
                       $("#bairro").val("...");
                       $("#cidade").val("...");
                       $("#uf").val("...");
                       $("#ibge").val("...");

                       //Consulta o webservice viacep.com.br/
                       $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                           if (!("erro" in dados)) {
                               //Atualiza os campos com os valores da consulta.
                               $("#rua").val(dados.logradouro);
                               $("#bairro").val(dados.bairro);
                               $("#cidade").val(dados.localidade);
                               $("#uf").val(dados.uf);
                               $("#ibge").val(dados.ibge);
                           } //end if.
                           else {
                               //CEP pesquisado não foi encontrado.
                               limpa_formulário_cep();
                               alert("CEP não encontrado.");
                           }
                       });
                   } //end if.
                   else {
                       //cep é inválido.
                       limpa_formulário_cep();
                       alert("Formato de CEP inválido.");
                   }
               } //end if.
               else {
                   //cep sem valor, limpa formulário.
                   limpa_formulário_cep();
               }
           });
       });

   </script>
