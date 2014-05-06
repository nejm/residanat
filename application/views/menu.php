
 <div class="ui inverted page grid masthead segment">
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">Résidanat</div>
        <div class="right menu">
          <div class="ui top right pointing mobile dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">choix résidanat</a>
              <a class="item">lien utliles</a>
              <a class="item">Login</a>
            </div>
          </div>
          
          <a class="item" href="<?php echo base_url(); ?>">Acceuil</a>
          <a class="item" href="<?php echo base_url(); ?>textes_reglementaire/">Textes Règlementaire</a>
          <a class="item">Collège et formation</a>
          <a class="item">Stage à l'étranger</a>
           <div class="ui dropdown item">
            resultat
             <div class="menu">

                  <a class="item"  style="font-size:100%" href="<?php echo base_url(); ?>resultat/">résultat</a>
                  <?php if(!isset($_SESSION['cin'])):?>
                  
                    <a data-toggle="modal" class="item" href="#loginModal" data-target="#myModalResultat" style="font-size: 100%;">Log in</a>
                  <?php else:?>
                    <a class="item" href='<?php echo base_url(); ?>login/logout' style="font-size: 100%;">logout</a>
                  <?php endif?>
              </div>
          </div>

          <a class="item">Plan du site</a>

          <div class="ui dropdown item">
            choix 2014
          <div class="menu">
          <a class="item"  style="font-size:100%" href="<?php echo base_url(); ?>info_specialite/">specialite</a>
          <?php if(!isset($_SESSION['cinSpec'])):?>
            <a class="item" href=""  data-target="#myModal1" style="font-size: 100%;"  data-toggle="modal" >signup</a>
            <a data-toggle="modal" class="item" href="#loginModal" data-target="#myModal" style="font-size: 100%;">Log in</a>
          <?php else:?>
            <a class="ui dropdown item" style="font-size: 100%;" href="<?php echo base_url(); ?>specialite">choix</a>
            <a class="item" href='<?php echo base_url(); ?>loginSpecialite/logout' style="font-size: 100%;">logout</a>
          <?php endif?>
          </div>
          </div>

        </div>

      </div>
       <img src=<?=img_url("doctor.png");?> class="ui medium image">
      <div class="ui transition information">
        <h1 class="ui inverted header">
          Résidanat en médecine
        </h1>
        <p style="font-size:20px">Faire votre choix de spécialité </p>
       
      </div>
    </div>
  </div>


<!--modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign Up <span class="text-muted">Accéder au choix des spécialités </span></h4>
      </div>
      <div class="modal-body">
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
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-primary" value="Enregistrer">
        </form>
          <?= validation_errors(); ?>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h3>Please Log In</h3>
      </div>
      <div class="modal-body">
        
      <form role="form" action='<?php echo base_url(); ?>loginSpecialite/residant' method='post' name='process'>
        <div class="form-group">
          <label for="inputUsernameEmail"> CIN</label>
          <input type="text" class="form-control" id="inputUsernameEmail" name="cin">
        </div>
        <div class="form-group">
          <label for="inputPassword">Mot de passe</label>
          <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="checkbox pull-right">
          <label>
            <input type="checkbox">
            Remember me </label>
        </div>
        
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn btn-primary">
          Log In
        </button>
         </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalResultat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h3>Please Log In</h3>
      </div>
      <div class="modal-body">
                 <form action='<?php echo base_url(); ?>login/user' method='post' name='process'>
                        <fieldset>
                    <div class="form-group">
                      <input class="form-control" placeholder="CIN" name="cin" type="text">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="numéro d'inscription" name="Num_inscription" type="password" >
                  </div>
                  <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                </fieldset>
                  </form>
      </div>
</div>
</div>
</div>
