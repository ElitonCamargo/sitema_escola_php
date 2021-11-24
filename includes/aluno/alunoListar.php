<?php
  require_once 'class/Aluno.php';
  $aluno = new Aluno();
  if(isset($_GET['excluir'])){
    $aluno->deletar($_GET['excluir']);
  }
  $listaDeAlunos = $aluno->consultarTodos();
?>
<div class="container-fluid p-1 bg-primary text-white text-center">
  <h3>Aluno</h3>
  <p>Lista de alunos</p> 
</div>

<fieldset>
    <legend>Lista de alunos</legend>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Curso</th>
                <th scope="col">Configurar</th>
            </tr>
        </thead>
        <tbody>
          <?php
            if($listaDeAlunos){
              foreach ($listaDeAlunos as $aluno) {
               print "
                <tr>
                  <th scope='row'>{$aluno->id}</th>
                  <td>{$aluno->nome}</td>
                  <td>{$aluno->curso}</td>
                  <td>
                  
                  <div class='btn-group' role='group' aria-label='Basic checkbox toggle button group'>
                    <input type='checkbox' class='btn-check' id='btncheck1' autocomplete='off'>
                    <a class='btn btn-outline-warning' for='btncheck1'>Editar</a>

                    <input type='checkbox' class='btn-check' id='btncheck2' autocomplete='off'>
                    <a class='btn btn-outline-danger' for='btncheck2' href='?".$_SERVER['QUERY_STRING']."&excluir={$aluno->id}'>Excluir</a>
                  </div>

                  </td>
                </tr>
                ";
              }
            }
          ?>               
        </tbody>
    </table>
</fieldset>