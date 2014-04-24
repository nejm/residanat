<div class="container">
  <div class="row">

    <div class="main">

      <h3>Please Log In, or <a href="<?php echo base_url(); ?>signup">Sign Up</a></h3>

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
        <button type="submit" class="btn btn btn-primary">
          Log In
        </button>
      </form>
    
    </div>
    
  </div>
</div>