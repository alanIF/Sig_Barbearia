
<?php


function listarHorariosDisponiveis(){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.id id,h.dia dia,h.horario horario,e.nome estabelecimento from horario h, estabelecimento e where h.id_estabelecimento=e.id and h.situacao='0'");
    $i = 0;
    $horarios= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $horarios[$i]['id'] = $row['id'];
                $horarios[$i]['dia'] = $row['dia'];
                $horarios[$i]['horario'] = $row['horario'];               
                $horarios[$i]['estabelecimento'] = $row['estabelecimento'];               
               
                $i++;
            }
    }
   $conn->close();
   return $horarios;
}
function listarHorariosReservados($id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.situacao situacao, h.id id,h.dia dia,h.horario horario,(Select nome from usuario  where id=h.id_cliente )cliente  from horario h, estabelecimento e where h.id_estabelecimento=e.id and h.situacao!= '0' and e.id_usuario='".$id_usuario."'");
    $i = 0;
    $horarios= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $horarios[$i]['id'] = $row['id'];
                $horarios[$i]['dia'] = $row['dia'];
                $horarios[$i]['horario'] = $row['horario'];  
                $horarios[$i]['situacao']= $row['situacao'];
                $horarios[$i]['cliente'] = $row['cliente'];               
               
                $i++;
            }
    }
   $conn->close();
   return $horarios;
}
function getHorario($id_horario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.id id,h.dia dia,h.horario horario, u.id dono, h.id_cliente cliente from horario h, usuario u, estabelecimento e where h.id='".$id_horario."' and h.id_estabelecimento=e.id and e.id_usuario=u.id");
    $i = 0;
    $horarios= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $horarios[$i]['id'] = $row['id'];
                $horarios[$i]['dia'] = $row['dia'];
                $horarios[$i]['horario'] = $row['horario'];               
                $horarios[$i]['dono'] = $row['dono'];               
                $horarios[$i]['cliente'] = $row['cliente'];               
               
                $i++;
            }
    }
   $conn->close();
   return $horarios;
    
}

function reservarHorario($id_horario,$id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    
    $sql = "update horario set id_cliente='".$id_usuario."', situacao='1'  where id='".$id_horario."'";
        if ($conn->query($sql) == TRUE) {
            require_once 'Mensagem.php';
            $dia=  date("d/m/Y");
            $horario= getHorario($id_horario);
            $mensagem= $_SESSION["nome"]." reservou o horário: ".$horario[0]['horario']." no dia : ".$horario[0]['dia'];
            $id_usuario=$horario[0]["dono"];
            cadastrarMensagem($mensagem, $dia, $id_usuario);
            echo "<script language='javascript' type='text/javascript'>"
                    . "alert('Horário reservado com sucesso!');";

                        echo "</script>";
                    echo "<script language='javascript' type='text/javascript'>
                    window.location.href = 'javascript:window.history.go(-1);';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}

function confirmarHorario($id_horario){
    require_once 'connect.php';
    $conn = F_conect();
    
    $sql = "update horario set  situacao='2'  where id='".$id_horario."'";
        if ($conn->query($sql) == TRUE) {
            require_once 'Mensagem.php';
            $dia=  date("d/m/Y");
            $horario= getHorario($id_horario);
            $mensagem= $_SESSION["nome"]." confirmou a reserva  do seu horário marcado para a hora : ".$horario[0]['horario']." no dia : ".$horario[0]['dia'];
            $id_usuario=$horario[0]["cliente"];
            cadastrarMensagem($mensagem, $dia, $id_usuario);
            echo "<script language='javascript' type='text/javascript'>"
                    . "alert('Confirmação do Horário realizada com sucesso!');";

                        echo "</script>";
                    echo "<script language='javascript' type='text/javascript'>
                    window.location.href = 'javascript:window.history.go(-1);';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}
function cancelarReservarHorario($id_horario,$id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    
    $sql = "update horario set id_cliente='null', situacao='0'  where id='".$id_horario."'";
        if ($conn->query($sql) == TRUE) {
            require_once 'Mensagem.php';
            $dia=  date("d/m/Y");
            $horario= getHorario($id_horario);
            $mensagem= $_SESSION["nome"]." cancelou a reserva do horário: ".$horario[0]['horario']." no dia : ".$horario[0]['dia'];
            $id_usuario=$horario[0]["dono"];
            cadastrarMensagem($mensagem, $dia, $id_usuario);
            echo "<script language='javascript' type='text/javascript'>"
                    . "alert('Reserva cancelada com sucesso!');";

                        echo "</script>";
                    echo "<script language='javascript' type='text/javascript'>
                    window.location.href = 'javascript:window.history.go(-1);';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}
function cancelarReservarHorario_estabelecimento($id_horario){
    require_once 'connect.php';
    $conn = F_conect();
    
    $sql = "update horario set id_cliente='null', situacao='0'  where id='".$id_horario."'";
        if ($conn->query($sql) == TRUE) {
            require_once 'Mensagem.php';
            $dia=  date("d/m/Y");
            $horario= getHorario($id_horario);
            $mensagem= $_SESSION["nome"]." cancelou a sua reserva no horário: ".$horario[0]['horario']." no dia : ".$horario[0]['dia'];
            $id_usuario=$horario[0]["cliente"];
            cadastrarMensagem($mensagem, $dia, $id_usuario);
            echo "<script language='javascript' type='text/javascript'>"
                    . "alert('Reserva cancelada com sucesso!');";

                        echo "</script>";
                    echo "<script language='javascript' type='text/javascript'>
                    window.location.href = 'javascript:window.history.go(-1);';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}
function listarHorariosMarcados($id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.id id,h.dia dia,h.horario horario,h.situacao situacao,(Select nome from estabelecimento where id=h.id_estabelecimento) estabelecimento from horario h, estabelecimento e,usuario u where h.id_estabelecimento=e.id and h.id_cliente=u.id and u.id='".$id_usuario."'");
    $i = 0;
    $horarios= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $horarios[$i]['id'] = $row['id'];
                $horarios[$i]['dia'] = $row['dia'];
                $horarios[$i]['horario'] = $row['horario'];               
                $horarios[$i]['situacao'] = $row['situacao'];
                $horarios[$i]['estabelecimento'] = $row['estabelecimento'];
                $i++;
            }
    }
   $conn->close();
   return $horarios;
}
?>
