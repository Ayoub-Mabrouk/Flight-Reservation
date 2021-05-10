<?php
$user= new User();
if(isset($_POST['submit'])){
$user->register($_POST);
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
    <style>
        #intro {
           
            background-image: url("./images/registerbg.jpg") ;
            height: 100vh;
            background-position: center;
            background-size: cover;
            
        }
    </style>
</head>

<div id="intro" class="bg-image shadow-2-strong">

    <div class="container  ">
        <div style="height: 100vh" class="row col-xxl-12 align-items-center justify-content-center">
            <div class="row col-xxl-6">
                <form method="post" action="">
                <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">First Name</label>
                        <input name="firstname" type="text" id="form1Example2" class="form-control" />

                    </div>
                <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Last Name</label>
                        <input name="lastname" type="text" id="form1Example2" class="form-control" />

                    </div>
                <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Birth date</label>
                        <input name="birthdate" type="date" id="form1Example2" class="form-control" />

                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example1">Email address</label>
                        <input name="email" type="email" id="form1Example1" class="form-control" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2">Password</label>
                        <input name="password" type="password" id="form1Example2" class="form-control" />

                    </div>
                    
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                       

                        <div class="col d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="login">Login</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>