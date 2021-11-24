<?php
require_once 'Conexao.php';
class Curso{
    public $id;
    public $nome;

    public function cadastrar(){
        $cx = new Conexao();
        $cmdSql = 'CALL p_cursoCadastrar(:nome)';
        return $cx->insert($cmdSql,[':nome'=>$this->nome]);
    }

    public function listar(){
        $cx = new Conexao();
        $cmdSql = 'CALL p_cursoListar()';
        $result = $cx->select($cmdSql,[]);
        if($result->rowCount()){
            return $result->fetchAll(PDO::FETCH_CLASS, 'Curso');
        }
        return false;
    }
}