<?php 
    include("head.php");
    if ($tipo!=2){
                              echo "<script language= 'JavaScript'>

                                        location.href='./error403.php'

                                </script>";
                        }
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>

          
       

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-6">
              
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Meus Horários Marcados</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Data</th>
                      <th>Horário</th>
                      <th>Situação</th>
                      <th>Estabelecimento</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                        require_once './Controller/HorarioController.php';
                        $objControl = new HorarioController();
                        $dados=$objControl->listar($_SESSION['id_usuario']);
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                        for ($i = 0; $i < $tamanho; $i++) {
                                    if($dados[$i]['situacao']==2){
                                        echo "<tr class='alert alert-success'>";
                                        $situacao="Horário Confirmado";
                                    }else{
                                       echo "<tr class='alert alert-danger'>";
                                        $situacao="Horário Não Confirmado"; 
                                    }
                                    
                                    echo"<td>" . $dados[$i]['id'] . "</td>";
                                    
                                    echo"<td>" . $dados[$i]['dia'] . "</td>";
                                    echo"<td>" . $dados[$i]['horario'] . "</td>";
                                    echo"<td>" . $situacao . "</td>";
                                   
                                    echo"<td>" . $dados[$i]['estabelecimento'] . "</td>";
                                        
                                  if($dados[$i]['situacao']!=2){

                                    echo"<td> 
                                      <a onclick='return cancelar();' href=HOR_cancelar.php?id=" . $dados[$i]['id'] . "><i class='fa fa-trash' title='Cancelar Reserva'  aria-hidden='true'></i></a></td></tr>";
                                  }else{
                                      echo "<td></td>";
                                  }
                        }
                        
                        }else{
                            echo "<tr><td colspan='6'> Você não reservou nenhum horário ainda, volte ao painel de Controle para fazer uma reserva!</td>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>    
                </div>
              </div>

            

            </div>

          
          </div>

        </div>
        <!-- /.container-fluid -->

     <?php 
        include("footer.php");
        
     ?>

