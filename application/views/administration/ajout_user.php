<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/etudiant/");?>>Liste Etudiant</a></li>
                <li class="active"><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>List des choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Ajouter utilisateur</h1>
            <div class="col-sm-10 col-sm-offset-2">

                <form id="form" role="form" class="form-horizontal" action='<?=base_url()?>admin/user' method='post'>
                <div class="form-group">

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="login">Login</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="nom">Nom</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="prenom">Prénom</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="pass">Mot de passe</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="pass" placeholder="Mot de passe"  name="pass" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="pass2">Confirmer</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="pass2" placeholder="Confirmation mot de passe"
                                   name="pass2" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="mail">Email</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="mail" placeholder="Entrer email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="mail2">Confirmer Email</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="mail2" placeholder="Vérifier email" name="email2" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Permission :</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="media">Media</label><br/>
                            <input type="checkbox" name="media" id="media"/>
                        </div>
                        <div class="col-sm-3">
                            <label for="media">Etudiants</label><br/>
                            <input type="checkbox" name="etudiant" id="etudiant"/>
                        </div>
                        <div class="col-sm-3">
                            <label for="media">Administrateurs</label><br/>
                            <input type="checkbox" name="admin" id="admin"/>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5">
                        <input type="submit" class="btn btn-primary" value="Envoyer">
                    </div>
                </div>
                </form>
            </div>
    </div>
</div>
</div>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script>
    login = $('#login');
    login.focusout(function(){
        $.ajax({
            type : 'POST',
            url  : 'http://localhost/residanat/admin/verifLogin',
            cache : false,
            data : 'login='+login.val(),
            success : function(respond){
                if(respond==1)
                {
                    login.parent().removeClass('has-success').addClass('has-error');
                }else{
                    login.parent().removeClass('has-error').addClass('has-success');
                }
            }
        });
    });

    $('input[type="checkbox"]').bootstrapSwitch({
        'onColor' : 'success',
        'onText' : 'Oui',
        'offText' : 'Non'
    })

var envoie=true;
$('#mail2').keyup(function(){
    if ($("#mail").val() != $("#mail2").val())
    {
        envoie=false;
        $("#mail2").parent().addClass('has-error');
    }
    else{
        $("#mail2").parent().removeClass('has-error').addClass('has-success');
    }
});

$('#pass2').keyup(function(){
    if ($("#pass").val() != $("#pass2").val())
    {
        $("#pass2").parent().removeClass('has-success').addClass('has-error');
        envoie=false;
    }
    else
        $("#pass2").parent().removeClass('has-error').addClass('has-success');
});
</script>
</body>
</html>