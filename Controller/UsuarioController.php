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
            $assunto = "SigBarber - Redefinir Senha";

            //Enviar o email
            require './library/phpmailer/class.phpmailer.php';
            require './library/phpmailer/class.smtp.php';

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //EX: smtp.meusite.com.br
            $mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
            $mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
            $mail->Username = 'emanoel.ifrn@gmail.com';
            $mail->Password = 'suasenha';
            $mail->Port = 587;

            # Define o remetente (você)
            $mail->From = "emanoel.ifrn@gmail.com"; # Seu e-mail
            $mail->FromName = "Nome do Remetente"; // Seu nome

            $mail->addAddress('emanoel.dantas@imd.ufrn.br', 'Emanoel'); //dados de quem recebe
            $mail->isHTML(true);
            $mail->CharSet = 'utf-8';

            $mail->Subject = 'SigCQ - Recuperar Senha';
            $mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>! :)"; //Email com HTML
            $mail->AltBody = 'Erro na interpretação HTML';  // Email sem HTML (por segurança)

            if ($mail->send()) {
                echo 'Email enviado!!';
            } else {
                echo 'Deu errado..' . $mail->ErrorInfo;
            }
            
       }else{
            Alert("Ops!", "Não existe usuário com o email informado...", "danger");  
       }

    }  
}

