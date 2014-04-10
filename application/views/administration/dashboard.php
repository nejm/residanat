<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Consulter Choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
    <div class="row placeholders">
        <div class="col-xs-8 col-sm-4 placeholder">
            <img data-src="holder.js/200x200/auto/sky" class="img-thumbnail" alt="200x200" src=<?=img_url('etudiant.png')?>>
            <h4>Etudiants</h4>
            <!--<span class="text-muted">Something else</span>-->
        </div>
        <div class="col-xs-8 col-sm-4 placeholder">
            <img data-src="holder.js/200x200/auto/vine" class="img-thumbnail" alt="200x200" src=<?=img_url("specialite.png")?>>
            <h4>Spécialités</h4>
        </div>
        <div class="col-xs-8 col-sm-4 placeholder">
            <img data-src="holder.js/200x200/auto/sky" class="img-thumbnail" alt="200x200" src=<?=img_url('articles.png')?>>
            <h4>Articles</h4>

<!--        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="200x200" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzM5REJBQyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjEwMCIgeT0iMTAwIiBzdHlsZT0iZmlsbDojMUUyOTJDO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEzcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MjAweDIwMDwvdGV4dD48L3N2Zz4=">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>-->
    </div>
</div>
</div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>


<script type="text/javascript">
    $("#pb").bootstrapSwitch();
</script>

</body>
</body>
</html>