<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li  class="active"><a href=<?=base_url("admin/media/");?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/etudiant/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>List choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Media</h1>
            <form class="form" id="form" method="post" action=<?=base_url("admin/media")?> enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-1">
                        <label for="filename">Titre</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="filename" id="filename">
                    </div>
                </div>
                <input type="file" name="fichier" title="Ajouter un nouveau fichier"><p></p>
                <div class="col-sm-1"></div>
                <input type="submit" name="upload" value="Envoyer" class="btn btn-info">
            </form>
            <hr />
            <div class="col-sm-6">
                <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Minuature</th>
                    <th>Action</th>
                </tr>
                <?php
                    $i=0;
                    foreach ($img as $i)
                    {
                        echo "<tr><td>".$i['nom']."</td><td>";
                        echo "<a href=".$i['real']." class='zoombox'>";
                        echo $i['url'];
                        echo "</a></td>";
                        echo "<td><button class='btn btn-danger' onclick=deleteFile('".$i['nom']."') data-toggle='modal'
                        data-target='#deleteModal'>Supprimer</button></td>";
                    }
                ?>
            </table>
            </div>
        </div>
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
                <p>Etes-Vous sûr de vouloir supprimer le fichier</p>
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
<script src=<?=js_url("bootstrap-switch")?>></script>
<script src=<?=js_url("bootstrap.file-input")?>></script>
<script src=<?=js_url("ajaxfileupload")?>></script>
<script src=<?=zoombox_js()?>></script>
<script src=<?=js_url("alertify.min")?>></script>

<script type="text/javascript">

    $("a.zoombox").zoombox();

    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();
    <?php if(isset($msg)):?>
        alertify.error("Extension du fichier invalide");
    <?php endif ?>
    function deleteFile(name){
        $("#validate").click(function(){
            $.ajax({
                url: 'http://localhost/residanat/admin/deleteFile',
                type: 'post',
                data: 'file=' + name
            }).done(location.reload());
        });

    }

</script>
<!--file upload-->
<!--<script>
    $(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajaxFileUpload({
                url             :'admin/media',
                secureuri       :false,
                fileElementId   :'fichier',
                dataType        : 'JSON',
                data            : {
                    'title'             : $('#filename').val()
                },
                success : function (data, status)
                {
                    if(data.status != 'error')
                    {
                        $('#files').html('<p>Reloading files...</p>');
                        refresh_files();
                        $('#filename').val('');
                    }
                    alert(data.msg);
                }
            });
            return false;
        });
    });
    function refresh_files()
    {
        $.get('admin/media/')
            .success(function (data){
                $('#files').html(data);
            });
    }
</script>-->

</body>
</body>
</html>