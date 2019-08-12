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
}
