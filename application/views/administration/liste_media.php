<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li  class="active"><a href=<?=base_url("admin/media/");?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Consulter Choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <form class="form" method="post" action=<?=base_url("admin/media")?> enctype="multipart/form-data">
                <input type="file" name="fichier" title="Ajouter un nouveau fichier"><p></p>
                <input type="submit" name="upload" value="Envoyer" class="btn btn-info">
            </form>
            <hr />
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Minuature</th>
                </tr>
                <?php
                    foreach ($img as $i)
                    {

                        echo "<tr><td>".$i['nom']."</td><td>";
                        echo "<a href=".$i['real']." class='zoombox'>";
                        echo $i['url'];
                        echo "</a></td></tr>";
                    }
                ?>
            </table>

        </div>
    </div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script src=<?=js_url("bootstrap.file-input")?>></script>
<script src=<?=zoombox_js()?>></script>

<script type="text/javascript">
    $("a.zoombox").zoombox();

    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();
</script>

</body>
</body>
</html>