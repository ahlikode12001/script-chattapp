<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.html");
  }
?>

<?php include_once "header.php"; ?>

<body>
  
<?php include_once 'api/register.php'; ?>

<div class="container">
		<div class="row vh-100 d-flex justify-content-center align-items-center auth">
			<div class="col-md-7 col-lg-5">
				<div class="card">
					<div class="card-body">
						<h3 class="mb-5 text-center">SIGN UP</h3>
             <section class="form signup">
              <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <?php
                if (isset($errorMsg)) {
                  echo "<div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      $errorMsg
                    </div>";
                  }
                ?><br>
                <div class="name-details">
                  <div class="form-group field input">
                    <label>Nama Depan</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Nama Depan" required>
                  </div>
                  <div class="form-group field input">
                  <label>Nama Belakang</label>
                    <input type="text" class="form-control" name="lname" placeholder="Nama Belakang" required>
                  </div>
                </div>
                <div class="form-group field input">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Masukan Email Anda" required>
                </div>
                <div class="form-group field input">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukan Password Anda" required> 
                </div>
                <div class="field image">
                  <label>Pilih Foto</label>
                  <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div>
                <br>
                <div class="field register">
                  <button type="submit" name="submit" class="btn btn-primary auth-btn">Daftar Sekarang</button>
                </div>
                <br>
                <p>Sudah Memiliki Akun? <a href="login.html" id="create_account">Login Sekarang</a></p>
              </form>
            </section>
					</div>
				</div>
			</div>
		</div>
	</div>

 
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>