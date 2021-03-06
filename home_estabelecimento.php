   <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Horários Reservados</h6>
                </div>
                <div class="card-body">
                   <?php
                        require_once './Controller/HorarioController.php';
                        $objControl2 = new HorarioController();
                        $dados=$objControl2->listar_reservados($_SESSION['id_usuario']);
                        $tamanho = count($dados);
                        $data_atual= date("Y-m-d");

                        if ($tamanho > 0) {
                                                            echo '<div class="row">';

                            for ($i = 0; $i < $tamanho; $i++) {
                                 if(strtotime($dados[$i]["dia"])>=strtotime($data_atual)){

                                                                if($dados[$i]['situacao']==1){

                                echo '<div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary  mb-2">Data:'. date('d/m/Y',  strtotime($dados[$i]['dia'])).'</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">'.$dados[$i]['horario'].'<br/> Reservado por : '.$dados[$i]['cliente'].'</div>
                              </div>
                              <div class="col-auto">
                                   <a onclick="return confirmar_reserva();" href="HOR_confirmar.php?id='.$dados[$i]['id'].'" class="btn btn-success btn-circle btn-lg">

                                <i class="fas fa-check fa-2x text-green-300"></i>
                                                </a>
                                                 <a onclick="return cancelar();" href="HOR_cancelar_reserva.php?id='.$dados[$i]['id'].'" class="btn btn-danger btn-circle btn-lg">

                                <i class="fas fa-calendar-times fa-2x text-green-300"></i>
                                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                     
                                                                </div>';
                                
                                                                }
                                 }
                            }
                                                            echo '</div>';

                        }
                    ?>
                </div>
 </div>

<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Horários Confirmados</h6>
                </div>
                <div class="card-body">
                   <?php
                        
                       
                        if ($tamanho > 0) {
                            echo '<div class="row">';

                            for ($i = 0; $i < $tamanho; $i++) {
                            if(strtotime($dados[$i]["dia"])>=strtotime($data_atual)){

                                if($dados[$i]['situacao']==2){
                                echo '<div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary  mb-2">Data:'. date('d/m/Y',  strtotime($dados[$i]['dia'])).'</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$dados[$i]['horario'].'<br/> Cliente : '.$dados[$i]['cliente'].'</div>
                              </div>
                              <div class="col-auto">

                                             <a onclick="return cancelar();" href="HOR_cancelar_reserva.php?id='.$dados[$i]['id'].'" class="btn btn-danger btn-circle btn-lg">

                                <i class="fas fa-calendar-times fa-2x text-green-300"></i>
                                                </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                     
                                </div>';
                                
                                }
                            }
                            }
                                                            echo '</div>';

                        }
                    ?>
                </div>
 </div>