<?php

function listarMensagens($id_usuario){
    require_once 'connect.php';
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from mensagem where id_usuario='".$id_usuario."' order by id DESC");
    $i = 0;
    $mensagens= array();
    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
                $mensagens[$i]['id'] = $row['id'];
                $mensagens[$i]['dia'] = $row['dia'];
                $mensagens[$i]['texto'] = $row['texto'];               
               
                $i++;
            }
    }
   $conn->close();
   return $mensagens;
}
function cadastrarMensagem($mensagem,$dia,$id_usuario){
    $conn = F_conect();
    $sql = "INSERT INTO mensagem(dia, texto, id_usuario)
            VALUES('" . $dia. "','" . $mensagem . "', '".$id_usuario."' )";
    if ($conn->query($sql) == TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}