<?php 
    session_start();
    require_once 'components/navbar.php';

    $emptyfields = "";
    $success = "";


    if(isset($_POST['submit'])){
       require_once 'db.php';
        $email = $_POST['logEmail'];
        $password = $_POST['logPassword'];
        $sql = "SELECT * FROM users WHERE email='$email'LIMIT 1";
        $result = $conn->query($sql);


        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                header('refresh:1, profile.php');
                $success = '
                    <div class="alert alert-success" role="alert">
                    Success!
                    </div>';
                    
            } else {
                $emptyfields = '
                <div class="alert alert-danger" role="alert">
                    Password ! 
                </div>';
        };
    } else {
        $emptyfields = '
        <div class="alert alert-danger" role="alert">
            Email is not registered!
        </div>';

        header('refresh:1,login.php');
    };
    
}; 
?>

<div class="container">
    <div class="wrapper">
    <h1>Login</h1>
    <?php echo $success ?>
    <?php echo $emptyfields ?>
        <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="logEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="logPassword" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="./index.php" style="margin-left: 20px">Register</a>
        </form>
    </div>
</div>

<?php 
require_once 'components/footer.php'
?>
