<?php
           
        //CONECTAR          
        require_once './Model/connect.php';            
        require_once './Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if (isset( $_GET['id'])) {
        require_once './Controller/EstabelecimentoController.php';

         $id=(int)$_GET['id'];
        $objControl = new EstabelecimentoController();
        $objControl->excluirHorario($id);
    }else{
        
        header("Location:EST_listar.php");
        
    }

?>