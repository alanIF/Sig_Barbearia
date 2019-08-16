<?php 
    include("head.php");
    if ($tipo!=1){
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
               <?php 
                   require_once './Controller/EstabelecimentoController.php';
                   $objControl2= new EstabelecimentoController();
                   $dados=$objControl2->getEstabelecimento($_SESSION['id_usuario']);
                   $id_estabelecimento=$dados[0]['id_usuario'];
                   
               ?>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Cadastrar Horário</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="date" name="dia" class="form-control form-control-user" id="exampleInputEmail" placeholder="Data" required="">
                </div>
                          <div class="form-group">
                              <input type="time" name="horario" class="form-control form-control-user" id="exampleInputEmail" placeholder="Horário" required="">
                </div>
                
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Cadastrar</button>
                  <a href="EST_listar.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                        // tipo depois alterar quando passar para uma versao geral
                        $tipo=2;

                         $objControl2->cadastrar($_POST["dia"], $_POST["horario"],$id_estabelecimento);

                            
                      
                    }
                    ?>   
                </div>
              </div>

            

            </div>

          
          </div>

        </div>
        <!-- /.container-fluid -->

     <?php 
        include("footer.php");
     ?>
