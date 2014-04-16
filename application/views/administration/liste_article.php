<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li class="active"><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media/");?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/etudiant/")?>>Ajouter Etudiant</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <form action=<?=base_url("admin/modifier/")?> method="post">

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Publier</th>
                        <th>Modifier</th>
                    </tr>

                    </thead>
                    <?php
                        foreach ($articles as $article)
                        {
                            echo "<tr><td>".$article->id.
                                 "</td><td>".$article->titre.
                                 "</td><td>";
                                if($article->etat == 1) echo "Oui"; else echo "Non";
                                echo "</td><td><a href='".base_url("admin/modifier/{$article->id}")."' class='btn btn-info'>Modifier</a></td></tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("alertify.min")?>></script>
<?php
if(isset($msg)):?>
    <script type="text/javascript">
            alertify.success("<?php echo $article->titre;?> modifié avec succées");
    </script>
<?php endif ?>
</body>
</body>
</html>