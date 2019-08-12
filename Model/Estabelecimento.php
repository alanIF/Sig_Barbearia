<?php

function listarHorarios($id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.id id,h.dia dia,h.horario horario,h.situacao situacao,(Select nome from usuario where id=h.id_cliente) cliente from horario h, estabelecimento e,usuario u where h.id_estabelecimento=e.id and e.id_usuario=u.id and u.id='".$id_usuario."'");
    $i = 0;
    $horarios= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $horarios[$i]['id'] = $row['id'];
                $horarios[$i]['dia'] = $row['dia'];
                $horarios[$i]['horario'] = $row['horario'];               
                $horarios[$i]['situacao'] = $row['situacao'];
                $horarios[$i]['cliente'] = $row['cliente'];
                $i++;
            }
        }
   $conn->close();
   return $horarios;
}

