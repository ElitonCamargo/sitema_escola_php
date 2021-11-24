<?php
    require_once 'class/Curso.php';
    $curso = new Curso();
    if(isset($_POST['txtNomeCurso'])){
        $curso->nome = $_POST['txtNomeCurso'];
        $curso->cadastrar();
    }

    $listaDeCurso = $curso->listar();
?>
<div class="container-fluid p-1 bg-primary text-white text-center">
    <h3>Dados do curso</h3>
</div>

<form method="POST">
    <fieldset>
        <legend>Cadastro de curso</legend>
        <div class="mb-3">
            <label for="nomeCurso" class="form-label">Nome do curso</label>
            <input type="text" class="form-control" id="nomeCurso" name="txtNomeCurso">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </fieldset>
</form>
<hr>
<fieldset>
    <legend>Lista de cursos</legend>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($listaDeCurso){
                    foreach ($listaDeCurso as $c) {
                        echo '
                        <tr>
                            <th scope="row">'.$c->id.'</th>
                            <td>'.$c->nome.'</td>
                        </tr>                        
                        ';
                    }
                }
            ?>            
        </tbody>
    </table>
</fieldset>