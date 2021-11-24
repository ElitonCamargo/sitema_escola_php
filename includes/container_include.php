<div class="container">    
    <?php
        if(isset($_GET['curso']))
        {
            require_once 'curso/curso.php';
        }
        elseif(isset($_GET['aluno'])){
            $aluno = $_GET['aluno'];
            if($aluno=='cadastrar'){
                require_once 'aluno/alunoCadastrar.php';
            }
            elseif($aluno=='listar'){
                require_once 'aluno/alunoListar.php';
            }
            else{
                require_once 'aluno/alunoListar.php';
            }
        }
    ?>
</div>