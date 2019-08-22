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
            $assunto = "SigBarber - Redefinir Senha";

            //Enviar o email
            require './library/phpmailer/class.phpmailer.php';
            require './library/phpmailer/class.smtp.php';

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //EX: smtp.meusite.com.br

            $mail->Username = 'katianesjs@gmail.com';
            $mail->Password = 'katiane123';
            $mail->Port = 587;
            $mail->SMTPAuth = true; # Usar autenticação SMTP - Sim

            $secure = 'tls';
            
            $mail->SMTPSecure = $secure;

            $mail->SMTPDebug = 2; 
            # Define o remetente (você)
            $mail->From = "katianesjs@gmail.com"; # Seu e-mail
            $mail->FromName = "SigBarber"; // Seu nome

            $mail->addAddress($email, $user[0]["nome"]); //dados de quem recebe
            $mail->isHTML(true);
            $mail->CharSet = 'utf-8';
            $mail->WordWrap = 70;
            
            $mail->Subject = 'SigBarber- Recuperar Senha';
            $mail->Body = "Você solicitou sua senha, sua senha é: ".$user[0]["senha"].""; //Email com HTML
            $mail->AltBody = 'Erro na interpretação HTML';  // Email sem HTML (por segurança)

            if ($mail->send()) {
                Alert("Sucesso!", "Email enviado com sucesso", "success");  
            } else {
                Alert("Ops!", "Error ao enviar email!".$mail->ErrorInfo." .", "danger");  
            }
            
       }else{
            Alert("Ops!", "Não existe usuário com o email informado...", "danger");  
       }

    }  
}

