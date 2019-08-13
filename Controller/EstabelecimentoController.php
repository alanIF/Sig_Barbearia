<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstabelecimentoControllerr
 *
 * @author admin
 */
class EstabelecimentoController {
    // lista os horários do estabelecimento do usuario
    public function listar($id_usuario){
        require_once './Model/Estabelecimento.php';
        return listarHorarios($id_usuario);
    }
   
    public function getEstabelecimento($id_usuario){
        require_once './Model/Estabelecimento.php';
        return getEstabelecimento($id_usuario);

    }
     public function getHorario($id,$id_usuario){
        require_once './Model/Estabelecimento.php';
        return getHorario($id,$id_usuario);

    }
    public function cadastrar($data,$horario,$id_estabelecimento){
        require_once './Model/Estabelecimento.php';
        cadastrarHorario($data,$horario,$id_estabelecimento);
    }
    public function atualizar($data,$horario,$id){
        require_once './Model/Estabelecimento.php';
        atualizarHorario($data,$horario,$id);
    }
     public function excluirHorario($id){
        require ('./Model/Estabelecimento.php');
        excluirHorario($id);
        
        
    }
}
