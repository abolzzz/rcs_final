<?php 
require_once 'components/navbar.php';
require_once 'db.php';
session_start();
?>

<!-- //username -->

<div class="container d-flex p-2 justify-content-between">
    
<h2> Welcome:   <span style="color:red"><?php echo  $_SESSION['email']; ?> </span></h2>


<form action="" method="POST">
    <button name="logout" class="btn btn-secondary">Logout</button>
</form>

</div>

<?php
//logout

if(isset($_POST['logout'])){
    $_SESSION['email'] == false;
    
    unset($_SESSION["email"]);
    header("location:login.php");
    session_destroy();
    session_unset();
   
};

if (!$_SESSION['user_id']){
    header("location:login.php");
};


//todo_table_output

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $user_id = $_SESSION['user_id']; 
    $sql = "INSERT INTO todo (task,user_id) VALUES ('$task', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "error" . $sql .$conn->error;
    };
};

//Edit
if(isset($_POST['edit']) && isset($_POST['checkDelete'])){
    require_once 'db.php';
    $key = $_POST['checkDelete'];
    $input = $_POST['input'];
    $sql = "UPDATE todo SET task = '$input' WHERE id = '$key'";
    $result = $conn->query($sql);
   
};

//Delete
$deleted = ""; 

if(isset($_POST['delete']) && isset($_POST['checkDelete'])){
    require_once 'db.php';
    $key = $_POST['checkDelete'];
    $check = "SELECT * FROM todo WHERE id = '$key'";  
    $result = $conn->query($check);
    if($result->num_rows > 0){
        $delete = "DELETE FROM todo where id = '$key'";
        $result = $conn->query($delete);
        $deleted = '
        <div class="alert alert-success" role="alert">
            Deleted!
        </div>';
        header('refresh:1');
    }else {
        
    };
};
?>
<!-- // Table Head output from logged in user -->

<div class="container-sm">
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Todos:</label>
    <input type="text" name="task" class="form-control" id="inputdefault" aria-describedby="emailHelp">
  </div>
  
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<br>
<br>
<div class="container-sm">
<table class='table table-striped table-dark table-bordered'>
<?php echo $deleted; ?>
    <thead>
      <tr>
        <th scope='col'>Nr.:</th>
        <th scope='col'>Post</th>
        <th scope='col'>Delete</th>
        <th class="text right">Edit</th>
      </tr>
    </thead>

<?php

// Table output from logged in user

require_once 'db.php';
$select = "SELECT * FROM todo WHERE user_id = ".$_SESSION["user_id"]."";
$result = $conn->query($select);

$nr = 1;

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){ ?>

   <tr>
        <td style="width:5%"><?php echo $nr; ?> </td>
        <td><?php echo $row['task']; ?> </td>
        
        <form action="" method='POST'>
        <input type="hidden" name="checkDelete" value= '<?php echo $row['id'] ?>'>
            
        <td style="width:10%">
            <form action='' method='POST'>
            <button name="delete" class='btn btn-dark'>DELETE</button>
            
        </td>
        <td style="width:30%">
            <form action='' method='POST'>
            <input style="width:70%" type='text' name='input'>
            <button name='edit'class='btn btn-dark'>EDIT</button>
            </form>
        </td>
        
</tr>

<?php 

$nr++;}}else {
    echo "<td colspan='5' class='text-center'>No data!</td>";
} ?>
</table>
</div>
</div>

<?php 
require_once 'components/footer.php';
?>