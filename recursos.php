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