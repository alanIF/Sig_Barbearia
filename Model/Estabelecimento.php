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
function getHorario($id,$id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select h.id id,h.dia dia,h.horario horario,h.situacao situacao,(Select nome from usuario where id=h.id_cliente) cliente from horario h, estabelecimento e,usuario u where h.id_estabelecimento=e.id and e.id_usuario=u.id and u.id='".$id_usuario."' and h.id='".$id."'");
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
// recupera os estabelecimentos dos usuarios
function getEstabelecimento($id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from  estabelecimento  where  id_usuario='".$id_usuario."'");
    $i = 0;
    $estabelecimento= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $estabelecimento[$i]['id'] = $row['id'];
                $estabelecimento[$i]['descricao'] = $row['descricao'];
                $estabelecimento[$i]['endereco'] = $row['endereco'];
                $estabelecimento[$i]['nome'] = $row['nome'];
                $estabelecimento[$i]['id_usuario'] = $row['id_usuario'];
                
                $i++;
            }
    }
   $conn->close();
   return $estabelecimento;
}
function cadastrarHorario($data,$horario,$id_estabelecimento){
    $conn = F_conect();
    $sql = "INSERT INTO horario(dia, horario, situacao,id_estabelecimento)
            VALUES('" . $data . "','" . $horario . "','0', '".$id_estabelecimento."' )";
    if ($conn->query($sql) == TRUE) {
        Alert("Sucesso!", "Horário cadastrado com sucesso", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function gerarHorario($data_inicial,$data_final,$hora_inicial,$hora_final,$tempo,$id_estabelecimento){
    $conn = F_conect();

    // percorre de um dia ate o outro
    while (strtotime($data_inicial) <= strtotime($data_final)) {
        $data_inicial = date ("Y-m-d", strtotime("+1 day", strtotime($data_inicial)));
        $hora_inicial2=$hora_inicial;
        // percorre da hora que ele selecionou ate a hora final
        while (strtotime($hora_inicial2)<=strtotime($hora_final)){
            
            $sql = "INSERT INTO horario(dia, horario, situacao,id_estabelecimento)
            VALUES('" . $data_inicial . "','" . $hora_inicial2 . "','0', '".$id_estabelecimento."' )";
            if ($conn->query($sql) == TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                return 0;
            }
            $string_t=$hora_inicial2." + ".$tempo." minutes";
            $hora_inicial2 = date("H:i",strtotime($string_t));
            
        }
    }
    Alert("Horário Gerado!", "Seu horário foi gerado com sucesso!", "success");
   
   
}
function atualizarHorario($data,$horario,$id){
    $conn = F_conect();
    $sql = "update horario set dia='".$data."' , horario='".$horario."' where id='".$id."'";
    if ($conn->query($sql) == TRUE) {
        Alert("Sucesso!", "Horário atualizado com sucesso", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function atualizarEstabelecimento($nome,$descricao,$endereco,$id){
    $conn = F_conect();
    $sql = "update estabelecimento set nome='".$nome."' , descricao='".$descricao."', endereco='".$endereco."' where id='".$id."'";
    if ($conn->query($sql) == TRUE) {
        Alert("Sucesso!", "Estabelecimento atualizado com sucesso", "success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function excluirHorario($id) {

    $conn = F_conect();
    $sql = "DELETE FROM horario WHERE id=" . $id ;

    if ($conn->query($sql)) {
        echo "<script language='javascript' type='text/javascript'>"
        . "alert('Horário excluído com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
        window.location.href = 'javascript:window.history.go(-1);';
        </script>";
    }

    $conn->close();
      
}

