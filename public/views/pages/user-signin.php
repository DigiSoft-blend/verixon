
<?php require_once 'includes/header.php'; ?>

<div class="container">
                    
<form class="form-signin mt-4" method="POST" action="/usersignin">
                   <?php if(isset($_SESSION['hashedpassword'])){
                     echo $_SESSION['hashedpassword'];
                     unset($_SESSION['hashedpassword']);
                     } ?>
  <h2 class="form-signin-heading" style="text-align:center">Please sign in first</h2>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" id="inputEmail" class="form-control" placeholder="Email address"  autofocus name='email'>
  
   <?php if(isset($_SESSION['registration success'])){?>
     <div style="color:green"> <?php echo $_SESSION['registration success']; ?>  </div>
   <?php unset($_SESSION['registration success']); } ?>

   <?php if(isset($_SESSION['message'])){?>
     <div style="color:red"> <?php echo $_SESSION['message']; ?>  </div>
   <?php unset($_SESSION['message']); } ?>

  <br>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name='password'>
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name='submit'>Sign in</button>
</form>

</div> <!-- /container -->

<?php require_once 'includes/footer.php'; ?>