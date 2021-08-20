
<?php require_once 'includes/header.php'; ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="todo">Back</a>
    </li>
  </ul>
</nav>

 <br><br><br>              
 <form class="form-signin mt-4" method='POST' action='<?php $_SERVER['PHP_SELF']; ?>' style="outline:gray solid 1px; padding:30px;">
 <h4 class="navbar-brand">Edit <span style="color:teal;"><?php echo $data->name ?>'s</span> Record</h4>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" class="form-control" value="<?php echo $data->name ?>" required autofocus name="name">
        <br>
        <label for="Reg Nom" class="sr-only">Reg Nom</label>
        <input type="text"  class="form-control" value="<?php echo $data->regnom ?>" required name="regnom">
        <br>
        <label for="Department" class="sr-only">Department</label>
        <input type="text"  class="form-control" value="<?php echo $data->department ?>" required name="department">
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="text"  class="form-control" value="<?php echo $data->faculty ?>" required name="faculty">
        <button class="btn btn-lg btn-success btn-block mt-4" type="submit" name="submit">Submit</button>
    </form>
 
<?php require_once 'includes/footer.php'; ?>