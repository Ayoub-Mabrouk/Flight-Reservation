<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true && !isset($_SESSION['user_logged'])) {
} else {
  Redirect::to('login');
}
$flights = new FlightController();
$allres = $flights->allreservations();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
<?php include './views/includes/admin_header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 col-md-8 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Airline</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allres as $res) { ?>
                            <tr>
                            <td><?= $res['first_name'] ?></td>
                            <td><?= $res['last_name'] ?></td>
                                <td><?= $res['airline'] ?></td>
                                <td><?= $res['depart'] ?></td>
                                <td><?= $res['destination'] ?></td>
                                <td><?= $res['f_Date'] ?></td>
                                <td><?= $res['price'] ?></td>
                                <td><?= $res['capacity'] ?></td>                               
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>