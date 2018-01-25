
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
                            <h3><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Cadastrar Pessoa</h3>
                        </div>
                        <div class="panel-body">
                            <form  id="frm-pessoa" name="frm-pessoa"  method="POST" action="">
                                <label for="nome">Nome:</label><br/>
                                <input class= "form-control" id ="fnome" type="text" name="nome" value="<?php print htmlentities($nome) ?>" required/>
                                <br/>
                                <label for="sobrenome">Sobrenome:</label><br/>
                                <input class= "form-control" type="text" name="sobrenome" value="<?php print htmlentities($sobrenome) ?>" required/>
                                <br/>
                                <div class="form-group">
                                    <label for="grupo">Grupos:</label><br/>
                                    <select name="grupos[]" multiple class="form-control" id="selectGrupo">

                                        <?php foreach($gruposAll as $grupo): ?>
                                        <option value="<?= $grupo['id']; ?>"><?= $grupo['grupo']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <br/>
                                <input type="hidden" name="form-submitted" value="1" />
                                <input class="btn btn-primary btn-large" type="submit" value="Cadastrar" />
                                <a href="index.php?op=lista-pessoas" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para Listagem</a>
                            </form>

                        </div>    
                    </div>
                </div>
            </div> 
        </div>   
