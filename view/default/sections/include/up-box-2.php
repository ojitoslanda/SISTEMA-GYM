              <div class="col-md-4 col-12 mt-3">
                  <div class="card">
                    <h5 class="card-header">Semanal</h5>
                    <div class="card-body SemanalQuincenalDiv">
                        <table id="exSemanal" class="table text-center" style="width:100%">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Expiraci&oacute;n</th>
                              <!-- <th></th> -->
                            </tr>
                          </thead>
                          <tbody>
                                <?php require_once("../controller/membrecia/exSemanal.php") ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
              </div>
            
              <div class="col-md-4 col-12 mt-3">
                  <div class="card">
                    <h5 class="card-header">Quincenal</h5>
                    <div class="card-body SemanalQuincenalDiv">
                        <table id="exQuincenal" class="table text-center" style="width:100%">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Expiraci&oacute;n</th>
                              <!-- <th></th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php require_once("../controller/membrecia/exQuincenal.php") ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
              </div>

              <div class="col-md-4 col-12 mt-3">
                  <div class="card">
                    <h5 class="card-header">Mensual</h5>
                    <div class="card-body SemanalQuincenalDiv">
                        <table id="exMensual" class="table text-center" style="width:100%">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Expiraci&oacute;n</th>
                              <!-- <th></th> -->
                            </tr>
                          </thead>
                          <tbody>
                                <?php require_once("../controller/membrecia/exMensual.php") ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
              </div>
