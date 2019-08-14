<?php
function logar($email, $senha) {
    $conn = F_conect();
    session_name('SESSAO_PHP');

    session_start();
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='" . $email . "' AND senha='" . $senha . "'");
    if (mysqli_num_rows($result) == 1) {
        // teste - certo

        while ($row = $result->fetch_assoc()) {
            $id_usuario = $row["id"];
            $tipo=$row['tipo'];
            $nome=$row['nome'];
        }
        //fim teste
        $_SESSION['nome']=$nome;
        $_SESSION['usuario'] = $email;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['tipo']=$tipo;
        $_SESSION['ativo'] = true;
       
     
       header('Location:./home.php');

        
    } else if (mysqli_num_rows($result) != 1) {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    } else {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    }
}

function sair() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_name('SESSAO_PHP');
        session_start();
    }
    
          $_SESSION = array();
          if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }
            session_destroy();
            header('Location: ./index.php');
    
    Alert("Ops!", "Erro ao sair do sistema, procure o suporte!", "danger");
}

function testLogado() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_name('SESSAO_PHP');
        session_start();
    }
    if (isset($_SESSION['usuario']) == false) {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: ./index.php');
    }
}

function cadastrar($nome,$email,$senha,$telefone,$tipo) {
    $conn = F_conect();
    $sql = "INSERT INTO usuario(nome, email, senha,telefone,tipo)
            VALUES('" . $nome . "','" . $email . "','" . $senha . "', '".$telefone."','".$tipo."' )";
    if ($conn->query($sql) == TRUE) {
        Alert("Sucesso!", "Usuário cadastrado com sucesso", "success");
        echo "<a href='./index.php'> Voltar a tela de login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function getUsuario($id_usuario){
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from usuario where id='".$id_usuario."'");
    $i = 0;
    $usuario = array();
    if (mysqli_num_rows($result) >=1){
        while ($row = $result->fetch_assoc()) {
            $nome=$row['nome'];
            $email=$row['email'];
            $senha=$row['senha'];
            $telefone=$row['telefone'];                 
            }

                      }else{

                         

                          echo "<script language= 'JavaScript'>

                                        location.href='erro.php'

                                </script>";

                      }

            $conn->close();
            $usuario[$i]["nome"]=$nome;
            $usuario[$i]["email"]=$email;
            $usuario[$i]["senha"]=$senha;
            $usuario[$i]["telefone"]=$telefone;
            return $usuario;

}
function editarUsu($nome,$email,$senha,$telefone,$id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', senha='" .
            $senha . "', telefone='".$telefone."' WHERE id= " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
        $_SESSION['usuario'] = $email;
        $_SESSION['nome'] = $nome;
        
        $_SESSION['id_usuario'] = $id;
        $_SESSION['ativo'] = true;
        
        echo "<a href='home.php'> Voltar a tela de inicial</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirUsu($id) {

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE id=" . $id;

    $conn->query($sql);

    $conn->close();
}

function findUserByEmail($email) {
    $conn = F_conect();
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='".$email."'");
    $i = 0;
    $usuario = array();
    if (mysqli_num_rows($result) >=1){
        while ($row = $result->fetch_assoc()) {
            $nome=$row['nome'];
            $email=$row['email'];
            $senha=$row['senha'];
            $telefone=$row['telefone'];                 
        }
    }

    $conn->close();
    $usuario[$i]["nome"]=$nome;
    $usuario[$i]["email"]=$email;
    $usuario[$i]["senha"]=$senha;
    $usuario[$i]["telefone"]=$telefone;
    return $usuario;

}

// Função que envia email
function enviarEmail($emailsender, $nome, $emaildestinatario, $assunto, $motivo, $mensagemRec, $resposta, $assinatura, $comcopia, $comcopiaoculta) {
    try {
        if (PATH_SEPARATOR == ";") {
            $quebra_linha = "\r\n"; //Se for Windows
        } else {
            $quebra_linha = "\n"; //Se "não for Windows"
        }
        // Leitura das variaveis do email
        $nome = strtoupper($nome);

        $mensagem = "<p><b> OL&Aacute; " . $nome . ', SEGUE ABAIXO O RETORNO DO CONTATO ENVIADO NO NOSSO SITE.</b></p>';
        $mensagem .= "<p style='color:gray;'> <b>MENSAGEM RECEBIDA:</b> <br /> Motivo: {$motivo}<br /> " . nl2br($mensagemRec) . "</p><br />";
        $mensagem .= "<p style='color:black;'><b>SEGUE A RESPOSTA PARA O SEU CONTATO: </b><br />" . nl2br($resposta) . "</p>";
        // Montagem da mensagem em um formato HTML
        $mensagemHTML = "<font style='font-size:16px;'><p> <font style='color: red;'>
                <i>Esse &eacute; um email autom&aacute;tico em resposta ao contato nos foi feito.</i></font></P>
                {$mensagem}
        <hr>
        <p>{$assinatura}</font>";
        // Montagem do cabeçalho do email
        $headers = "MIME-Version: 1.1" . $quebra_linha;
        $headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha;
        $headers .= "From: " . $emailsender . $quebra_linha;
        $headers .= "Cc: " . $comcopia . $quebra_linha;
        $headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
        $headers .= "Reply-To: " . $emailremetente . $quebra_linha;
        // Condição para verificar se o email nao foi enviado
        if (!mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r" . $emailsender)) {
            // Se o email nao foi enviado, alterasse a forma de envio
            $headers .= "Return-Path: " . $emailsender . $quebra_linha;
            // Condição que verifica ee novamente o email nao foi enviado
            if (!mail($emaildestinatario, $assunto, $mensagemHTML, $headers)) {
                // Se nao for enviado, exibe a mensagem de erro
                return false;
            } else {
                return true;
            }
        }
    } catch (Exception $exc) { //Se ocorrer alguma execeção
        tratarExcecao($exc);
    }
}