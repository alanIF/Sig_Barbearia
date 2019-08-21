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
               <?php 
               require_once './Controller/EstabelecimentoController.php';
                   $objControl2= new EstabelecimentoController();
                   $dados=$objControl2->getEstabelecimento($_SESSION['id_usuario']);
               ?>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Meu Estabelecimento</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nome" value="<?php echo  $dados[0]["nome"];?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nome do Estabelecimento" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="descricao" value="<?php echo  $dados[0]["descricao"];?>"   class="form-control form-control-user" id="exampleInputEmail" placeholder="Descrição" required="">
                </div>
                  <div class="form-group">
                    <input type="text" name="endereco"  value="<?php echo  $dados[0]["endereco"];?>"  class="form-control form-control-user" id="exampleInputEmail" placeholder="Endereço" required="">
                </div>
                
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Atualizar</button>

                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                        // tipo depois alterar quando passar para uma versao geral
                        $tipo=2;

                        $objControl2->atualizar_Estabelecimento($_POST["nome"], $_POST["descricao"], $_POST["endereco"],$dados[0]['id']);
                          echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='account.php'>";

                            
                        
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
