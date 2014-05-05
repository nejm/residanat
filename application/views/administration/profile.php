<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <<li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Liste Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/etudiant/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>List des choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><?=$_SESSION['name']?></h1>
            <div>Login : nejm</div>
            <div>Nom : Hidri</div>
            <div>Prénom : Nejm Eddine</div>
            <div>Date de naissance : 20/09/1992</div>
        </div>
    </div>
</div>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>

</body>
</html>