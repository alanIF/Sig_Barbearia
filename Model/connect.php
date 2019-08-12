<?php

    function F_conect(){
        $servidor = "localhost";    
        $nomebanco = "sig_barbearia" ;
        $usuario = "root";
        $senha = "";

        // Criando conexão com o Banco de Dados
        $conn = new mysqli($servidor, $usuario, $senha,$nomebanco);
        // Checando conexão erro
        if ($conn->connect_error)
            {
         echo "<script language='javascript' type='text/javascript'>"
        . "alert('O sistema está fora do ar. Este sistema está hospedado em um servidor gratuito e os recursos foram muito utilizados nas ultimas horas. Daqui a uma hora, o sistema voltará a funcionar normalmente!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";
        }else{
            // Caso falso, retorna a conexão
            return $conn;
        }
    }  
    
    function Alert($titulo, $corpo, $tipo){
                                    echo "<br/><hr>";

        echo ' <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-'.$tipo.'">'.$titulo.'</h6>
                </div>
                <div class="card-body">'.$corpo.'</div>
              </div>';
        
        
    }
    function permissao(){
    if($_SESSION['tipo']==1){
        return 1;
    }
    return 2;
}
    
    

