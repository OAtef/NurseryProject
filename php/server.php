<?php
include('db.php');

session_start();

// initializing variables
$email  = "";
$errors = array();
$userType = 0;

// REGISTER USER
if (isset($_POST['signup_user'])) {
    // receive all input values from the form
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $mobileNum = mysqli_real_escape_string($db, $_POST['mobileNumber']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
    $natinalID = mysqli_real_escape_string($db, $_POST['nationalID']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) { array_push($errors, "firstname is required"); }
    if (empty($lastname)) { array_push($errors, "lastname is required"); }
    if (empty($mobileNum)) { array_push($errors, "mobile number is required"); }
    if (empty($natinalID)) { array_push($errors, "natinalID is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($password_2)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        //$password = md5($password_1); //encrypt the password before saving in the database

        $signupquery = "INSERT INTO users (firstname, lastname, mobilenumber, email, password, nationalID, type)
        VALUES('$firstname', '$lastname', '$mobileNum', '$email', '$password_1', '$natinalID', '1')";
        $result = mysqli_query($db, $signupquery);
        if ($result) {
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password_1;
          $_SESSION['success'] = "You are now logged in";
          $signUpScript = "<script>Swal({
                                    type: 'success',
                                    title: 'Signed Up successfully',
                                    toast: true,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 3000
                                  })</script>";
        }
        else {
            array_push($errors, "error");
        }
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "email is required");
        
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $signinquery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $signinquery);
        if (mysqli_num_rows($results) == 1) {

            $type = mysqli_query($db, "SELECT type FROM users WHERE users.email='$email'");
            $result = mysqli_fetch_array($type);

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            if($result['type'] == 1){ // parent
              $_SESSION['userType'] = 1;
            }
            else if($result['type'] == 2){ // Nurse Manager
              $_SESSION['userType'] = 2;
            }
            else if($result['type'] == 3){ // CEO Manager
              $_SESSION['userType'] = 3;
            }
            else{
                array_push($errors, "the type asked for is not identified");
            }

            $_SESSION['success'] = "You are now logged in";
            $logedInScript = "<script>Swal({
                                      type: 'success',
                                      title: 'Signed in successfully',
                                      toast: true,
                                      position: 'top-right',
                                      showConfirmButton: false,
                                      timer: 3000
                                    })</script>";
        }else {
            array_push($errors, "<script>Swal({
                                      type: 'error',
                                      title: 'Oops...',
                                      text: 'Wrong email or password!',
                                    })</script>");
        }
    }
  }

  ?>
