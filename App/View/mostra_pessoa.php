

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Editar Pessoa</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="">
                                <label for="nome">Nome:</label><br/>
                                <input class= "form-control" type="text" name="nome" value="<?php print $pessoa['nome'] ?>"/>
                                <br/>
                                <label for="sobrenome">Sobrenome:</label><br/>
                                <input class= "form-control" type="text" name="sobrenome" value="<?php print $pessoa['sobrenome'] ?>"/>
                                <br/>
                                <div class="form-group">
                                    <label for="grupo">Grupos:</label><br/>
                                    <select name="grupos[]" multiple class="form-control" id="selectGrupo" disabled>

                                        <?php foreach($gruposAll as $grupo): ?>
                                        <option value="<?= $grupo->id; ?>"><?= $grupo['grupo']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <br/>
                                <input type="hidden" name="form-submitted" value="1" />
                                <input class="btn btn-primary btn-large" type="submit" value="Alterar" />
                                <a href="index.php?op=lista-pessoas" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para Listagem</a>
                            </form>

                        </div>    
                    </div>
                </div>
            </div> 
        </div>   
