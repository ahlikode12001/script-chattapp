<?php 
  //session and prevent users direct access
  session_start();
  include_once "api/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.html");
  }

  //Get data id
  $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

  //displays all tbl_account data
  $sql = mysqli_query($conn, "SELECT * FROM tbl_account WHERE unique_id ='$user_id'");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }else{
    header("location: ../users.html");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>beta</title>

  <!-- Style CSS  -->
  <link rel="stylesheet" href="../../assets/css/chat.css">
  <!-- Icon FontAwesome CSS  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- Bootstrap 4 CSS  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
<main class="content">
    <div class="container p-0"> 
 
				<div class="col-12">
          <div class="header-user"> 
					<div class="py-2 px-4 border-bottom">
						<div class="d-flex align-items-center py-1"> 
             <a href="../users.html" class="back-icon"><i class="fas fa-arrow-left"></i></a>
							<div class="position-relative">
								<img src="../files/user_foto/<?= htmlentities($row['img']); ?>" class="rounded-circle mr-1" title="<?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?>" alt="<?= htmlentities($row['fname']);?>" width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
                <strong><?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?></strong>
								<div class="text-muted small"><?= htmlentities($row['status']);?></div>
							</div>
               <div>
                <button class="btn btn-warning btn-sm mr-1 px-2" data-toggle="modal" data-target="#ReportUsers"><i class="fas fa-bug"></i></button>
								<button class="btn btn-warning btn-sm mr-1 px-2" data-toggle="modal" data-target="#detailsinfo"><i class="fas fa-info-circle"></i></button>
							</div>
						</div>
					</div>
          </div>

					<div class="position-relative">
						<div class="chat-messages p-4">
              <div class="chat-box">
 
              </div>
						</div>
					</div>

          <div class="flex-grow-0 py-3 px-4 border-top">

            <form action="#" class="typing-area">

						<div class="input-group">
              <input type="text" class="incoming_id" name="incoming_id" value="<?=  $user_id; ?>" hidden>
							<input type="text" class="form-control input-field" name="message" autocomplete="off" placeholder="Type your message">
							<button class="btn btn-primary">Send</button>
						</div>

            </form>

					</div>

				</div>
			</div>
		</div>
	</div>
</main>

<!-- Modal Report Users -->
<div class="modal fade" id="ReportUsers" tabindex="-1" role="dialog" aria-labelledby="ReportUsersLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ReportUsersLabel">Informasi Details</h5>
        </div>
 
        <?php include_once 'api/report.php'; ?>

      
        <div class="modal-body">
             <p class="text-center">Jika anda ingin mereport users <strong><?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?></strong>, Pastikan bahwa
                Users tersebut sudah melanggar kebijakan privasi atau hal yang membuat bahaya sesama pengguna Chattapp ini!</p>

                <?php
                if (isset($errorMsg)) {
                  echo "<div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      $errorMsg
                    </div>";
                  }
                ?><br>

              <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="form-group">
                <label for="categori">Kategori</label>
                <input type="text" class="incoming_id" name="incoming_id" value="<?=  $user_id; ?>" hidden>
                <input type="text" class="form-control" name="categori" id="categori" placeholder="Masukan Kategori, misal: spam dll" required>
              </div>
              <div class="form-group">
                <label for="massage_report">Pesan Report</label>
                <textarea name="massage_report" id="massage_report" class="form-control" cols="50" rows="5" placeholder="Masukan Pesan Report, misal: user telah melanggar kebijakan privasi dan sebagainya. max 200 kata" onKeyDown="textCounter(this.form.ta,this.form.countDisplay);" onKeyUp="textCounter(this.form.ta,this.form.countDisplay);" required></textarea>          
              </div>
              <div class="form-group">
                  <label>Pilih Foto Chattan</label>
                  <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Lapor</button>
            </form>
               
      
            </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Details Users -->
<div class="modal fade" id="detailsinfo" tabindex="-1" role="dialog" aria-labelledby="detailsinfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailsinfoLabel">Informasi Details</h5>
        </div>
        <div class="modal-body">
            <p>Nama : <?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?></p>
            <p>Bergabung Pada : <?= htmlentities($row['join_date']);?></p>
            <p>Email : <?= htmlentities($row['email']);?></p>
            <p>Status : <?= htmlentities($row['status']);?></p>
            <p>Ini adalah informasi pengguna <?= htmlentities($row['fname']);?> <?= htmlentities($row['lname']);?>  yang sedang kamu chat!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/chat-system.js"></script>

 

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

 