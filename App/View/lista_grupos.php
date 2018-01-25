<h2 class="text-center">Grupos</h2>

<div class="col-md-6 col-md-offset-3">
    <div><a href="index.php?op=novo-grupo" class="btn btn-primary btn-large"><i class="glyphicon glyphicon-plus-sign"></i> &nbsp;Adiciona novo Grupo</a>
    </div>
    <table class="table table-bordered table-responsive table-striped table-hover">
        <thead class="thead-light"> 
            <tr>
                <th><a href="?op=lista-grupos&orderby=grupo">Grupo</a></th>
                <th><a href="?op=lista-grupos&orderby=descr">Descrição</a></th>
                <th colspan="2" class= "text-center">Ações</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($grupos as $grupo): ?>
            <tr>
                <td><?php print htmlentities($grupo['grupo']); ?></td>
                <td><?php print htmlentities($grupo['descr']); ?></td>
                <td align="center"><a href="index.php?op=mostra-grupo&id=<?php print $grupo['id']; ?>" class="btn btn-primary btn-sm">editar</a></td>
                <td align="center"><a href="index.php?op=deleta-grupo&id=<?php print $grupo['id']; ?>" class="btn btn-danger btn-sm">deletar</a></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
    

