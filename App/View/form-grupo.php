        <?php
        if ( $errors ) {
            print '<ul class="errors">';
            foreach ( $errors as $field => $error ) {
                print '<li>'.htmlentities($error).'</li>';
            }
            print '</ul>';
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Cadastrar Grupo</h3>
                        </div>
                        <div class="panel-body">
                            <form id="frm-grupo"  name="frm-grupo" method="POST" action="">
                                <label for="grupo">Grupo:</label><br/>
                                <input class= "form-control" type="text" name="grupo" value="<?php print htmlentities($grupo) ?>"/>
                                <br/>
                                <label for="descr">Descrição:</label><br/>
                                <input class= "form-control" type="text" name="descr" value="<?php print htmlentities($descr) ?>"/>
                                <br/>
                                
                                <input type="hidden" name="form-submitted" value="1" />
                                <input class="btn btn-primary btn-large" type="submit" value="Cadastrar" />
                                <a href="index.php?op=lista-grupos" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para Listagem</a>
                            </form>

                        </div>    
                    </div>
                </div>
            </div> 
        </div>   
    