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
function verificarEmail($email) {

    $conn = F_conect();
    $result = mysqli_query($conn, "SELECT email FROM `usuario` WHERE email='" . $email . "'");

    if (mysqli_num_rows($result)) {

        echo "<script>alert('Já existe um e-mail cadastrado com essa conta.');</script>";
        return false;
    }
    return true;
}
function cadastrar($nome,$email,$senha,$telefone,$documento, $tipo) {
	$verificar= verificarEmail($email);
	if($verificar==true){
		$conn = F_conect();
		$sql = "INSERT INTO usuario(nome, email, senha,telefone,documento, tipo)
				VALUES('" . $nome . "','" . $email . "','" . $senha . "', '".$telefone."', '".$documento."'  ,'".$tipo."' )";
		if ($conn->query($sql) == TRUE) {
			Alert("Sucesso!", "Usuário cadastrado com sucesso", "success");
			echo "<a href='./index.php'> Voltar a tela de login</a>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
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
            $documento=$row['documento'];
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
            $usuario[$i]["documento"]=$documento;
            
            return $usuario;

}
function editarUsu($nome,$email,$senha,$telefone,$documento,$id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', senha='" .
            $senha . "', telefone='".$telefone."', documento='".$documento."' WHERE id= " . $id;

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

function findUserByEmail($email,$documento) {
    $conn = F_conect();
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='".$email."' and documento='".$documento."'");
    $i = 0;
    $usuario = array();
    if (mysqli_num_rows($result) >=1){
        while ($row = $result->fetch_assoc()) {
            $nome=$row['nome'];
            $email=$row['email'];
            $senha=$row['senha'];
            $telefone=$row['telefone'];                 
        }
        
        $usuario[$i]["nome"]=$nome;
        $usuario[$i]["email"]=$email;
        $usuario[$i]["senha"]=$senha;
        $usuario[$i]["telefone"]=$telefone;
        return $usuario;
        $conn->close();

    }else{
        return null;
    }


}

?>
