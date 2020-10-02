<style type="text/css">
	.table td{height: 50px; width: 50px;}
	.table{width: 0;}
	.table{margin: 0 auto;}
	.field{margin: 5px 10px; float: left;}
</style>

<div class="main">
	<div class="main-inner">
		<div class="container">
			<a href="/reservation" class="btn btn-success btn-large"><i class="icon-long-arrow-left"></i> Volver</a>
			<form action="/reservation/make" method="post">
			<div class="add-fields">

				<!--div class="field">
					<input type="hidden" id="customer_id" name="customer_id" required readonly value="<?=$customer_id?>"/>
				</div--> <!-- /field -->

				<div class="field">
					<label for="customer_TCno">Dni:</label>
					<input type="text" id="customer_TCno" name="customer_TCno" required readonly value="<?=$customer_TCno?>"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="customer_TCno">Cliente:</label>
					<?
					foreach ($customer as $k=>$rt) {
					?>
						<input type="text" id="customer" name="customer" required readonly value="<?=$rt->customer_lastname." ".$rt->customer_firstname ?>"/>					
					<?
					}
					?>					
				</div> <!-- /field -->

				<div class="field">
					<label for="room_type">Tipo Habitación:</label>
					<input type="text" id="room_type" name="room_type" required readonly value="<?=$room_type?>"/>
				 </select>
				</div> <!-- /field -->

				<div class="field">
					<? 
						$type_rental_desc = "";
					?>
					<label for="type_rental_obj">Tipo Alquiler:</label>
					<?
					foreach ($type_rental_obj as $k=>$rt) {
						$type_rental_desc = $rt->type_rental;
					?>
						<input type="text" id="type_rental_obj" name="type_rental_obj" required readonly value="<?=$rt->type_rental ?>"/>					
					<?
					}
					?>					
				</div> <!-- /field -->

				<div class="field">
					<label for="checkin_date">Check-in Fecha:</label>
					<input type="date" id="checkin_date" name="checkin_date" required readonly value="<?=$checkin_date?>"/>
				</div> <!-- /field -->

				<div class="field" <? if($type_rental == HORAS) { echo "style='display:none'"; } ?>>
					<label for="checkout_date">Check-out Fecha:</label>
					<input type="date" id="checkout_date" name="checkout_date" required readonly value="<?=$checkout_date?>"/>
				</div> <!-- /field -->

				<div class="field" <? if($type_rental == DIAS) { echo "style='display:none'"; } ?>>
					<label for="checkin_hour">Check-in Hora:</label>
					<input type="time" id="checkin_hour" name="checkin_hour" required readonly value="<?=$checkin_hour?>"/>
				</div> <!-- /field -->

				<div class="field" <? if($type_rental == DIAS) { echo "style='display:none'"; } ?>>
					<label for="checkout_hour">Check-out Hora:</label>
					<input type="time" id="checkout_hour" name="checkout_hour" required readonly value="<?=$checkout_hour?>"/>
				</div> <!-- /field -->
				
				<?
					$nro_time = 0;
					if(intval($nro_days) > 0){
						$nro_time = intval($nro_days);
					}
					if(intval($nro_hours) > 0){
						//Comentado para que la cantidad siempre sea 1 y no tome el valor de las horas
						//$nro_time = intval($nro_hours);
						$nro_time = intval(1);
					}
				?>

				<div class="field" <? if($type_rental == HORAS) { echo "style='display:none'"; } ?>>
					<label for="nro_days">Días:</label>
					<input type="text" id="nro_days" name="nro_days" 
								required readonly value="<?=$nro_days?>"/>
				</div> <!-- /field -->

				<div class="field" <? if($type_rental == DIAS) { echo "style='display:none'"; } ?>>
					<label for="nro_hours">Horas:</label>
					<input type="text" id="nro_hours" name="nro_hours" 
								required readonly value="<?=$nro_hours?>"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="contact_channel_obj">Contacto:</label>
					<?
					foreach ($contact_channel_obj as $k=>$rt) {
					?>
						<input type="text" id="contact_channel_obj" name="contact_channel_obj" required readonly value="<?=$rt->contact_channel_descrip ?>"/>					
					<?
					}
					?>					
				</div> <!-- /field -->

				<div class="field">
					<label for="observacion">Observación:</label>
					<textarea id="observacion" name="observacion" maxlength="250" cols="20" rows="2" style="width: 300px;"></textarea>		
				</div> <!-- /field -->

				<input type="hidden" name="type_rental" id="type_rental" value="<? echo $type_rental; ?>"/>
				<input type="hidden" name="contact_channel" id="contact_channel" value="<? echo $contact_channel; ?>"/>
			</div> <!-- /login-fields -->
				<div class="row">
					<div class="span12">
		<?php
			$size = count($rooms);
			$cols = ceil(sqrt($size));
			$rows = ceil($size/$cols);
		?>
					<table class="table table-striped table-bordered" style="width: 40%;">
						<thead>
							<tr>
								<th colspan="<?=$cols?>">Habitaciones disponibles</th>
							</tr>
						</thead>
						<tbody>
						<? for ($t=0, $i=0; $t<$rows; ++$t) { ?>
							<tr>
								<? for($j=0; $j<$cols && $i<$size; ++$i, ++$j) { ?>
								<td class="td-actions">
									<p style="font-weight: bold; color: blue;">Hab: <?=$rooms[$i]->room_id?></p>
									<p style="font-weight: bold; color: darkcyan;"><? echo $type_rental_desc; ?>: S/ <?=$rooms[$i]->room_price?></p>
									<p style="font-weight: bold; color: darkorange;">Total: S/ <?=$rooms[$i]->room_price*$nro_time ;?></p>
									<button name="room_id" 
									value="<?=$rooms[$i]->room_id?>" 
									onclick="return confirm('Estas seguro ?')" 
									class="btn btn-small btn-primary"
									<? if($rooms[$i]->room_price == 0) { echo "disabled"; } ?>>										
									<i class="btn-icon-only icon-check"></i></button>
									<br/>
								</td>
							<? } ?>
							</tr>
						<? } ?>
						</tbody>
					</table>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>