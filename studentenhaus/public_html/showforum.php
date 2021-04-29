<?php
    $db = mysqli_connect('localhost', 'root', '', 'studentenhaus');
    $query = "SELECT s.vorname as name, s.nachname as nachname, s.telefon, f.* FROM fileup f JOIN student s ON f.student_id = s.student_id";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
				//echo json_encode($row);
?>

    <div class="col-12 col-md-3">
        <div class="card">
            <img class="card-img-top" src="images/<?php echo $row["image"]; ?>" alt="Card image cap" style="height:225px">

            <div class="card-body">
                <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                <p class="card-text text-secondary"><?php echo $row["name"]; ?> <?php echo $row["nachname"]; ?></p>
                <p class="card-text text-secondary">Bei Interesse <?php echo $row["telefon"]; ?></p>
                
           
            </div>
        </div>
    </div>

<?php
        }
    }
?>