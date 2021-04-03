<?php 
  //session and prevent users direct access
  session_start();
  include_once "api/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.html");
  }

  //session data id
  $unique_id = htmlentities($_SESSION['unique_id']);

  //displays all tbl_account data
  $sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE unique_id = '$unique_id'");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
  }

  if($row['ban_account'] =='t') {
?>
<?php include_once "header.php"; ?>
<body>
<div class="layouting">
                  <aside class="sidebar">
                              <div class="sidebar-header sticky-top p-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="font-weight-semibold mb-0 nameapp">ChatApp</h5>
                                          <li class="nav-item list-inline-item mr-0">
                                              <div class="dropdown">
                                              <a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-bars fa-2x"></i>
                                                  </a>

                                                  <div class="dropdown-menu dropdown-menu-right">
                                                      <a class="dropdown-item" href="logout.html?logout_id=<?= htmlentities($row['unique_id']);?>" >Logout</a>

                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>


                                  <div class="sidebar-search">

                                  <div class="search">
                                    <span class="text">Memulai Untuk Obrolan</span>
                                    <input type="text" placeholder="Enter name to search...">
                                    <button><i class="fas fa-search"></i></button>
                                  </div>
                                </div>
                              </div>


                              <ul class="users-list">
                              
                    </ul>
          </aside>

          <main class="welcome">
              <div class="de">
                  <div class="d-flex flex-column justify-content-center text-center h-100 w-100">
                      <div class="container">

               
                          <div class="avatar avatar-lg mb-2">
                              <img class="avatar-img" src="files/user_foto/<?= htmlentities($row['img']);?>">
                          </div>

                    
                          <h5>Welcome, <?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?></h5>
                          <p>Jika Anda menemukan bug atau masalah lain!</p>
                          <a href="../faq.html" target="_blank" class="btn btn-warning">Pesan Masuk</a>
                      </div>
                  </div>
              </div>
      </div>


      
  <script src="js/list-user.js"></script>


 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php }else{ ?>

<?php 
  $ban_re = mysqli_query($conn, "SELECT * FROM tbl_account WHERE unique_id = '$unique_id'");
  if(mysqli_num_rows($ban_re) > 0){
    $ban = mysqli_fetch_assoc($ban_re);
}
?>
<h1 style="text-align:center;margin-top:20rem;">Akun Anda Telah diban! 
<br>
<a href="logout.html?logout_id=<?= htmlentities($row['unique_id']);?>">Logout</a>
</h1>
<?php } ?> 