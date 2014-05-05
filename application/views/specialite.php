

<body>


<div class="col-md-6" style="height:800px;overflow-y:scroll">
    <div><p>Les Spécialités à choisir</p></div>
    <input type="search" onkeyup="filter(this)" />

    <ol class="simple_with_animation vertical" id="init">
    <?php 
        
        foreach ($spec as $key ) {
            
            echo "<li data-id='$key->id'> $key->libelle</li>";
            # code...
        }

    ?>
       
    </ol>

</div>


   


    <div class="col-md-6" style="max-height:800px;overflow-y:scroll">
    <div><p>Remplir la formulaire</p></div>
        <ol class="simple_with_animation vertical" id="cat" height="100px">
        <p>drop les spécialité ici</p>
         <?php 
        if($specChoisi!=false)
        foreach ($specChoisi as $key ) {
            
            echo "<li data-id='$key->id'> $key->libelle</li>";
            # code...
        }

    ?>
                           
        </ol>
    </div>
     <button type="submit" class="btn btn btn-primary" id="submit">envoyer</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
     
<script>
function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

    function filter(element) {
        var value = $(element).val();

        $("#init > li").each(function() {
            if ($(this).text().search(capitaliseFirstLetter(value)) > -1) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });
    }


$("#submit").click(function(){

    dataIDList = $('ol#cat li').map(function(){ 
    return $(this).data("id");
}).get();

 $.post("<?php echo base_url() ; ?>specialite/getData",{ idlist: dataIDList },function(idList){
    console.log(idList);
 });
})




</script>
   
  