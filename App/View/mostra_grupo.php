
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Editar Grupo</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="">
                                <label for="grupo">Grupo:</label><br/>
                                <input class= "form-control" type="text" name="grupo" value="<?php print $grupo['grupo']; ?>"/>
                                <br/>
                                <label for="descr">Descrição:</label><br/>
                                <input class= "form-control" type="text" name="descr" value="<?php print $grupo['descr'] ?>"/>
                                <br/>
                                
                                <input type="hidden" name="form-submitted" value="1" />
                                <input class="btn btn-primary btn-large" type="submit" value="Alterar" />
                                <a href="index.php?op=lista-grupos" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para Listagem</a>
                            </form>

                        </div>    
                    </div>
                </div>
            </div> 
        </div>   

