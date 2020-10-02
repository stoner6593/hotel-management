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
			
				<div class="add-fields" id="printReserva">

					<div class="field">
						<label for="customer_TCno">N° Reserva:</label>
						<input type="text" id="reservation_id" name="reservation_id" required readonly value="<?=str_pad($reservation_id, 5, '0', STR_PAD_LEFT);?>"/>
					</div> <!-- /field -->

					<div class="field" style="display: none;">
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
						<?
							foreach ($contact_channel as $k=>$rt) {	
								if($rt->contact_channel_id==$contact_channel_id) {
									?>
									<input type="text" id="contact_channel" name="contact_channel" required readonly value="<?=$rt->contact_channel_descrip ?>"/>
									<?
								}
							}
						?>			
					</div> <!-- /field -->

					<div class="field">
						<label for="status">Estado:</label>
						<?
							foreach ($list_status as $k=>$rt) {	
								if($rt->reservation_status_id==$status) {
									?>
									<input type="text" id="status" name="status" required readonly value="<?=$rt->status ?>"/>
									<?
								}
							}
						?>			
					</div> <!-- /field -->

					<div class="field">
						<label for="type_pay">Pago:</label>
						<?
							foreach ($list_type_pay as $k=>$rt) {	
								if($rt->reservation_type_pay_id==$type_pay) {
									?>
									<input type="text" id="type_pay" name="type_pay" required readonly value="<?=$rt->type_pay ?>"/>
									<?
								}
							}
						?>			
					</div> <!-- /field -->

					<div class="field">
						<label for="observacion">Observación:</label>
						<textarea id="observacion" name="observacion" maxlength="250" cols="20" rows="2" style="width: 300px;" readonly><?=$observacion?></textarea>		
					</div> <!-- /field -->

					<input type="hidden" name="print_reservation" id="print_reservation" value="<?php echo $reservation_id;?>"/>
	<!-- 
					<input type="hidden" name="type_rental" id="type_rental" value="<? echo $type_rental_id; ?>"/>
					<input type="hidden" name="contact_channel" id="contact_channel" value="<? echo $contact_channel_id; ?>"/> -->
				</div> <!-- /login-fields -->
				<div class="login-actions">        
					<button class="button btn btn-success btn-large" id="btnImprimir">
						Imprimir
					</button>						
				</div> <!-- .actions -->
		</div>
	</div>
</div>