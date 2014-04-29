<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/etudiant/")?>>Ajouter Etudiant</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Etudiant</h1>
            <form class="form-horizontal">
                <fieldset>
                    <legend>Filtrer</legend>
                        <!--
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cin">CIN</label>
                        <div class="col-md-4">
                            <input id="cin" name="cin" type="search" placeholder="CIN" class="form-control input-md">
                            <p class="help-block">saisissez le cin</p>
                        </div>
                    </div>

                    <!-- Text input-->
                        <div class="col-md-2">
                            <input id="name" name="name" type="text" placeholder="Nom" class="form-control input-sm">
                        </div>
                    <div class="col-md-1">
                        Moyenne
                    </div>
                    <div class="col-md-1">
                        <input id="moy" type="text" class="span2" data-slider-min="0"
                        data-slider-max="20" data-slider-step="0.5" data-slider-value="[0,20]"/>
                     </div>
                    <!-- Multiple Radios (inline) -
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="0">
                                <input type="radio" name="choix" id="0" value="1" checked="checked">
                                Tous
                            </label>
                            <label class="radio-inline" for="1">
                                <input type="radio" name="choix" id="1" value="2">
                                Fait le choix
                            </label>
                            <label class="radio-inline" for="2">
                                <input type="radio" name="choix" id="2" value="3">
                                N'as pas fait le choix
                            </label>
                        </div>
                    </div>

                    <!-- Button
                    <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                        <div class="col-md-4">
                            <button id="" name="" class="btn btn-info">Envoyer</button>
                        </div>
                    </div>-->

                </fieldset>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>CIN</th>
                        <th>Nom & Prénom</th>
                        <th>Moyenne</th>
                    </tr>
                </thead>
                <tbody id="result">

                </tbody>
            </table>

        </div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-slider")?>></script>
<script>
    var moymin=0,moymax=20;
    $("#moy").slider({});
    $("#moy").on('slide', function(slideEvt) {
        moymin=slideEvt.value[0];
        moymax=slideEvt.value[1];
    });

    $("#name").keyup(function(){
        if($("#name").val().length > 3){
            $.ajax({
                type: "post",
                url: "http://localhost/residanat/admin/recherche",
                cache: false,
                data:'name='+$("#name").val()+'&moymin='+moymin+'&moymax='+moymax,
                success: function(response){
                    $('#result').empty();
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        try{
                            var items=[];
                            $.each(obj, function(i,val){
                                items.push('<tr><td>'+(val.cin)+
                                    '</td><td>'+(val.nom)+
                                    '</td><td>'+(Math.round(val.moyenne*Math.pow(10,2))/Math.pow(10,2))+
                                    '</td></tr>');
                            });
                            $('#result').append.apply($('#result'), items);
                        }catch(e) {
                            $('#result').html("Aucune résultat");
                        }
                    }else{
                        $('#result').html($('<li/>').text("Aucune résultat"));
                    }
                },
                error: function(){
                    alert('Error while request..');
                }
            });
        }
        return false;
    });
</script>
</body>
</html>