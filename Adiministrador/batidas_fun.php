    <?php
      require_once("../Classes/DAO/AdministrativoDAO.php");
      
      $administrativoDao = new AdministrativoDAO();
      
    ?>

    <div class="container-fluid mt-1">
      <div class="row">
        <div class="col-12">
            <div class="card card-body">

<form>
            <div class="form-row">
              <div class="form-group col-md-5">
                <select class="custom-control custom-select" name="empresa" >
                  <option value="">Empresa</option>

                  <?php
                    foreach($administrativoDao->retornarInfoEMP() as $consulta ){
                    if($consulta["status_emp"]==1){
                  ?>

                  <option value="<?=$consulta['id_emp'];?>"><?=$consulta['nome_emp'];?></option>

                  <?php
                    }
                  }
                  ?>

                </select>
              </div>

              <div class="form-group col-md-5">
                <div class="input-group date" data-provide="datepicker" language="pt-BR" data-date-format="dd/mm/yyyy" >
                    <input type="text" class="datepicker" id="filtro" maxlength="10"  name="data">
                      <div class="input-group-append">
                          <button class="btn btn-dark" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                      </div>
                </div>
              </div>

              <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-dark btn-block" id="btnfiltrar" name='pagina' value="filtrar">Filtrar</button>
              </div>
              
            </div>
 </form>


            </div>
          </div>
        </div>
      </div>
    </div>
