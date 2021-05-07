<?php
$user = new UserController();
$myreservations = $user->myreservations();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include './views/includes/header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Airline</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($myreservations as $reservation) { ?>
                            <tr>
                                <td><?= $reservation['airline'] ?></td>
                                <td><?= $reservation['depart'] ?></td>
                                <td><?= $reservation['destination'] ?></td>
                                <td><?= $reservation['f_Date'] ?></td>
                                <td><?= $reservation['price'] ?></td>
                                <td value="<?= $reservation['flight_id'] ?>"><button class="btn btn-sm btn-danger delete_b" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Becareful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to cancel this reservation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="post" action="cancel">
                        <input id="hidden_input" type="hidden" name="flight_id" value="">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
       
    </script>
    <script>
     var buttons = document.querySelectorAll('.delete_b');
    [...buttons].map(element => element.addEventListener('click', function(event){
         document.getElementById('hidden_input').value=this.parentElement.getAttribute('value');
      } ))

    </script>
</body>

</html>