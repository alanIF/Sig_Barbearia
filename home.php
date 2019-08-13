<?php 
    include("head.php");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Painel de Controle</h1>
          </div>

          
       

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-6">

              <?php 
                    if($tipo==1){
                        include 'home_estabelecimento.php';
                    }
                    if($tipo==2){
                        include 'home_cliente.php';
                    }
                ?>
            

            </div>

          
          </div>

        </div>
        <!-- /.container-fluid -->

     <?php 
        include("footer.php");
     ?>