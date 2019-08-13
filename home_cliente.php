   <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Horários Disponíveis</h6>
                </div>
                <div class="card-body">
                    <?php
                        require_once './Controller/HorarioController.php';
                        $objControl2 = new HorarioController();
                        $dados=$objControl2->listar_disponiveis();
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                                                            echo '<div class="row">';

                            for ($i = 0; $i < $tamanho; $i++) {
                                echo '<div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary  mb-2">Data:'.$dados[$i]['dia'].'</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">'.$dados[$i]['horario'].'</div>
                              </div>
                              <div class="col-auto">
                                   <a onclick="return reservar();" href="HOR_reservar.php?id='.$dados[$i]['id'].'" class="btn btn-success btn-circle btn-lg">

                                <i class="fas fa-calendar fa-2x text-green-300"></i>
                                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                     
                    </div>';
                            }
                                                            echo '</div>';

                        }
                    ?>
                   
                    
                </div>
  </div>

