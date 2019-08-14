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
    public function cadastrar($nome,$email,$senha,$telefone,$tipo){
        require_once ('./Model/Usuario.php');
        cadastrar($nome,$email,$senha,$telefone,$tipo);
    }
    public function verificarLogin(){
        require_once ('./Model/Usuario.php');
        testLogado();
        
    }
    public function logOut() {
        require_once  ('./Model/Usuario.php');
         sair();
    }
    public function atualizar($nome,$email,$senha,$telefone,$id) {
        editarUsu($nome,$email,$senha,$telefone,$id);
    }
    public function redefinirSenha($email){
       require_once ('./Model/Usuario.php');
       
       $user = findUserByEmail($email);

       if($user[0]['nome'] != null){
            Alert("Oba!", "Email enviado com sucesso!", "success");  
            //enviarEmail($user);
       }else{
            Alert("Ops!", "Não existe usuário com o email informado...", "danger");  
       }

    }  
}

