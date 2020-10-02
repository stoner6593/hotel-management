<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/customer/add/<?=$reference?>" method="post">
		
			<h1>Agregar Cliente</h1>	<h5 style="color:#EA4300"><?php echo $this->session->flashdata('customer'); ?></h5> 	
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>

			<div class="add-fields">
				
				<div class="field">
					<label for="customer_TCno">DNI:</label>
					<input type="text" id="TCno" name="customer_TCno" required value="" placeholder="Dni"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_firstname">Nombres:</label>
					<input type="text" id="firstname" name="customer_firstname" required value="" placeholder="Nombres"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_lastname">Apellidos:</label>
					<input type="text" id="lastname" name="customer_lastname" required value="" placeholder="Apellidos"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_telephone">Teléfono / Celular:</label>
					<input type="text" id="telephone" name="customer_telephone" value="" placeholder="Teléfono"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_email">Email:</label>
					<input type="email" id="email" name="customer_email" required value="" placeholder="Email"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_city">Ciudad:</label>
					<input type="text" id="city" name="customer_city" value="Lima" placeholder="Ciudad"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_country">País:</label>
					<input type="text" id="country" name="customer_country" value="Perú" placeholder="País"/>
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Guardar</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>