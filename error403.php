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

                   $objControl2= new UsuarioController();
                   $dados=$objControl2->getUsuario($_SESSION['id_usuario']);

               ?>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Error 403!</h6>
                </div>
                <div class="card-body">
                  <?php 
                        Alert("Error 403!","Você não tem permissão para acessar essa página! <br> <a href='home.php'>Volte ao painel de Controle!</a>","danger");
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
