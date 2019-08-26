<?php
           
        //CONECTAR          
        require_once './Model/connect.php';            
        require_once './Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if (isset( $_GET['id'])) {
        require_once './Controller/HorarioController.php';

        $id=(int)$_GET['id'];
        $id_usuario=$_SESSION['id_usuario'];
        $objControl = new HorarioController();
        $objControl->cancelarReservarHorario_estabelecimento($id);
    }else{
        
        header("Location:home.php");
        
    }

?>