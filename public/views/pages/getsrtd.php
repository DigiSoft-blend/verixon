<?php require_once 'includes/header.php'; ?>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.html#">Verixons Web Interface : <span style="color:gray"> Not available on production stage</span></a>
      <a href="/loggedin" class="navbar-brand">User Page</a>
      <a href="/userlogin" class="navbar-brand" >Login</a>
      <a href="/usersignin" class="navbar-brand">SignUp</a>
    </nav>

    <main role="main" class="container">
      <div class="row">
            <div class="col-md-8">
                <div class="jumbotron">
                <h1>About <span style="color:tomato"><?php echo _APPNAME ?></span></h1>
                
                <p class="lead">Verixon is an open source  MVC php framwork for you. Create interesting web applications with ease using Verixon.
                 here is a student record CRUD created using Verixon. <a href="<?php echo htmlspecialchars('/todo');  ?>">Student Record</a>
                </p>
                <p class="lead" style="font-size:17px"> <span style="color:brown"> Costomise Your Verixon App:</span> Enter a unique id to generate your App key, Register your unique id and generated key in verixons config.php located at <span style="color:maroon"><?php echo CONFIG_PATH; ?></span></p>
                
                 <div class="row">
                 <div class="col-md-6">
                  <div style="color:maroon; font-size:14px">
                    <p  style="color:blue">Generated key</p>
                    <?php if(isset($_SESSION['key'])){?>
                     <div style="error-message"> <?php echo $_SESSION['key']; ?>  </div>
                    <?php unset($_SESSION['key']); } ?>
                  </div>
                  </div>
                  <div class="col-md-6">
                 
                  </div>
                  <hr>
                 </div>
                 
                
                <div class="row mt-3">
                  <div class="col-sm-8">
                    <form class="form-inline mt-2 mt-md-0" method="POST" action="/getsrtd">
                      <input class="form-control mr-sm-1" type="text" placeholder="Enter a unique Id" name="key" required>
                      <button class="btn btn-outline-success my-2 my-sm-2" type="submit" name="submit">Key generate</button>
                    </form>
                  </div>
                  <div class="col-sm-4" style="text-align:center">
                    <form class="form-inline  mt-md-0" method="POST" action="/migrate">
                      <input class="form-control mr-sm-1" type="hidden" name="verixonmigrat" value="1" required>
                      <button class="btn btn-primary my-2 my-sm-2" type="submit" name="submit">Migrate Verixons DB Table</button>
                    </form>
                    <p class="" style="font-size:12px; color:red">
                    <span style="color:green">
                        <?php if(isset($_SESSION['migrated'])){
                         echo  $_SESSION['migrated'];  
                         unset($_SESSION['migrated']);
                        }?>
                    </span>
                    Notic! Verixons Table can only be created once. 
                    </p>
                  </div>
                </div>  
                <a class="btn btn-lg btn-primary" href="/" role="button" style="background-color:black">Exit &raquo;</a>
                <a class="lead btn btn-lg btn-danger" href="/migrateUserTables" role="button">Migrate User Tables &raquo;</a>
                </div>
            </div>
            <div class="col-md-4">
                <br><br>
              <div class="mt-4" style="background-color:black; outline:maroon solid 1px; text-align:center">
                <p class="lead mt-4" style="color:cyan;font-size:14px;">
                <?php if(isset($_SESSION['success_message'])){
                    echo  $_SESSION['success_message'];  
                    unset($_SESSION['success_message']);
                }?> 
                <?php if(isset($_SESSION['controller_created'])){
                    echo  $_SESSION['controller_created'];  
                    unset($_SESSION['controller_created']);
                }?>
                <?php if(isset($_SESSION['table_created'])){
                    echo  $_SESSION['table_created'];  
                    unset($_SESSION['table_created']);
                }?>
                <?php if(isset($_SESSION['view_created'])){
                    echo  $_SESSION['view_created'];  
                    unset($_SESSION['view_created']);
                }?>
                <?php if(isset($_SESSION['migrated_tables'])){
                  echo  $_SESSION['migrated_tables'];  
                  unset($_SESSION['migrated_tables']);
                }?>
                <hr>
               </p> 

               <form class="form-inline  mt-md-0" method='POST' action='/createDatabase' style="outline:black solid 1px; padding:30px; background-color:rgb(8, 2, 22);">
                    <input class="form-control mr-sm-1" type="text" placeholder="Creat database" name="database" required>
                    <button class="btn btn-outline-danger my-2 my-sm-2" type="submit" name="submit">Enter</button>
               </form>

              </div>
           

            <form class="form-inline  mt-md-0" method='POST' action='/createController' style="outline:black solid 1px; padding:30px; background-color:gray">
                    <label for=""></label> &nbsp
                    <input class="form-control mr-sm-1" type="text" placeholder="Creat controller" name="controller" required>
                    <button class="btn btn-danger my-2 my-sm-2" type="submit" name="submit">Enter</button>
            </form>

            <form class="form-inline  mt-md-0" method='POST' action='/createTable' style="outline:black solid 1px; padding:30px; background-color:gray">
                    <label for=""></label> &nbsp 
                    <input class="form-control mr-sm-1" type="text" placeholder="Create table" name="tableB" required>
                    <button class="btn btn-danger my-2 my-sm-2" type="submit" name="submit">Enter</button>
            </form>

            <form class="form-inline  mt-md-0" method='POST' action='/createView' style="outline:black solid 1px; padding:30px; background-color:gray">
                    <label for=""></label> &nbsp
                    <input class="form-control mr-sm-1" type="text" placeholder="Create view" name="view" required>
                    <button class="btn btn-danger my-2 my-sm-2" type="submit" name="submit">Enter</button>
            </form>
                   
            </div>

      </div>  
    </main>
    <?php require_once 'includes/footer.php'; ?>