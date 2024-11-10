<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Registartion Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"
        integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<?php
      if(isset($_GET['registration'])){
          // the the query parameters
         
         // DB conection for registration
         $conn = mysqli_connect("localhost","root","","ecomm_db");
         // Build the query
          $name = mysqli_real_escape_string($conn,$_GET['name']);
          $uname = mysqli_real_escape_string($conn,$_GET['uname']);
          $email = mysqli_real_escape_string($conn,$_GET['email']);
          $pass = mysqli_real_escape_string($conn,$_GET['pass']);
          $cpass = mysqli_real_escape_string($conn,$_GET['cpass']);
          $dob = mysqli_real_escape_string($conn,$_GET['dob']);
          $mobile_no = mysqli_real_escape_string($conn,$_GET['mobno']);
          $pass =hash('sha256',$pass);
         $sql = "INSERT INTO user_tbl(`fname`,`email`,`username`,`password`,`dob`,`mobile_no`) VALUES('$name','$uname','$email','$pass','$dob','$mobile_no')";
         // Execute the query
         mysqli_query($conn, $sql);
          echo "<script>
          swal('Good job!', 'You clicked the button!', 'success');
          </script>";
         mysqli_close($conn);

      }
    /* else{
        echo "no";
    } */
    ?>

<body>
    <form action="<?php
    echo $_SERVER['PHP_SELF']
    ?>" method="GET" class="w-50 offset-3 mt-3">
        <h1 class="text-center">Registartion Form</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" class="form-control" id="uname" name="uname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="pass" required>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpass" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="mb-3">
            <label for="mobno" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="mobno" name="mobno" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="checkbtn">
            <label class="form-check-label" for="checkbtn" required>terms &amp; Condition</label>
        </div>
        <input type="submit" class="btn btn-primary" name="registration" value="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>