<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <link href="recurso/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href = "recurso/css/bootstrap-select.min.css" rel = "stylesheet">
        <link href = "recurso/bootstrap/css/bootstrap-table.min.css" rel = "stylesheet">
        <script src = "recurso/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="recurso/bootstrap/js/bootstrap.min.js"></script>
        <script src="recurso/bootstrap/js/bootstrap-select.min.js"></script>
        <script src="recurso/bootstrap/js/bootstrap-table.min.js"></script>

    </head>

    <body>

        <?php include "_menu.php" ?> 

        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Cadastrar
            </button>
            <table data-toggle="table" 
                   data-url="controller/RecursosController.php?acao=getAll" 
                   data-cache="false" data-height="299">
                <thead>
                    <tr>
                        <th data-field="id">Id</th>
                        <th data-field="nome">Nome</th>
                        <th data-field="operate" data-formatter="operateFormatter" 
                            data-events="operateEvents">Operacao</th>
                    </tr>
                </thead>
            </table>


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="form-horizontal" action="controller/RecursosController.php"
                          method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cadastro Evento</h4>
                            </div>

                            <div class="modal-body">

                                <fieldset>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="nome">Nome</label>  
                                        <div class="col-md-4">
                                            <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">

                                        </div>
                                    </div>
                                </fieldset>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <input type="submit" value="Salvar" class="btn btn-primary" ></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="recurso/bootstrap/js/bootstrap.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

            <script>
                function operateFormatter(value, row, index) {
                    return [
                        '<a class="editar ml10" href="javascript:void(0)" title="Editar">',
                        '<i class="glyphicon glyphicon-pencil"></i>',
                        '</a>',
                        '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                        '<i class="glyphicon glyphicon-remove"></i>',
                        '</a>'].join('');
                }

                window.operateEvents = {
                    'click .remove': function(e, value, row, index) {
                        if (confirm("Deseja deletar esse registro?")) {
                            var posting = $.post("controller/deletePaciente.php",
                                    {paciente: JSON.stringify(row)});
                            posting.done(function(data) {
                                location.reload();
                            });
                        }
                    },
                    'click .editar': function(e, value, row, index) {
                        $(window.document.location).attr('href', "Cadastro.php?paciente="
                                + JSON.stringify(row));
                    }
                };
            </script>
    </body></html>