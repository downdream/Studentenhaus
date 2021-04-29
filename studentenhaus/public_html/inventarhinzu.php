<?php include ('server_inventar.php');?>
<?php include ('server.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Inventar</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="dashboard.php" class="navbar-brand">Studenten Haus</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="auftrag.php" class="nav-link">Auftrag</a>
          </li>
          <li class="nav-item px-2">
            <a href="inventar.php" class="nav-link active">Inventar</a>
          </li>
          <li class="nav-item px-2">
            <a href="forum.php" class="nav-link">Forum</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Welcome
							<?php  if (isset($_SESSION['username'])) : ?>
    		      <strong><?php echo $_SESSION['username']; ?></strong>
    	    	  <?php endif ?>
            </a>
            <div class="dropdown-menu">
              <a href="viewprofile.php" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-truck"></i> Inventar</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- SEARCH
  <section id="search" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Categories...">
            <div class="input-group-append">
              <button class="btn btn-success">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- Waren -->

		<br />
		<div class="container">
			<br />
			<h3 align="center">Waren Auswahl</a></h3>
      <div class="row">
        <?php
          $query = "SELECT * FROM Waren ORDER BY waren_id ASC";
          $result = mysqli_query($connect, $query);
          if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_array($result))
            {
          ?>	
        <div class="col-md-4 my-3">
          <form method="post" action="inventarhinzu.php?action=add&waren_id=<?php echo $row["waren_id"]; ?>">
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
              <img src="img/<?php echo $row["image"]; ?>" class="img-responsive" style="height:225px" /><br />

              <h4 class="text-info"><?php echo $row["name"]; ?></h4>

              <input type="number" name="quantity" value="1" min="0" max="100">

              <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

              <input type="submit" name="add_inventar" style="margin-top:5px;" class="btn btn-success" value="Add Inventar" />

            </div>
          </form>
        </div>
        <?php
            }
          }
        ?>
      </div>
			<div style="clear:both"></div>
			<br />
			<h3>Waren</h3>
        <form action="auftraghinzu.php" method="post">
          <table class="table table-bordered">
            <tr>
              <th width="70%">Waren Name</th>
              <th width="20%">Menge</th>
              <th width="5%">Aktion</th>

            </tr>
            <?php
            if(!empty($_SESSION["inventar"]))
            {
              $total = 0;
              foreach($_SESSION["inventar"] as $keys => $values)
              {
            ?>
            <tr>
              <td><?php echo $values["waren_name"]; ?></td>
              <td><?php echo $values["waren_quantity"]; ?></td>
              <td><a href="inventarhinzu.php?action=delete&waren_id=<?php echo $values["waren_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
            <?php
                $total = $total + ($values["waren_quantity"]);
              }
            ?>
            <tr>
              <td colspan="1">Total</td>
              <td align="middle"> <?php echo number_format($total); ?></td>
              <td><input type="submit" name="inventar_add" value="Inventar Hinzufügen"></td>
            </tr>
            
            
            
            </form>
            <?php
            }
            ?>
              
          </table>
        
        </form>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead text-center">
            Copyright &copy;
            <span id="year"></span>
            Studenten Haus
          </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="bootstrap-input-spinner.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>


  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>