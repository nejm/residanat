<!doctype html>
<html>
<head>
    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>
    <link rel="stylesheet" href=<?=css_url("signin");?>>
</head>
<body>
<div class="container">
 <h2 class="featurette-heading">Sign Up <span class="text-muted">Accéder au choix des spécialités </span></h2>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form role="form" class="form-horizontal"action='<?php echo base_url(); ?>signup/valider' method='post'>

            <div class="form-group">
                <label for="conv">N°Convocation</label>
                <input type="text" class="form-control" id="conv" name="Num_convocation" placeholder="Numéro de convocation" >
            </div>

            <div class="form-group">
                <label for="cin">N°CIN</label>
                <input type="text" class="form-control" id="cin" placeholder="Numéro de cin"  name="Num_cin"required>
            </div>

            <div class="form-group">
                <label for="mail">Email</label>
                <input type="email" class="form-control" id="mail" placeholder="Entrer email" name="email" required>
            </div>

            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="number" class="form-control" id="tel" placeholder="Numéro de téléphone"  name='tel'required>
            </div>

            <div class="form-group">
                <label>Adresse</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Enregistrer">
        </form>
          <?= validation_errors(); ?>
    </div>
    <div class="col-md-4"></div>
</div>
</div>
<script type="text/javascript" src=<?=js_url("jquery");?>></script>
<script type="text/javascript" src=<?=js_url("bootstrap.min");?>></script>
</body>
</html>