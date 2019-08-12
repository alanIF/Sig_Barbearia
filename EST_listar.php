<?php 
    include("head.php");
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
                  <h6 class="m-0 font-weight-bold text-info">Horários do meu Estabelecimento</h6>
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
                      <th>Cliente</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th colspan="6"><a href="EST_cadastrar.php"><i class="fa fa-plus-circle"></i></a></th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                        require_once './Controller/EstabelecimentoController.php';
                        $objControl = new EstabelecimentoController();
                        $dados=$objControl->listar($_SESSION['id_usuario']);
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                        for ($i = 0; $i < $tamanho; $i++) {
                                    if($dados[$i]['situacao']==0){
                                        echo "<tr class='alert alert-success'>";
                                        $situacao="Disponível";
                                    }else{
                                       echo "<tr class='alert alert-danger'>";
                                        $situacao="Reservado"; 
                                    }
                                    
                                    echo"<td>" . $dados[$i]['id'] . "</td>";
                                    
                                    echo"<td>" . $dados[$i]['dia'] . "</td>";
                                    echo"<td>" . $dados[$i]['horario'] . "</td>";
                                    echo"<td>" . $situacao . "</td>";
                                    if($dados[$i]['cliente']==NULL){
                                    echo"<td>Horário ainda não foi reservado!</td>";
                                        
                                    }else{
                                        echo"<td>" . $dados[$i]['cliente'] . "</td>";
                                        
                                    }
                                    echo"<td>  <a href=EST_editar.php?id=" . $dados[$i]['id'] . "><i class='fa fa-pencil-alt' title='Editar horário'  aria-hidden='true'></i></a>
                                      <a onclick='return confirmar();' href=EST_excluir.php?id=" . $dados[$i]['id'] . "><i class='fa fa-trash' title='Excluir horário'  aria-hidden='true'></i></a></td></tr>";
                                
                        }
                        
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
