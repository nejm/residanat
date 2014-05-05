<div class="container marketing">
      <!-- START THE FEATURETTES -->

     
<!--
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
-->

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




  

      <div class="row featurette ">
        <div class="col-md-7">
          <h2 class="featurette-heading">Acceuil</h2>
           <h2><span class="text-muted">Résidanat en médecine :</span></h2>
          <p class="lead jumbotron">
            Le concours de résidanat en médecine est une épreuve que doit passer tout médecin voulant se spécialiser .<br> 

C’est une épreuve classante et le choix de la spécialité se fera en fonction de ce classement . <br>

Le résident est un fonctionnaire contractuel de l’état tunisien. Il dépend donc administrativement des structures du Ministère de la Santé Publique, son statut obéit aux mêmes règles administratives que tous les autres fonctionnaires . <br>

La formation des spécialistes est de la responsabilité et se fait sous la supervision de structures dépendantes du ministère de la santé publique (les collèges) . <br>

Les collèges de spécialités sont responsables de la formation de l’ensemble des spécialistes (par voie du résidanat ou autre). <br>

Toutes les formes de formations autres que celles prévues dans le cursus du résidanat constituent une exception et un encouragement réservés aux plus méritants, en l’occurrence la formation des résidents à l’étranger qui doit être considérée comme un investissement de l’état.<br>
          </p>
        </div>
        <div class="col-md-5">
          <div style="height:600px; margin-top:150px">
              <div class="thumbnail alert-success">
                <div class="row">
        <div>
         <ul>
          <li><a href="#" ><h2 >Flash Infos</h2></a></li>
          <li><a href="#" ><h2>Postes 2014</h2></a></li>
          <li><a href="#" ><h2> Affectations précédentes</h2></a></li>
        </ul>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

              <div class="caption">
                <h3>Contacter nous</h3>
                <p>
                 
                    Adresse : Bab Saadoun 1006 Tunis
                    Tunisie<br>
                     

                    Tel: +(216-71) 577 000<br>
                    Fax: +(216 71) 574 486<br>

                    Email: msp@ministeres.tn<br>

                    Web: www.santetunisie.rns.tn
                 </p>
              </div>
              <img class="featurette-image img-responsive" src=<?=img_url("map.jpg");?> alt="Generic placeholder image">
          </div>
          </div>
          <div class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image" >
        </div>
      </div>

<hr class="featurette-divider">
