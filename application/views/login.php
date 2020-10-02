<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="/login" method="post">
		
			<h1>Ingresar</h1>		
			
			<div class="login-fields">
				<?
				if(@$error) {
				?>
				<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Your username or password are invalid</div>
				<? } ?>
				<p>Proporcione sus datos</p>
				
				<div class="field">
					<label for="username">Usuario</label>
					<input type="text" id="username" autocomplete="off" required name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" autocomplete="off" required name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Mantenerme en linea</label>
				</span>
									
				<button class="button btn btn-success btn-large">Ingresar</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="/forget">Restablecer la contraseña</a>
</div> <!-- /login-extra -->
