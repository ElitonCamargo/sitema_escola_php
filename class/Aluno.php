<?php
require_once 'Conexao.php';
class Aluno{
    public $id;
    public $nome;
    public $curso;
    

    public function cadastrar(){
        $cx = new Conexao();
        $cmdSql = 'CALL p_alunoCadastrar(:nome, :curso)';
        $arrayDados =[
            ':nome'=>$this->nome,
            ':curso'=>$this->curso
        ];
        return $cx->insert($cmdSql,$arrayDados);
    }

    public function deletar($id){
        $cx = new Conexao();
        $cmdSql = 'CALL p_alunoExcluirPorId(:id)';        
        return $cx->delete($cmdSql,[':id'=>$id]);
    }

    public function consultarTodos(){
        $cx = new Conexao();
        $cmdSql = 'CALL p_alunoConsultarTodos();';
        $result = $cx->select($cmdSql,[]);
        if($result->rowCount()){
            return $result->fetchAll(PDO::FETCH_CLASS, 'Aluno');
        }
        return false;
    }

}