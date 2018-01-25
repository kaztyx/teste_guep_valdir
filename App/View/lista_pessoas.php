<h2 class="text-center">Pessoas</h2>

        <div class="col-md-6 col-md-offset-3">
            <div><a href="index.php?op=nova-pessoa" class="btn btn-primary btn-large"><i class="glyphicon glyphicon-plus-sign"></i> &nbsp;Adiciona nova Pessoa</a>
            </div>
            <table class="table table-bordered table-responsive table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th><a href="?op=lista-pessoas&orderby=nome">Nome</a></th>
                        <th><a href="?op=lista-pessoas&orderby=sobrenome">Sobrenome</a></th>
                        <th>Grupos</a></th>
                        <th><a href="?op=lista-pessoas&orderby=created_at">Criado</a></th>
                        <th><a href="?op=lista-pessoas&orderby=updated_at">Modificado</a></th>
                        <th colspan="2" class= "text-center">Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php print htmlentities($pessoa['nome']); ?></td>
                        <td><?php print htmlentities($pessoa['sobrenome']); ?></td>
                        <td><?php print htmlentities($pessoa['grupo']); ?></td>
                        <td><?php print htmlentities($pessoa['created_at']); ?></td>
                        <td><?php print htmlentities($pessoa['updated_at']); ?></td>
                        

                        <td align="center"><a href="index.php?op=mostra-pessoa&id=<?php print $pessoa['id']; ?>" class="btn btn-primary btn-sm">editar</a></td>
                        <td align="center"><a href="index.php?op=deleta-pessoa&id=<?php print $pessoa['id']; ?>" class="btn btn-danger btn-sm">deletar</a></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
   
