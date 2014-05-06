<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li class="active"><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media/");?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/etuciant/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>Chercher Etudiant</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Tous les Admins</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>

                </thead>
                <?php
                foreach ($users as $user)
                {
                    echo "<tr><td>".$user->id.
                        "</td><td>".$user->nom.
                        "</td><td>".$user->prenom.
                        "</td><td>".$user->mail.
                        "</td></tr>";
                }

                ?>
            </table>
            <!--</form>-->
        </div>
    </div>
</div>

<!-------------------------------------------------------------------->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>Etes-Vous sûr de vouloir supprimer l'article</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                <button type="button" id="validate" class="btn btn-danger">Oui</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-------------------------------------------------------------------->
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("alertify.min")?>></script>
<script type="text/javascript">
    <?php if(isset($msg)):?>
    alertify.success("<?php echo $article->titre;?> modifié avec succées");
    <?php endif ?>
</script>

</body>
</body>
</html>