<?php 
    require_once 'components/navbar.php';

//  Logic   
$email = $password = "";
$success = "";
$emptyfields = "";
$alreadyRegistered = "";
$emailErr = "";

if(isset($_POST['submit'])){
    require_once 'db.php';
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "<div class='alert alert-danger' role='alert'>
        Incoreect email format !
        </div>'";

        header('refresh:1');
      }else {
    
    function random_num($length){ 
        $text = "";
        if ($length < 5) {
            $length = 5;
        };
        $len = rand(4,$length);
        for ($i=0; $i < $len; $i++){
            $text .= rand(0,9);
        };
        return $text;
    };
    $user_id = random_num(10);

    //Check for duplicates

    $duplicate = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($duplicate);
    if ($result->num_rows > 0){
        
        $alreadyRegistered = '
        <div class="alert alert-danger" role="alert">
            Email already registered !!
        </div>';
        header('refresh:1,index.php');
    }else {

    // password hash

    if(!empty($email) && !empty($password) && !is_numeric($email)){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, password,user_id) VALUES ('$email', '$hash','$user_id')";
        
    if ($conn->query($sql) === TRUE) {
        $success = '
        <div class="alert alert-success" role="alert">
            Success!
        </div>';
        header('refresh 1');
    } else {
        echo "error" . $sql .$conn->error;
    };
    $conn->close();
        }else 
    $emptyfields = '
        <div class="alert alert-danger" role="alert">
            Please fill all fields!
        </div>';

        header('refresh:1,index.php');
}
}};

?>

<div class="container">
    <div class="wrapper">
    <h1>Register</h1>
    <?php echo $success ?>
    <?php echo $emptyfields ?>
    <?php echo $alreadyRegistered ?>
    <?php echo $emailErr ?>
        <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" name="regEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="regPassword" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="./login.php" style="margin-left: 20px">Login</a>
        </form>
    </div>
</div>

<?php 
require_once 'components/footer.php';
?>