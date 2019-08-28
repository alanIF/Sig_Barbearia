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
                  <h6 class="m-0 font-weight-bold text-info">Minhas Mensagens Recebidas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Data</th>
                      <th>Mensagem</th>
                      
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                        
                        $tamanho = count($mensagens);
                        if ($tamanho > 0) {
                        for ($i = 0; $i < $tamanho; $i++) {
                                   echo "<tr>";
                                    echo"<td>" . $mensagens[$i]['id'] . "</td>";
                                   
                                    echo"<td>" .$mensagens[$i]['dia']."</td>";
                                    echo"<td>" .$mensagens[$i]['texto']."</td>";
                                    echo "</tr>";
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
