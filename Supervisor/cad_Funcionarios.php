<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>SPE</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li>
              <a href="#"><i class="fa fa-fw s fa-home"></i>Início</a>
            </li>
            <li class="active">
              <a href="#"><i class="fa fa-fw fa-users"></i>Funcionários</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-calendar"></i>Batidas</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-user-plus"></i>Usuários</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>
              <i class="fa fa-fw fa-user-plus"></i>Adicionar funcionário</h1>
          </div>
          </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Dados gerais</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label for="inputEmail3" class="control-label">*Nome</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Nome">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label for="inputPassword3" class="control-label">*Telefone</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="(DD) xxxxx-xxxx">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label class="control-label">E-mail</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="nome@servidor.com">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label for="inputEmail3" class="control-label">*Endereço</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Quadra x Conj x Casa x - Cidade-Estado">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label for="inputPassword3" class="control-label">*PIS</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="xxx.xxxxx.xx-x">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Relação a empresa</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label for="inputEmail3" class="control-label">*Matrícula</label>
                        </div>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="000000">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label class="control-label">*Cargo</label>
                        </div>
                        <div class="col-sm-10">
                          <select class="form-control">
                            <option>Selecione</option>
                            <option>1</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label class="control-label">Departamento</label>
                        </div>
                        <div class="col-sm-10">
                          <select class="form-control">
                            <option>Selecione</option>
                            <option>1</option>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <form class="form-horizontal text-right" role="form">
                      <div class="form-group">
                        <div class="col-sm-4">
                          <label for="inputPassword3" class="control-label">Data de admissão
                            <br>
                            <br>
                          </label>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="inputPassword3" placeholder="00/00/0000">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4">
                          <label class="control-label">Data de demissão</label>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" placeholder="00/00/0000">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">Bloquear funcionario para acessar batidas</label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-left">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <a href="#" class="btn btn-primary"><i class="fa fa-fw fa-backward"></i>Cancelar</a>
              <a href="#" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Salvar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  

</body></html>