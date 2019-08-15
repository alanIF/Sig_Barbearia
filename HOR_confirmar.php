<?php
           
        //CONECTAR          
        require_once './Model/connect.php';            
        require_once './Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if (isset( $_GET['id'])) {
        require_once './Controller/HorarioController.php';

        $id=(int)$_GET['id'];
        $objControl = new HorarioController();
        $objControl->confirmarHorario($id);
    }else{
        
        header("Location:home.php");
        
    }

?>
