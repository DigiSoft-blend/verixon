<?php require_once 'includes/header.php'; ?>

<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.html#">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/getsrtd">Verixons Web Terminal</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-4 col-md-3 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="index.html#">Register Here <span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
          <form method='POST' action='<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>' >
           <div class="container mb-4">
               <label for="name">Name</label>
             <input class="form-control" type="text" placeholder="Type Name"  name="name" required >
           </div>
           <div class="container mb-4">
               <label for="Reg Nom">Reg Nom</label>
             <input class="form-control" type="text" placeholder="Type Reg Nom"  name="regnom" required >
           </div>
           <div class="container mb-4">
                <label for="Department">Department</label>
             <input class="form-control" type="text" placeholder="Type Department"  name="department" required >
           </div>
           <div class="container mb-4">
             <label for="Faculty">Faculty</label>
             <input class="form-control" type="text" placeholder="Type Faculty"  name="faculty" >
           </div>
            <div class="container mt-4">
              <button class="btn btn-outline-success" type="submit" name="submit">Submit</button>
            </div>
           
          </form>
          </ul>
        </nav>

        <main role="main" class="col-sm-8 ml-sm-auto col-md-9 pt-3">
          <br><br><br>
          <h1>Havard University</h1>

         
          <h2>Student Records</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
             
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Reg Nom</th>
                  <th>Department</th>
                  <th>Faculty</th>
                  <th><th>Actions</th></th>
                </tr>
               
              </thead>
              <tbody>
              <?php foreach($data as $data): ?>
                <tr>
                <td><?php echo $data->id; ?></td>
                <td><?php echo $data->name; ?></td>
                <td><?php echo $data->regnom; ?></td>
                <td><?php echo $data->department; ?></td>
                <td><?php echo $data->faculty; ?></td>
                <td>
                  <td><a class="nav-link" href="updates?d=<?php echo $data->id ?>">Edit</a></td>
                  <td>
                    <form action="delete" method="POST" >
                      <input type="hidden" value="<?php echo $data->id ?>" name="delete_id">
                      <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                    </form>
                  </td>
                </td>
                </tr>
               <?php endforeach; ?> 
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../../assets/js/vendor/jquery-slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="http://getbootstrap.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

<?php require_once 'includes/footer.php'; ?>