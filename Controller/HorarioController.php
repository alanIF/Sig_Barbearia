<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorarioController
 *
 * @author admin
 */
class HorarioController {
     public function listar_disponiveis(){
        require_once './Model/Horario.php';
        return listarHorariosDisponiveis();
    }
    public function listar_reservados($id_usuario){
        require_once './Model/Horario.php';
        return listarHorariosReservados($id_usuario);
    }
    public function reservarHorario($id_horario,$id_usuario){
        require_once './Model/Horario.php';
        reservarHorario($id_horario,$id_usuario);

    }
     public function confirmarHorario($id_horario){
        require_once './Model/Horario.php';
        confirmarHorario($id_horario);

    }
    public function cancelarReservarHorario($id_horario,$id_usuario){
        require_once './Model/Horario.php';
        cancelarReservarHorario($id_horario,$id_usuario);

    }
    public function cancelarReservarHorario_estabelecimento($id_horario){
        require_once './Model/Horario.php';
        cancelarReservarHorario_estabelecimento($id_horario);

    }
    // lista os horarios marcados do usuario
    public function listar($id_usuario){
        require_once './Model/Horario.php';
        return listarHorariosMarcados($id_usuario);
    }
}
