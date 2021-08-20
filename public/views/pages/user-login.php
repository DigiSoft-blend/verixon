
<?php require_once 'includes/header.php'; ?>

<div class="container">
                    
<form class="form-signin mt-4" method="POST" action="/userlogin">
  <h2 class="form-signin-heading" style="text-align:center">Please login first</h2>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name='email'>

   <?php if(isset($_SESSION['wrong_password'])){?>
     <div style="color:red"> <?php echo $_SESSION['wrong_password']; ?>  <a href="usersignin">  Sign Up Here</a>  </div>
   <?php unset($_SESSION['wrong_password']); } ?>

   <?php if(isset($_SESSION['user_null'])){?>
     <div style="color:red"> <?php echo $_SESSION['user_null']; ?>  </div>
   <?php unset($_SESSION['user_null']); } ?>

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