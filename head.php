<!DOCTYPE html>
<?php
        require_once './Model/connect.php';            
        require_once './Controller/UsuarioController.php';
        $objControl = new UsuarioController();
        $objControl->verificarlogin();
        $tipo=  permissao();
                   
    ?>
<html lang="pt-bR">

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
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript">
      function confirmar(){
        // só permitirá o envio se o usuário responder OK
        var resposta = window.confirm("Deseja mesmo" + 
                       " excluir este registro?");
        if(resposta)
          return true;
        else
          return false; 
      }
       function reservar(){
        // só permitirá o envio se o usuário responder OK
        var resposta = window.confirm("Deseja mesmo" + 
                       " reservar este horário?");
        if(resposta)
          return true;
        else
          return false; 
      }
     
      function cancelar(){
        // só permitirá o envio se o usuário responder OK
        var resposta = window.confirm("Deseja mesmo" + 
                       " cancelar esta reserva?");
        if(resposta)
          return true;
        else
          return false; 
      }
      function confirmar_reserva(){
        // só permitirá o envio se o usuário responder OK
        var resposta = window.confirm("Deseja mesmo" + 
                       " confirmar a reserva deste horário?");
        if(resposta)
          return true;
        else
          return false; 
      }
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cut"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SigBarber</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel de Controle</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     


    


   

      
      <?php 
        if($tipo==1){
            echo ' <li class="nav-item">
        <a class="nav-link" href="EST_account.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Meu Estabelecimento</span></a>
      </li>
';
            echo ' <li class="nav-item">
        <a class="nav-link" href="EST_listar.php">
          <i class="fas fa-fw fa-clock"></i>
          <span>Horários</span></a>
      </li>';
        }
        if($tipo==2){
            echo ' <li class="nav-item">
        <a class="nav-link" href="HOR_listar.php">
          <i class="fas fa-fw fa-clock"></i>
          <span>Horários Reservados</span></a>
      </li>';
        }
      ?>
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

                       <li class="nav-item dropdown no-arrow mx-1">
                         <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-envelope fa-fw"></i>
                           <!-- Counter - Messages -->
                           <?php
                                 require_once './Model/Mensagem.php';
                                 $mensagens= listarMensagens($_SESSION['id_usuario']);
                                 $tamanho = count($mensagens);
                           ?>
                           <span class="badge badge-danger badge-counter"><?php echo $tamanho;?></span>
                         </a>
                         <!-- Dropdown - Messages -->
                         <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                           <h6 class="dropdown-header">
                             Mensagens
                           </h6>
                             <?php 
                                 if($tamanho>5){
                                     $tamanho=5;
                                 }
                                 if ($tamanho > 0) {
                                    for ($i = 0; $i < $tamanho; $i++) {
                                        echo '<a class="dropdown-item d-flex align-items-center" href="MEN_listar.php">
                             <div class="dropdown-list-image mr-3">
                                 <i class="fa fa-robot fa-2x "></i>
                               <div class="status-indicator bg-success"></div>
                             </div>
                             <div class="font-weight-bold">
                               <div class="text-truncate">'.$mensagens[$i]['texto'].'</div>
                               <div class="small text-gray-500"> No dia: '.$mensagens[$i]['dia'].'</div>
                             </div>
                           </a>';
                                    }
                                 
                                 }else{
                                     echo' <a class="dropdown-item d-flex align-items-center" href="#">
                             <div class="dropdown-list-image mr-3">
                                 <i class="fa fa-robot fa-2x "></i>
                               <div class="status-indicator bg-success"></div>
                             </div>
                             <div class="font-weight-bold">
                               <div class="text-truncate">Você não tem nenhuma mensagem recebida!</div>
                               <div class="small text-gray-500"></div>
                             </div>
                           </a>';
                                 }
                                 
                             ?>
                          
                           
                           
                           
                         </div>
                       </li>


            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nome"]?></span>
                <i class="fa fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="account.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                 Meus dados
                </a>
              
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>

