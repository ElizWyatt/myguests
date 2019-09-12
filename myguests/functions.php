<?

//select
function select_myguests() {
    
    include 'credentials.php';
    
    $sql = "SELECT * FROM myguests";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?=$row['guest_firstname']?></td>
                <td><?=$row['guest_lastname']?></td>
                <td><?=$row['guest_email']?></td>
                <td><?=$row['guest_phone']?></td>
                <td>
                    <form action="index.php" method="POST">
                    <input type="hidden" value="<?=$row['guest_id']?>" name='delete_guest_id'>  
                    <button type="submit" name="delete_guest" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="index.php" method="POST">
                    <input type="hidden" value="<?=$row['guest_id']?>" name="update_guest_id">
                    <input type="hidden" value="<?=$row['guest_firstname']?>" name="update_guest_firstname">
                    <input type="hidden" value="<?=$row['guest_lastname']?>" name="update_guest_lastname">
                    <input type="hidden" value="<?=$row['guest_email']?>" name="update_guest_email">
                    <input type="hidden" value="<?=$row['guest_phone']?>" name="update_guest_phone">

                    <button type="submit" name="update_guest" class="btn btn-info">Edit</button>
                    </form>
                </td>
            </tr>
            <?
    
        }
    }
    mysqli_close($conn);
        }
//insert
function insert_guest() {
    include 'credentials.php';
    $guest_firstname = filter_var($_POST['guest_firstname'], FILTER_SANITIZE_STRING);
    $guest_lastname = filter_var($_POST['guest_lastname'], FILTER_SANITIZE_STRING);
    $guest_email = filter_var($_POST['guest_email'], FILTER_SANITIZE_STRING);
    $guest_phone = filter_var($_POST['guest_phone'], FILTER_SANITIZE_STRING);
    
    $sql = "INSERT INTO myguests (
        guest_firstname, 
        guest_lastname, 
        guest_email, 
        guest_phone
        )
    VALUES (
        '{$guest_firstname}', 
        '{$guest_lastname}', 
        '{$guest_email}',
        '{$guest_phone}'
        )";
    
    if (mysqli_query($conn, $sql)) {
        echo '<div class="container-fluid">
        <div class="row">
          <div class="col"></div>
            <div class="col text-center">
              <p class="alert alert-success">Record added successfully</p>
          </div>
          <div class="col"></div>
        </div>
        </div>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);

}
//delete
function delete_guest() {
    include 'credentials.php';
$sql = "DELETE FROM myguests WHERE guest_id='{$_POST['delete_guest_id']}'";

     if (mysqli_query($conn, $sql)) {
      echo '<div class="container-fluid">
            <div class="row">
              <div class="col"></div>
                <div class="col text-center">
                  <p class="alert alert-success" style="font-size: 20px;" >Record deleted successfully</p>
              </div>
              <div class="col"></div>
            </div>
            </div>';
      } else {
      echo "Error deleting record: " . mysqli_error($conn);
    
    }




mysqli_close($conn);
}
//update
function update_guest_form() {
    $update_form = '<form action="index.php" method="POST">
    <input type="hidden" value="'.$_POST['update_guest_id'].'" name="confirm_update_guest_id"> 
    <div class="form-group">
        <input type="text" name="update_firstname" placeholder="Update First Name" class="form-control"
        value="'.$_POST['update_guest_firstname'].'">
    </div>
  <div class="form-group">
      <input type="text" class="form-control" name="update_lastname" value="'.$_POST['update_guest_lastname'].'">
  </div>
   <div class="form-group">
      <input type="email" class="form-control" name="update_email" value="'.$_POST['update_guest_email'].'">
          </div>
  <div class="form-group">
      <input type="text" name="update_phone" placeholder="Update Phone" class="form-control" value="'.$_POST['update_guest_phone'].'">
  </div>
  <button type="submit" name="confirm_update" class="btn btn-warning btn-block text-white">Confirm Update</button>
  </form>';

echo $update_form;
}

//update product
function update_guest() {

    include 'credentials.php';

    $update_firstname = filter_var($_POST['update_firstname'], FILTER_SANITIZE_STRING);
    $update_lastname = filter_var($_POST['update_lastname'], FILTER_SANITIZE_STRING);
    $update_email = filter_var($_POST['update_email'], FILTER_SANITIZE_STRING);
    $update_phone = filter_var($_POST['update_phone'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE myguests SET guest_firstname='{$update_firstname}', guest_lastname = '{$update_lastname}', guest_email ='{$update_email}', guest_phone ='{$update_phone}' WHERE guest_id='{$_POST['confirm_update_guest_id']}'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
 mysqli_close($conn);

}
//add product form
function add_newguest_form() {
    $add_newguest_form = '<div class="container-fluid pb-3">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="text" name="guest_firstname" placeholder="First Name" class="form-control">
                </div>
              <div class="form-group">
                  <input type="text" name="guest_lastname" placeholder="Last Name" class="form-control">
              </div>
               <div class="form-group">
                  <input type="email" name="guest_email" placeholder="Email" class="form-control">
                  </div>
              <div class="form-group">
                  <input type="text" name="guest_phone" placeholder="Phone" class="form-control">
              </div>
              <button type="submit" name="add_guest" class="btn btn-warning btn-block text-white">Add Guest</button>
              </form>
        </div>
        <div class="col"></div>
    </div>
</div>';

echo $add_newguest_form;

}
?>