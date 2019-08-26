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
                  <h6 class="m-0 font-weight-bold text-info">Meus dados</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nome" value="<?php echo  $dados[0]["nome"];?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nome" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="<?php echo  $dados[0]["email"];?>"   class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" required="">
                </div>
                  <div class="form-group">
                    <input type="text" id="telefone" name="telefone"  value="<?php echo  $dados[0]["telefone"];?>"  class="form-control form-control-user"  placeholder="Telefone" required="">
                </div>
				 <script type="text/javascript">
						$("#telefone, #celular").mask("(00) 00000-0000");
						</script>
                                                <div class="form-group">
                    <input type="text" name="documento" value="<?php echo  $dados[0]["documento"];?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Documento" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" name="senha"  value="<?php echo  $dados[0]["senha"];?>"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" required="">
                  </div>
                  <div class="col-sm-6">
                      <input type="password" name="senhaR"  value="<?php echo  $dados[0]["senha"];?>"  class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir sua Senha" required="">
                  </div>
                </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Atualizar</button>

                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                        // tipo depois alterar quando passar para uma versao geral
                        $tipo=2;

                        if( strcmp($_POST["senha"],$_POST['senhaR'])==0){
                            $objControl2->atualizar($_POST["nome"], $_POST["email"], $_POST["senha"],$_POST["telefone"],$_POST["documento"], $_SESSION['id_usuario']);
                          echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='account.php'>";

                            
                        }else{
                            Alert("ERROR!", "Senhas não coicidentes!","danger");
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
