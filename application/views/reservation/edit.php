<style type="text/css">
	.table td{height: 50px; width: 50px;}
	.table{width: 0;}
	.table{margin: 0 auto;}
	.field{margin: 5px 10px; float: left;}
</style>

<div class="main">
	<div class="main-inner">
		<div class="container">
			<a href="/reservation/list_report" class="btn btn-success btn-large"><i class="icon-long-arrow-left"></i> Volver</a>
			<br/><br/>
			<form action="/reservation/saveedit" method="post">
				<div class="add-fields">

					<input type="hidden" name="reservation_id" id="reservation_id" value="<?=$reservation_id ?>"/>

					<div class="field">
						<label for="customer_TCno">Habitación:</label>
						<input type="text" id="room_id" name="room_id" required readonly value="<?=$room_id?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="customer_TCno">Dni:</label>
						<input type="text" id="customer_TCno" name="customer_TCno" required readonly value="<?=$customer_TCno?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="customer_TCno">Cliente:</label>
						<?
						foreach ($customer as $k=>$rt) {
						?>
							<input type="text" id="customer" name="customer" required readonly value="<?=$rt->customer_lastname.' '.$rt->customer_firstname ?>"/>					
						<?
						}
						?>					
					</div> <!-- /field -->
					
					<div class="field">
						<label for="telephone">Teléfono / Celular:</label>
						<input type="text" id="telephone" name="telephone" required readonly value="<?=$customer[0]->customer_telephone ?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="telephone">Email:</label>
						<input type="text" id="email" name="email" required readonly value="<?=$customer[0]->customer_email ?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="room_type">Tipo Habitación:</label>
						<input type="text" id="room_type" name="room_type" required readonly value="<?=$room_type?>"/>
					</div> <!-- /field -->

					<div class="field">
						<? 
							$type_rental_desc = "";
						?>
						<label for="type_rental">Tipo Alquiler:</label>
						<?
						foreach ($type_rental as $k=>$rt) {						
							if($rt->type_rental_id == $type_rental_id){
								$type_rental_desc = $rt->type_rental;
						?>
							<input type="text" id="type_rental" name="type_rental" required readonly value="<?=$rt->type_rental ?>"/>					
						<?
							}
						}
						?>					
					</div> <!-- /field -->

					<div class="field">
						<label for="checkin_date">Check-in Fecha:</label>
						<input type="date" id="checkin_date" name="checkin_date" required readonly value="<?=$checkin_date?>"/>
					</div> <!-- /field -->

					<div class="field" <? if($type_rental_id == HORAS) { echo "style='display:none'"; } ?>>
						<label for="checkout_date">Check-out Fecha:</label>
						<input type="date" id="checkout_date" name="checkout_date" required readonly value="<?=$checkout_date?>"/>
					</div> <!-- /field -->

					<div class="field" <? if($type_rental_id == DIAS) { echo "style='display:none'"; } ?>>
						<label for="checkin_hour">Check-in Hora:</label>
						<input type="time" id="checkin_hour" name="checkin_hour" required readonly value="<?=$start_time?>"/>
					</div> <!-- /field -->

					<div class="field" <? if($type_rental_id == DIAS) { echo "style='display:none'"; } ?>>
						<label for="checkout_hour">Check-out Hora:</label>
						<input type="time" id="checkout_hour" name="checkout_hour" required readonly value="<?=$end_time?>"/>
					</div> <!-- /field -->

					<div class="field" <? if($type_rental_id == HORAS) { echo "style='display:none'"; } ?>>
						<label for="nro_days">Días:</label>
						<input type="text" id="nro_days" name="nro_days" 
									required readonly value="<?=$nro_days?>"/>
					</div> <!-- /field -->

					<div class="field" <? if($type_rental_id == DIAS) { echo "style='display:none'"; } ?>>
						<label for="nro_hours">Horas:</label>
						<input type="text" id="nro_hours" name="nro_hours" 
									required readonly value="<?=$nro_hours?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="reservation_price">Total S/.:</label>
						<input type="text" id="reservation_price" name="reservation_price" required readonly value="<?=$reservation_price?>"/>
					</div> <!-- /field -->

					<div class="field">
						<label for="contact_channel">Contacto:</label>
						<select id="contact_channel" name="contact_channel">
						<?
							foreach ($contact_channel as $k=>$rt) {							
							?>
							<option value="<?=$rt->contact_channel_id?>" <? if($rt->contact_channel_id==$contact_channel_id) { echo "selected"; } ?>><?=$rt->contact_channel_descrip?></option>
							<?
							}
						?>
						</select>				
					</div> <!-- /field -->

					<div class="field">
						<label for="status">Estado:</label>
						<select id="status" name="status">
						<?
							foreach ($list_status as $k=>$rt) {							
							?>
							<option value="<?=$rt->reservation_status_id?>" <? if($rt->reservation_status_id==$status) { echo "selected"; } ?>><?=$rt->status?></option>
							<?
							}
						?>
						</select>				
					</div> <!-- /field -->

					<div class="field">
						<label for="type_pay">Pago:</label>
						<select id="type_pay" name="type_pay">
						<?
							foreach ($list_type_pay as $k=>$rt) {							
							?>
							<option value="<?=$rt->reservation_type_pay_id?>" <? if($rt->reservation_type_pay_id==$type_pay) { echo "selected"; } ?>><?=$rt->type_pay?></option>
							<?
							}
						?>
						</select>				
					</div> <!-- /field -->

					<div class="field">
						<label for="observacion">Observación:</label>
						<textarea id="observacion" name="observacion" maxlength="250" cols="20" rows="2" style="width: 300px;"><?=$observacion?></textarea>		
					</div> <!-- /field -->

					<div class="login-actions">        
						<button class="button btn btn-success btn-large">
						Editar
						</button>						
					</div> <!-- .actions -->
	<!-- 
					<input type="hidden" name="type_rental" id="type_rental" value="<? echo $type_rental_id; ?>"/>
					<input type="hidden" name="contact_channel" id="contact_channel" value="<? echo $contact_channel_id; ?>"/> -->
				</div> <!-- /login-fields -->
			</form>
		</div>
	</div>
</div>