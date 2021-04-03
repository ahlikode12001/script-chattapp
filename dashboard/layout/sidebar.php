 <!--Topbar -->
 <div class="topbar transition">
	<div class="bars">
		<button type="button" class="btn transition" id="sidebar-toggle">
			<i class="las la-bars"></i>
		</button>
	</div>
	<div class="menu">
	
		<ul>

		 
				<li>
					<a href="notifications.html" class="transition">
						<i class="las la-bell"></i>
						<span class="badge badge-danger notif">5</span>
					</a>
				</li>

			<li>
				<div class="dropdown">
					<div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<img src="../assets/img/profile.png" alt="Profile">
					</div>
					<div class="dropdown-menu" aria-labelledby="dropdownProfile">
						
						<a class="dropdown-item" href="profile.html">
							<i class="las la-user mr-2"></i> My Profile
						</a>

						<a class="dropdown-item" href="activity-log.html">
							<i class="las la-list-alt mr-2"></i> Activity Log
						</a>
					 
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.html?logout_id=<?= htmlentities($config['id_config']);?>&<?= md5('sukses-logout');?>">
							<i class="las la-sign-out-alt mr-2"></i> Sign Out
						</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

	<!--Sidebar-->
	<div class="sidebar transition overlay-scrollbars">
		<div class="logo">
			<h2 style="font-weight: 700;" class="mb-0">DW<span style="font-weight: 500;">Admin</span></h2>
		</div>

		<div class="sidebar-items">
			<div class="accordion" id="sidebar-items">
				<ul>

					<p class="menu">Menu</p>

					<li>
						<a href="index.html" class="items">
							<i class="fa fa-tachometer-alt"></i>
							<span>Beranda</span>
						</a>
					</li>

					<li>
						<a href="report-users.html?action=<?= sha1('report'); ?>" class="items">
							<i class="fas la-flag"></i>
							<span>Laporan Users</span>
						</a>
					</li>

					<li>
						<a href="banned-users.html?action=<?= md5(sha1('banned-users')); ?>" class="items">
							<i class="fas la-ban"></i>
							<span>Banned Users</span>
						</a>
					</li>

					<li>
						<a href="users-join.html?action=<?= sha1('join-users'); ?>" class="items">
							<i class="fas la-users"></i>
							<span>Users bergabung</span>
						</a>
					</li>


					<li id="bahasa">
						<a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#bahasa"
							aria-expanded="true" aria-controls="bahasa">
							<i class="fas la-globe-asia"></i>
							<span>Bahasa</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="bahasa" class="collapse submenu" aria-labelledby="bahasa"
						data-parent="#sidebar-items">
						<ul>

							<li>
								<a href="all-language.html?action=<?= sha1('lihat-bahasa'); ?>">Lihat Bahasa</a>
							</li>

						</ul>
					</div>

					<li id="Setting">
						<a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#Setting"
							aria-expanded="true" aria-controls="Setting">
							<i class="fas la-tools"></i>
							<span>Setting</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="Setting" class="collapse submenu" aria-labelledby="Setting"
						data-parent="#sidebar-items">
						<ul>

						    <li>
								<a href="settings-site.html?action=<?= md5('setting-site'); ?>">Setting Web</a>
							</li>
		
	
						</ul>
					</div>
					
					
				</ul>
			</div>
		</div>
	</div>

	<div class="sidebar-overlay"></div>