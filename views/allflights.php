<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true && !isset($_SESSION['user_logged'])) {
} else {
  Redirect::to('login');
}
$flight = new FlightController();
$allflights = $flight->getAllFlights();

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
        <div class="col-xxl-10 col-md-8 mx-auto d-flex justify-content-end">
            <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-success">Add Flight</button>
        </div>
        <div class="row">
            <div class="col-xxl-10 col-md-8 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Airline</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allflights as $flight) { ?>
                            <tr>
                                <td><?= $flight['airline'] ?></td>
                                <td><?= $flight['depart'] ?></td>
                                <td><?= $flight['destination'] ?></td>
                                <td><?= $flight['f_Date'] ?></td>
                                <td><?= $flight['price'] ?></td>
                                <td><?= $flight['capacity'] ?></td>
                                <td value="<?= $flight['flight_id'] ?>"><button class="btn btn-sm btn-danger delete_b" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash-alt"></i></button></td>
                                <td value="<?= $flight['flight_id'] ?>"><button class="btn btn-sm btn-success edit_b" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                    <form method="post" action="delete-flight">
                        <input id="hidden_input" type="hidden" name="flight_id" value="">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="edit-flight">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Flight</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Airline:</label>
                            <input type="text" name="airline" class="form-control airline" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Depart:</label>
                            <input type="text" name="depart" class="form-control depart" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Destination:</label>
                            <input type="text" name="destination" class="form-control destination" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Date:</label>
                            <input type="datetime-local" name="date" class="form-control date" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" name="price" class="form-control price" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Capacity:</label>
                            <input type="text" name="capacity" class="form-control capacity" id="recipient-name">
                        </div>
                        <input id="hidden_input_edit" type="hidden" name="flight_id" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Flight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="addflight">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Airline:</label>
                            <input type="text" name="airline" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Depart:</label>
                            <input type="text" name="depart" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Destination:</label>
                            <input type="text" name="destination" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Date:</label>
                            <input type="datetime-local" name="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="number" name="price" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Capacity:</label>
                            <input type="number" name="capacity" class="form-control" id="recipient-name">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        var buttons = document.querySelectorAll('.delete_b');
        [...buttons].map(element => element.addEventListener('click', function(event) {
            document.getElementById('hidden_input').value = this.parentElement.getAttribute('value');
        }))
        var editbuttons = document.querySelectorAll('.edit_b');
        var linedata;
        [...editbuttons].map(element => element.addEventListener('click', function(event) {

            linedata = this.parentElement.parentElement.children;
            document.querySelector('.airline').value = linedata[0].innerHTML;
            document.querySelector('.depart').value = linedata[1].innerHTML;
            document.querySelector('.destination').value = linedata[2].innerHTML;
            document.querySelector('.date').value = linedata[3].innerHTML.replace(" ", "T").slice(0, -3);
            document.querySelector('.price').value = linedata[4].innerHTML;
            document.querySelector('.capacity').value = linedata[5].innerHTML;
            document.getElementById('hidden_input_edit').value = this.parentElement.getAttribute('value');
        }))
    </script>
</body>

</html>