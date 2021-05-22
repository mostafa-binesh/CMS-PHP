 <?php include "includes/header.php"; ?>


 <!-- Navigation -->

 <?php include "includes/navigation.php"; ?>


 <!-- Page Content -->
 <div class="container">

     <section id="login">
         <div class="container">
             <div class="row">
                 <div class="col-xs-6 col-xs-offset-3">
                     <?php
                        if (isset($_POST['submit'])) {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = mysqli_real_escape_string($conn, $_POST['password']);
                            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                            if ($password == $password2) {
                                $query = "SELECT * FROM users WHERE username = '{$username}' OR user_email = '{$email}'";
                                $result = mysqli_query($conn, $query);
                                if (!$result) {
                                    echo "<div class=' alert alert-danger'>FAILED TO CONNECT TO THE DATABASE </div>";
                                    echo mysqli_error($conn);
                                } else if (mysqli_num_rows($result) > 0) {
                                    echo "<div class=' alert alert-danger'>SUCH USERNAME OR PASSWORD ALREADY EXIST!</div>";
                                } else {
                                    $password = password_hash($password,PASSWORD_ARGON2ID);
                                    $query = "INSERT INTO 
                                    `users`(`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) 
                                    VALUES ('{$username}','{$password}','{$firstname}','{$lastname}','{$email}','subscriber')";
                                    $result = mysqli_query($conn,$query);
                                    if(!$result){
                                        echo "<div class=' alert alert-danger'>FAILED TO REGISTER DATA INTO DATABASE</div>";
                                    } else {
                                        echo "<div class=' alert alert-success'>YOU HAVE BEEN REGISTERED!</div>";
                                    }
                                }
                            }
                        }




                        ?>
                     <!-- <div class=" alert alert-danger">FAILED TO CONNECT TO THE DATABASE</div> -->
                     <div class="form-wrap">
                         <h1>Register</h1>
                         <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                             <div class="form-group">
                                 <label for="username" class="sr-only">username</label>
                                 <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                             </div>
                             <div class="form-group">
                                 <label for="email" class="sr-only">Email</label>
                                 <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                             </div>
                             <div class="form-group">
                                 <label for="password" class="sr-only">Password</label>
                                 <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                             </div>
                             <div class="form-group">
                                 <label for="password2" class="sr-only">Password</label>
                                 <input type="password" name="password2" id="key" class="form-control" placeholder="Repeat Password">
                             </div>
                             <div class="form-group">
                                 <label for="username" class="sr-only">First Name</label>
                                 <input type="text" name="firstname" id="username" class="form-control" placeholder="Your First Name">
                             </div>
                             <div class="form-group">
                                 <label for="username" class="sr-only">Last Name</label>
                                 <input type="text" name="lastname" id="username" class="form-control" placeholder="Your Last Name">
                             </div>

                             <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                         </form>

                     </div>
                 </div> <!-- /.col-xs-12 -->
             </div> <!-- /.row -->
         </div> <!-- /.container -->
     </section>


     <hr>



     <?php include "includes/footer.php"; ?>