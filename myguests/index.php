<? include 'functions.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <style>
  body {background-color: lightgrey;}
  p {font-size: 60px;}
  </style>
  
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <p>My Guests</p>
            </div>
        </div>
   </div>
  
   <div class="container-fluid text-center" style="padding-bottom: 40px;">
      <div class="row">
        <div class="col">
          <form action="index.php" method="POST">
            <button name="add_new_guest" class="btn btn-primary">Add New Guest</button>
          </form>
         </div>
       </div>
   </div>
  
  
  <?

//buttons function

  if(isset($_POST['add_new_guest'])) {
    add_newguest_form();
  }

  if(isset($_POST['add_guest'])) {
    insert_guest();
  }

  if(isset($_POST['delete_guest'])) {
    delete_guest();
  }

  if(isset($_POST['update_guest'])) {
    update_guest_form();
  }

  if(isset($_POST['confirm_update'])) {
    update_guest();
  }

   
 
 

   



?>

  <div class="container-fluid">
      <div class="row">
           <div class="col">
           <table class="table table-bordered table-striped table-hover">
              <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
              </tr> 
              <? select_myguests(); ?>
            </table>
        </div> 
      </div>
  </div>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>