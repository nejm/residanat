<div class="container marketing">

 <div class="row featurette ">
        <div class="col-md-7">
          <h2 class="featurette-heading">Resultat</h2>
           <h2><span class="text-muted">Résidanat en médecine :</span></h2>
          <div class="lead jumbotron">
          <?php if($resultat !=false)
          foreach($resultat as $key ) {
           		echo "Le numéro de convocation :".$key->num ."<br>";
           		echo "base: ".$key->base."<br>";
           		echo "pm: ".$key->pm."<br>";
           		echo "pc: ".$key->pc."<br>";
           		echo "sb11 ".$key->sb11."<br>";
           		echo "md11 ".$key->md11."<br>";
           		echo "ch11 ".$key->ch11."<br>";
           		echo "sb20 ".$key->sb20."<br>";
           		echo "md20 ".$key->md20."<br>";
           		echo "ch20 ".$key->ch20."<br>";
           		echo "moyenne ".$key->moyenne."<br>";

           		if($key->moyenne>10){
           			echo "Felicitation vous ête admis"."<br>";
           		}
           		else{
           			echo "malheureusement vous n'ête pas admis ";
           		}
            }?>
          </div>
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
