<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Studenten Haus</title>
</head>

<body data-spy="scroll" data-target="#main-nav" id="home">
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" id="main-nav">
    <div class="container">
      <a href="index.php" class="navbar-brand">Studenten Haus</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#explore-head-section" class="nav-link">Service</a>
          </li>
          <li class="nav-item">
            <a href="#create-head-section" class="nav-link">Customer</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="signup.php" class="btn btn-outline-warning">
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="btn btn-warning">
              Log In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HOME SECTION -->
  <header id="home-section">
    <div class="overlay">
      <div class="home-inner container">
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
            <h1 class="display-4">
              Studentenhaus
            </h1>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <h4>Gebrauchte Waren</h4>
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <h4>Umzugsservices</h4>
              </div>
            </div>

            <div class="d-flex">
              <div class="p-4 align-self-start">
                <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                <h4>Von Studenten zu Studenten bei Studenten</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card bg-warning text-center card-form">
              <div class="card-body">
              <?php include('errors.php'); ?>
                <h3>Sign Up Today</h3>
                <p>Join other Student!!</p>
                <form action="signup.php" method="POST">
                  <!-- 
                    <div class="form-group form-row">
                    <div class="col">
                        <input class="form-control form-control-md" type="text" name="vorname" placeholder="Vorname">
                    </div>
                    <div class="col">
                        <input class="form-control form-control-md" type="text" name="nachname" placeholder="Nachname">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-md" name="email" placeholder="Email">
                  </div>
		              <div class="form-group">
                    <input type="text" class="form-control form-control-md" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                      <input type="handy" class="form-control form-control-md" name="telefon" placeholder="Telefon">
                    </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-md" name="password_1" placeholder="Passwort">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-md" name="password_2" placeholder="Passwort bestätigen">
                  </div>
                  <input type="submit" value="Submit" class="btn btn-outline-light btn-block"> -->

                  <div class="form-group form-row">
                  <div class="col">
          
                    <input class="form-control form-control-md" type="text" name="vorname" placeholder="Vorname">
                  </div>
                  <div class="col"> 
                    
                    <input class="form-control form-control-md" type="text" name="nachname" placeholder="Nachname">
                  </div>
                </div>
                <div class="form-group">
                  
                  <input type="email" class="form-control form-control-md" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control form-control-md" name="telefon" placeholder="Telefon">
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control form-control-md" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control form-control-md" name="password_1" placeholder="Passwort">
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control form-control-md" name="password_2" placeholder="Passwort bestätigen">
                </div>
                <input type="submit" value="Submit" class="btn btn-outline-light btn-block" name="reg_user">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- SERVICE HEAD-->
  <section id="explore-head-section">
    <div class="container">
      <div class="row">
        <div class="col text-center py-5">
          <h2 class="display-4 text-dark active">So einfach ist Umziehen mit Studenten Haus!</h2>
          <p class="">Erfahren Sie, wie entspannt ein Umzug sein kann.</p>
          <a href="#" class="btn btn-outline-secondary">Mehr erfahren</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICE SECTION -->
  <section id="explore-section" class="bg-light text-muted py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/umzug.jpg" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
            <div class="col-md-6">
              <div class='display-4'>3 Schritte zu einem entspannten Umzug</div>
	      <br>
	    
              <div class="d-flex">
                <div class="p-4 align-self-start">
                  <h4>1. Anmelden</h4>
                </div>
              </div>
              
	    
              <div class="d-flex">
                <div class="p-4 align-self-start">
                  <h4>2. Umzugsdaten eintragen</h4>
                </div>
              </div>
              
	      
              <div class="d-flex">
                <div class="p-4 align-self-end">
                  <h4>3. Zürucklehnen</h4>
                </div>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- CUSTOMER HEAD -->
  <section id="create-head-section" class="bg-white">
    <div class="container">
      <div class="row">
	      <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/secondhand1.png" alt="" class="img-fluid mb-4 rounded-circle">
        </div>
        <div class="col text-center py-5">
          <h2 class="display-4 text-secondary">Neue Services!!</h2>
          <p class="lead text-secondary">Studentkleinanzeigen</p>
          <a href="login.php" class="btn btn-outline-dark">Mehr erfahren</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CUSTOMER SECTION -->
  <section id="authors" class="my-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="info-header mb-5">
              <h1 class="text-primary pb-3"></h1>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <img src="img/person1.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                <h3 class="text-primary active">Sara Bernhardt</h3>
                <h5 class="text-dark">TU Berlin</h5>
                <p class="text-muted font-italic">„Kompetent, sauber und zuverlässig. Hervorragendes Preis-Leistungs-Verhältnis."</p>
              </div>
            </div>
          </div>
  
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <img src="img/person2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                <h3 class="text-primary active">Kimberley Clark</h3>
                <h5 class="text-dark">TH Brandenburg</h5>
                <p class="text-muted font-italic">„Die Mitarbeiter sind sehr nett und kundenorientiert.“</p>
              </div>
            </div>
          </div>
  
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <img src="img/person3.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                <h3 class="text-primary active">John Doe</h3>
                <h5 class="text-dark">Universität Potsdam</h5>
                <p class="text-muted font-italic">„Super Preis-Leistungsverhältnis! Sehr Empfehlenswert!"</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center py-4">
          <h3>Studenten Haus </h3>
          <p>Copyright &copy;
            <span id="year"></span>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    // Init Scrollspy
    $('body').scrollspy({ target: '#main-nav' });

    // Smooth Scrolling
    $("#main-nav a").on('click', function (event) {
      if (this.hash !== "") {
        event.preventDefault();

        const hash = this.hash;

        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function () {

          window.location.hash = hash;
        });
      }
    });
  </script>
</body>

</html>
