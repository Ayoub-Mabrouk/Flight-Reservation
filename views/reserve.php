<?php
if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true && !isset($_SESSION['admin'])) {
} else {
  Redirect::to('login');
}

require_once './autoload.php';
require_once './controllers/UserController.php';
$roundtrip = (isset($_POST['roundtrip']) && $_POST['roundtrip'] == 'roundtrip') ? true : false;

if (isset($_POST['passenger_count']) && $_POST['passenger_count'] > 0) {

    $count = $_POST['passenger_count'];
} else {
    if (isset($_POST['flight_id'])) {

        
        $new_reservation = new UserController();
        $new_reservation->reserve($_SESSION['id'], $_POST['flight_id'], $roundtrip);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include './views/includes/header.php' ?>
    <div class="container">
        <form method="post" action="reservemulti">
            <?php if (!empty($_POST['passenger_count']) && $count > 0) { ?>

                <?php for ($i = 0; $i < $count; $i++) { ?>
                    <div class="row justify-content-center">
                        <div class="card">
                            <p class="gy-4 card-header">passenger number <?= $i + 1 ?></p>
                            <div class="card-body bg-light">

                                <div class="col-sm-8 col-xxl-4">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input name="firstname[]" type="text" class="form-control" id="validationCustom01" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-sm-8 col-xxl-4">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input name="lastname[]" type="text" class="form-control" id="validationCustom02" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xxl-4">
                                    <label for="validationCustom03" class="form-label">Birth date</label>
                                    <input name="birthdate[]" type="date" class="form-control" id="validationCustom03" required>
                                    
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <div class="col-12">

                    <input type="hidden" name="flight_id" value="<?= $_POST['flight_id'] ?>">
                    <button class="btn btn-primary" name="add_passenger" type="submit">Submit form</button>
                </div>
        </form>
    <?php } else { ?>
        <?php include './views/includes/reservation_success.php'  ?>
    <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>