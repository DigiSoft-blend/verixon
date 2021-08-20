
<?php require_once 'includes/header.php'; ?>

<header>
     
      <div class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
          <a href="/" class="navbar-brand">PHP GURU</a>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1  class="display-3" style="color:tomato; font-weight: bolder; font-style: oblique;">Access Denied, Unauthorised !</h1>
          <span><?php echo _VERSION ?></span>
          <p class="lead mt-2">Verixon is an open source PHP framwork for beginners, <br> written and managed by <span style="color: teal;"><?php echo _AUTHOR ?></span></p>
          <hr>
          <div class="row">
            <div class="col-md-6 mt-2"><p><a class="btn-lg btn-default" href="/getsrtd" role="button" style="text-decoration: none;">Getting Started</a></div>
            <div class="col-md-6 mt-2"><p><a class="btn-lg btn-default" href="https://www.php.net/docs.php"  style="text-decoration: none;">Learn PHP</a></p></div>
          </div>
        </div>
      
      </section>
     
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>

  <?php require_once 'includes/footer.php'; ?>
