<!-- if logged in redirect to home page -->
<?php
session_start();
if(isset($_SESSION["user"])){ //if not login then redirect to login page
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarMate SignUp</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles3.css">
</head>
<body>
    <div class="container">
        <?php
        //checks what variable has currently print_r( mixed $expression [, bool $return ]): mixed
        // print_r($_POST);

        //checks if form submits isset( mixed $var [, mixed $... ]): bool
        if(isset($_POST["submit"])){
            $name =$_POST["name"];
            $email =$_POST["email"];
            $password =$_POST["password"];
            $repeatPassword =$_POST["repeat_password"];

            //encrypt password -- using hash function
            $password_hash = password_hash($password ,PASSWORD_DEFAULT); //name of algoritm(default)


            //if errors occur add into array
            $error = array();
            //if any thing is empty -- all fields are empty
            if(empty($name) OR empty($email) OR empty($password) OR empty($repeatPassword) ){
                array_push($error, "All fields are required.");
            }
            //validate email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($error, "Email is not valid.");
            }
            //validate password
            if(strlen($password) < 8 ){
                array_push($error, "Password must be at least 8 characers long.");
            }
            //validate repeat password == password
            if($password !== $repeatPassword){
                array_push($error, "Password does not match.");
            }
            //email already exists
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $result = mysqli_query($conn,$sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount > 0){
                array_push($error, "Email already exists.");
            }
            //count number of errors to validate and show error to user
            if(count($error) > 0){
                foreach($error as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }else{
                //if no error then insert the data into database
                
                //insertinto tablename(columns,columns) ...id is automatic and values will have placeholders(?)
                $sql = "INSERT INTO users (name, email, password ) VALUES(?,?,?)";     
                //init - Initializes a statement and returns an object for use with mysqli_stmt_prepare
                $stmt = mysqli_stmt_init($conn);
                $prepareSTMT = mysqli_stmt_prepare($stmt, $sql); //return true or false
                if($prepareSTMT){
                    mysqli_stmt_bind_param($stmt, "sss",$name,$email,$password_hash ); ///sss-string
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>SignUp successfull, Welcome to CarMate!</div>";
                }else{
                    die("Something went wrong.");
                }

            }
        }
        // post catches data from user submitted data from the form

        ?>
    <h1>Sign Up for Car Mate</h1>
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name: ">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email: ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password: ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="repeat_password" placeholder="Repeat Password: ">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>
        </form>
        <div>
            <p><a href="login.php">Login</a></p>
             </div>
    </div>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up - Car Mate</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="Car Mate Logo">
    </header>
    <nav>
        <ul>
            <li><a href="signup.html">Sign Up</a></li>
            <li><a href="home.html">Home</a></li>
        </ul>
    </nav>
    <section class="content">
        <h1>Sign Up for Car Mate</h1>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Sign Up">
        </form>
    </section>
    <footer>
        <p>&copy; 2023 Car Mate</p>
    </footer>
</body>
</html> -->
