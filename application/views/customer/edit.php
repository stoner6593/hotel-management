<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/customer/edit/<?=$customer->customer_id?>" method="post">
		
			<h1>Modificar Cliente</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="employee_username">Doc. Identidad:</label>
					<input type="text" id="TCno" name="TCno" required 
					value="<?=$customer->customer_TCno?>" placeholder="Doc. Identidad"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_firstname">Nombres:</label>
					<input type="text" id="firstname" name="firstname" required value="<?=$customer->customer_firstname?>" placeholder="Firstname"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_lastname">Apellidos:</label>
					<input type="text" id="lastname" name="lastname" required value="<?=$customer->customer_lastname?>" placeholder="Apellidos"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_telephone">Teléfono / Celular:</label>
					<input type="text" id="telephone" name="telephone" value="<?=$customer->customer_telephone?>" placeholder="Teléfono"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_email">Email:</label>
					<input type="text" id="email" name="email" required value="<?=$customer->customer_email?>" placeholder="Email"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_type">Ciudad:</label>
					<input type="text" id="city" name="city" required value="<?=$customer->customer_city?>" placeholder="Ciudad"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="employee_salary">País:</label>
					<input type="text" id="country" name="country" required value="<?=$customer->customer_country?>" placeholder="País"/>
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>