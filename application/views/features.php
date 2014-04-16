
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

   <div class="row featurette" id="login">
        <div class="col-md-7">
          <h2 class="featurette-heading">Login <span class="text-muted">Accéder à la rubrique resultat</span></h2>
          <p class="lead">Introduire votre numéro de convocation
                           et votre CIN pour les candidats Tunisiens ou le numéro du
                                         passeport pour les candidats étrangers </p>
        </div>

        <div class="col-md-5">
   
    <div class="row">
    <div class="col-md-8">
        <?php if(!isset($_SESSION['cin'])):?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
              <div class="panel-body">
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
        <?php endif?>
    </div>
 
</div>
        </div>
      </div>
     

      <hr class="featurette-divider">


    <!--    <div class="col-md-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>

      <hr class="featurette-divider">

     <!-- <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES --> 