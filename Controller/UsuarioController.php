<?php
 
class UsuarioController{
    
    public function Login($email, $senha){
       require_once ('./Model/Usuario.php');
       logar($email, $senha);
    }
    public function getUsuario($id_usuario){
       require_once ('./Model/Usuario.php');
       return getUsuario($id_usuario);
    }
    public function cadastrar($nome,$email,$senha,$telefone,$documento, $tipo){
        require_once ('./Model/Usuario.php');
        cadastrar($nome,$email,$senha,$telefone,$documento, $tipo);
    }
    public function verificarLogin(){
        require_once ('./Model/Usuario.php');
        testLogado();
        
    }
    public function logOut() {
        require_once  ('./Model/Usuario.php');
         sair();
    }
    public function atualizar($nome,$email,$senha,$telefone,$documento, $id) {
        editarUsu($nome,$email,$senha,$telefone,$documento, $id);
    }
    public function redefinirSenha($email,$documento){
       require_once ('./Model/Usuario.php');
       
       $user = findUserByEmail($email,$documento);

       if($user[0]['nome'] != null){      
        Alert("Sucesso!", "Sua senha é: ".$user[0]["senha"]."", "success");  
           
       }else{
            Alert("Ops!", "Error, você digitou algum campo errado!", "danger");  
       }

    }  
}

