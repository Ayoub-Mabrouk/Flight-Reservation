<?php
if(isset($_SESSION['user_logged']) && $_SESSION['user_logged']==true && !isset($_SESSION['admin'])){
 if(isset($_POST['search'])){
    $data = new FlightController();
    $flights = $data->searchflight($_POST['search']);
}
}
else {
  Redirect::to('login');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>

  <?php include './views/includes/header.php' ?>
  <body>
  <div class="container m-2">
  <h1><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></h1>
  </div>


  <div class="container">
    <div class="row justify-content-center ">

      <?php foreach ($flights as $flight) { ?>
        
          <div class="card m-5" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Airline: <?= $flight['airline'] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Depart: <?= $flight['depart'] ?></li>
              <li class="list-group-item">Destination: <?= $flight['destination'] ?></li>
              <li class="list-group-item">Date: <?= $flight['f_Date'] ?></li>
              <li class="list-group-item">Price: <?= $flight['price'] ?></li>
            </ul>
            <div class="card-body">
              <form method="post" action="reserve">

                <input type="hidden" name="flight_id" value="<?= $flight['flight_id'] ?>">
                <button name="submit" class="btn btn-outline-primary">Reserve</button>
<span class="form-check">
  <input class="form-check-input" type="checkbox" name="roundtrip" value="roundtrip" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  round-trip
  </label>
</span>
                <input name="passenger_count" type="number" class="form-control" placeholder="Passenger's count" id="validationCustom05" >


              </form>
            </div>
          </div>
        
      <?php } ?>

    </div>
    <div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>