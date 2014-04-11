 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=<?=js_url("bootstrap.min")?>></script>
   <!-- <script src=<?=js_url("docs.min")?>></script>
    <script type="text/javascript" src=<?=js_url("specialite");?>></script>-->
    <script>
    $(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    console.log("click");

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});
    </script>
    </body>
  </html>
