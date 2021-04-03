<?php 
  //header
  require 'layout/header.php';
?>

<?php 
  //navbar
  require 'layout/navbar.php';
?>
 


    <!--Search-->
	<div class="container faq">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12 hedding pl-4 pt-5">
						Support Center
					</div>
				</div>
			</div>

			<div class="col-lg-12 mt-5">
				<div class="container bootstrap snippet">
					<div class="row">

					  	<div class="col-lg-12">
					    	<h3 class="title-block second-child">Pertanyaan Umum</h3>
				    		<div class="panel-group" id="faqList">
				      			<div class="panel panel-default">
				        			<div class="panel-heading">
					          			<h4 class="panel-title p-3 border rounded">
								            <a data-toggle="collapse" data-parent="#faqList" href="#questionOne" class="collapsed">
								              	Akun Telah diban?
								            </a>
					          			</h4>
				        			</div>
							        <div id="questionOne" class="panel-collapse collapse" style="height: 0px;">
							          	<div class="panel-body border p-3">
							            	<p class="p-0 m-0">
												<strong>Jawab:</strong> Adapun penyebab akun anda terban oleh system, mungkin anda telah di report oleh pengguna lain
												karena melanggar kebijakan privasi atau berkata kotor, kasar dan dsb.
											</p>
							          	</div>
							        </div>
				      			</div>
							    <div class="panel panel-default">
							        <div class="panel-heading">
							          	<h4 class="panel-title p-3 border rounded">
								            <a data-toggle="collapse" data-parent="#faqList" href="#questionTwo" class="collapsed">
								               Apakah Akun yang telah diban bisa di pakai kembali?
								            </a>
							          	</h4>
							        </div>
							        <div id="questionTwo" class="panel-collapse collapse" style="height: 0px;">
							          	<div class="panel-body border p-3">
							            	<p class="p-0 m-0">
											  <strong>Jawab: bisa</strong>, anda bisa menggunakan kembali akun anda. jika anda melaporkan ke staff kami melalui 
											  <a href="contact.html">Kontak ini</a>, tim kami akan melakukan pengecekan ulang. agar akun anda di bebaskan 
											</p> 
							          	</div>
							        </div>
							    </div>
							    <div class="panel panel-default">
							        <div class="panel-heading">
							          	<h4 class="panel-title p-3 border rounded">
								            <a data-toggle="collapse" data-parent="#faqList" href="#questionThree" class="collapsed">
								               Apa yang harus saya lakukan jika menemui bugs pada website?
								            </a>
							          	</h4>
							        </div>
							        <div id="questionThree" class="panel-collapse collapse" style="height: 0px;">
							          	<div class="panel-body border p-3">
							            	<p class="p-0 m-0">
												<strong>Jawab:</strong> Anda bisa melaporkan bugs ini di <a href="contact.html">Sini</a>
											</p>
							          	</div>
							        </div>
							    </div>
							    <div class="panel panel-default">
							        <div class="panel-heading">
							          	<h4 class="panel-title p-3 border rounded">
								            <a data-toggle="collapse" data-parent="#faqList" href="#collapseFour" class="">
								              	Apa yang harus saya lakukan jika lupa password pada akun saya?
								            </a>
							          	</h4>
							        </div>
							        <div id="collapseFour" class="panel-collapse collapse in" style="">
							          	<div class="panel-body border p-3">
							            	<p class="p-0 m-0">
												<strong>Jawab:</strong>Anda bisa mereset password tersebut di <a href="recover/reset-password.html">Sini</a>
												Dan anda akan mendapatkan link melalui e-mail yang telah terdaftar pada website kami. lalu, anda bisa mengganti password.
											</p>
							          	</div>
							    	</div>
								</div>
							 

								</div>
					    	</div>
					  	</div>
					</div> 
				</div>             
			</div>
		</div>
	</div>

 

<?php 
  //footer
  require 'layout/footer.php';
?>
<?php 
  //javascript
  require 'layout/javascript.php';
?>
 