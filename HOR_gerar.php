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
                   $id_estabelecimento=$dados[0]['id_usuario'];               ?>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Gerar Horário</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                            <input type="text" name="tempo" class="form-control form-control-user" id="exampleInputEmail" placeholder="Tempo Médio de cada Serviço (minutos)" required="">
                      </div>    
               <div class="row">
                   <div class="col-sm-1">De: </div>

                  <div class="col-sm-5">
                        

                      <input type="date" name="data_inicial" class="form-control form-control-user" id="exampleInputPassword" placeholder="De " required="">
                  </div>
                                      <div class="col-sm-1">ate: </div>

                  <div class="col-sm-5">

                      <input type="date" name="data_final" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="a" required="">
                  </div>
                </div>
                         <br/>
                         <div class="row">
                   <div class="col-sm-1">Das: </div>

                  <div class="col-sm-5">
                        

                      <input type="time" name="hora_inicial" class="form-control form-control-user" id="exampleInputPassword" placeholder="De " required="">
                  </div>
                                      <div class="col-sm-1">ate: </div>

                  <div class="col-sm-5">

                      <input type="time" name="hora_final" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="a" required="">
                  </div>
                </div>
                                         <br/>

                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Gerar</button>
                  <a href="EST_listar.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    $data_atual=date("Y-m-d");
                    if (isset($_POST["botao"])) {
                          if(strtotime($_POST["data_inicial"])>=strtotime($data_atual)){
                                if(strtotime($_POST["data_final"])>=strtotime($_POST["data_inicial"])){
                                if(strtotime($_POST["hora_final"])>=strtotime($_POST["hora_inicial"])){
                                      $objControl2->gerar($_POST["data_inicial"], $_POST["data_final"],$_POST["hora_inicial"],$_POST["hora_final"],$_POST["tempo"],$id_estabelecimento);


                                }else{
                                    Alert("Intervalo da Hora Incorreto!","A Hora Final que você selecionou está antes da Hora Inicial!","danger");
                                }
                            }else{
                                    Alert("Intervalo da Data Incorreto!","A Data Final que você selecionou está antes da Data  Inicial!","danger");
                            }
                        }else{
                             Alert("Data Inicial é menor do que a data Atual!","A data Inicial tem que ser igual ou depois da data de hoje!","danger");

                        }
                        

                            
                      
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


