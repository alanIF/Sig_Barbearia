<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SigBarber</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Criar uma Conta!</h1>
              </div>
              <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nome" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" required="">
                </div>
                  <div class="form-group">
                    <input type="text" name="telefone" class="form-control form-control-user "    id="telefone" placeholder="Telefone" required="">
					  <script type="text/javascript">
						$("#telefone, #celular").mask("(00) 00000-0000");
						</script>
        
                </div>
                   <div class="form-group">
                    <input type="text" name="documento" class="form-control form-control-user" id="exampleInputEmail" placeholder="Digite algum número de documento que te ajudará na hora que você esquecer sua senha." required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" required="">
                  </div>
                  <div class="col-sm-6">
                      <input type="password" name="senhaR" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir sua Senha" required="">
                  </div>
                </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Cadastrar</button>

                
              </form>
                 <?php
                    require_once 'Model/connect.php';   

                    require_once './Controller/UsuarioController.php';
                    if (isset($_POST["botao"])) {
                        $objControl = new UsuarioController();
                        // tipo depois alterar quando passar para uma versao geral
                        $tipo=2;

                        if( strcmp($_POST["senha"],$_POST['senhaR'])==0){
                            $objControl->cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"],$_POST["telefone"],$_POST["documento"],$tipo);
                        }else{
                            Alert("ERROR!", "Senhas não coicidentes!","danger");
                        }
                    }
                    ?>   
              <hr>
              <div class="text-center">
                <a class="small" href="senha.php">Esqueceu sua senha?</a>
              </div>
              <div class="text-center">
                  <a class="small" href="index.php">Já tem uma conta? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

