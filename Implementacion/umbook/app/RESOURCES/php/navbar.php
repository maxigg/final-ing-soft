<div class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse"> <span class="icon-list"></span>
			</a>
			<div id="logo">
				<h1>
					<?php echo APP_NAME; ?>
				</h1>
			</div>
			<div style="display: inline-block;">
				<div class="nav-collapse">
					<ul class="nav">
						<li>
							<a href="<?php echo BASE_URL ."wall";?>">Inicio</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."notifications";?>">Notificaciones</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."requests";?>">Solicitudes</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."albums";?>">Albumes</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."friends";?>">Amigos</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."user";?>">Modificar Perfil</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL ."login/logout";?>">Cerrar Session</a>
						</li>
						<li>
							<form  name="searchUser" method="post" action="<?php echo BASE_URL;?>friends/searchUsers/" class="form">
								<input type="search" name="query" class="input-block-level" placeholder="Busqueda"/> 
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
