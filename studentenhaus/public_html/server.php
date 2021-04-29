<?php
session_start();


// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'studentenhaus');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $vorname = mysqli_real_escape_string($db, $_POST['vorname']);
  $nachname = mysqli_real_escape_string($db, $_POST['nachname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($vorname)) { array_push($errors, "Vorname ist erforderlich"); }
  if (empty($nachname)) { array_push($errors, "Nachname ist erforderlich"); }
  if (empty($email)) { array_push($errors, "Email ist erforderlich"); }
  if (empty($username)) { array_push($errors, "Username ist erforderlich"); }
  if (empty($telefon)) { array_push($errors, "Telefon ist erforderlich"); }
  if (empty($password_1)) { array_push($errors, "Passwort ist erforderlich"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Die zwei Passwörter stimmen nicht überein");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Student WHERE username='$username' OR email='$email' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username existiert schon");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email existiert schon");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Student (vorname, nachname, email, username, telefon, password) 
  			  VALUES('$vorname', '$nachname', '$email', '$username', '$telefon', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Welcome!";
  	header('location: dashboard.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $passwort = mysqli_real_escape_string($db, $_POST['passwort']);
  
    if (empty($username)) {
        array_push($errors, "Username ist erforderlich");
    }
    if (empty($passwort)) {
        array_push($errors, "Passwort ist erforderlich");
    }
  
    if (count($errors) == 0) {
        $passwort = md5($passwort);
        $query = "SELECT student_id, username FROM Student WHERE username='$username' AND password='$passwort'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) > 0) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: dashboard.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }



  // MAKE AUFTRAG
  
  
if (isset($_POST['auftrag_add'])) {
$vorname = mysqli_real_escape_string($db, $_POST['vorname']);
$nachname = mysqli_real_escape_string($db, $_POST['nachname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$termin = mysqli_real_escape_string($db, $_POST['termin']);
$einzugsadress = mysqli_real_escape_string($db, $_POST['einzugsadress']);
$einzugsPLZ = mysqli_real_escape_string($db, $_POST['einzugsPLZ']);
$zieladress = mysqli_real_escape_string($db, $_POST['zieladress']);
$zielPLZ = mysqli_real_escape_string($db, $_POST['zielPLZ']);

                                
                                
                                
  if (empty($termin)) { array_push($errors, "Termin ist erforderlich"); }
  if (empty($einzugsadress)) { array_push($errors, "Einzugsadress ist erforderlich"); }
  if (empty($einzugsPLZ)) { array_push($errors, "Einzugs PLZ ist erforderlich"); }
  if (empty($zieladress)) { array_push($errors, "Zieladress ist erforderlich"); }
  if (empty($zielPLZ)) { array_push($errors, "Ziel PLZ ist erforderlich"); }
  if (empty($email)) {array_push($errors, "Email ist erforderlich");}
  if (empty($vorname)) { array_push($errors, "Vorname ist erforderlich"); }
  if (empty($nachname)) { array_push($errors, "Nachname ist erforderlich"); }

if (count($errors) == 0) {

  
    $query = "INSERT INTO `Status`(Bezahlung, Zustand) VALUES('0', 'Gerade abgestellt')";
#print $query;
    $query_1 = "SELECT student_id FROM Student WHERE email = '$email' AND nachname = '$nachname'";
#print $query_1;
    $result = mysqli_query($db, $query_1);
    $row = mysqli_fetch_row($result);
    #print_r($row);
    $student_id=$row[0];
    #print "StudId $student_id";
    $status = mysqli_query($db, $query);


  if (mysqli_num_rows($result) == 1) {
    $query_1 = "SELECT inventar_id FROM Inventar ORDER BY inventar_id desc LIMIT 0, 1";
    $result = mysqli_query ($db,$query_1);
    $row = mysqli_fetch_row($result);
    $lastID = $row[0];

    $query_2 = "SELECT status_id FROM Status ORDER BY status_id desc LIMIT 0, 1";
    $status = mysqli_query ($db,$query_2);
    $row = mysqli_fetch_row($status);
    $status_id = $row[0];

    $query = "INSERT INTO Auftrag(termin, einzugsadress, einzugsPLZ, zieladress, zielPLZ, student_id, inventar_id, status_id)
    VALUES('$termin', '$einzugsadress', '$einzugsPLZ', '$zieladress', '$zielPLZ', '$student_id', '$lastID', '$status_id')";


    $results = mysqli_query($db, $query);
    array_push($errors, "Vielen Dank!! Ihre Auftrag ist abgestellt.");
  }else {
    array_push($errors, "Bitte geben Sie die schon angemeldene Name und Email!!");
  }
}
 
}

// Make Inventar
if (isset($_POST['inventar_add'])) {  
$inventar = $_SESSION["inventar"];
  if(isset($inventar)) {
    $warenID = $inventar[0]["waren_id"];
    $menge = $inventar[0]["waren_quantity"];
    $query = "INSERT INTO Inventar (waren_id, menge) VALUES($warenID, $menge)";
    $results = mysqli_query($db, $query);

    for($i = 1; $i < count($inventar); $i++) {
      $warenID = $inventar[$i]["waren_id"];
      $menge = $inventar[$i]["waren_quantity"];
      $query = "INSERT INTO Inventar (inventar_id, waren_id, menge) SELECT inventar_id, $warenID, $menge FROM Inventar ORDER BY inventar_id desc LIMIT 0, 1";
      $results = mysqli_query($db, $query);
    }
  }
}
  ?>