<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">

		<form action="/room/edit/<?=$room_range->room_type?>/<?=$room_range->min_id?>/<?=$room_range->max_id?>" method="post">
		
			<h1>Update Habitacion</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>

			<div class="add-fields">

				<div class="field">
					<label for="room_range">Tipo Habitacion:</label>
					<select id="room_type" name="room_type">
					<?
						foreach ($room_types as $rt) {
							?>
							<option value="<?=$rt->room_type?>" <? if($rt->room_type==$room_range->room_type) { echo "selected"; } ?>><?=$rt->room_type?></option>
							<?
						}
					?>
					</select>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="min_id">Inicio del rango de ID:</label>
					<input type="number" min="1" id="min_id" name="min_id" required value="<?=$room_range->min_id?>" placeholder="1"/>
					<i icon="icon-dollar"></i>
				</div> <!-- /field -->

				<div class="field">
					<label for="max_id">Fin del rango de ID:</label>
					<input type="number" min="1" id="max_id" name="max_id" value="<?=$room_range->max_id?>" placeholder="1"/>
				</div> <!-- /field -->

				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Tarifa</legend>
					<div class="field">
						<label for="max_id">Precio Hora (S/):</label>
						<input type="number" min="1" id="precio_hora" name="precio_hora" step=".50" value="" placeholder="-"/>
					</div>
					<div class="field">
						<label for="max_id">Precio Día (S/):</label>
						<input type="number" min="1" id="precio_dia" name="precio_dia" step=".50" value="" placeholder="-"/>
					</div>
				</fieldset>

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
