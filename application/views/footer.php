<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src=<?= js_url("jquery") ?>></script>
<script src=<?= js_url("bootstrap.min") ?>></script>
<!-- <script src=<?= js_url("docs.min") ?>></script>
    <script type="text/javascript" src=<?= js_url("specialite"); ?>></script>-->
<script>
    $(document).ready(function () {
        $('a[href^="#"]').on('click', function (e) {
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" action='<?php echo base_url(); ?>signup/valider'
                      method='post'>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Num Convocation</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="conv" name="Num_convocation"
                                   placeholder="Numéro de convocation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Num CIN</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="cin" placeholder="Numéro de cin" name="Num_cin"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">E-mail</label>

                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="mail" placeholder="Entrer Email" name="email"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">E-mail</label>

                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="mailv" placeholder="Vérifier email" name="email"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Téléphone</label>

                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="tel" placeholder="Numéro de téléphone"
                                   name='tel' required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
