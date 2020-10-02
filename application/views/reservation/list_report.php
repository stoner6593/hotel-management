<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<!-- <a href="/departments/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Add Department</a> -->
			<form action="/reservation/list_report" method="post">
				<div class="add-fields">
					<fieldset class="scheduler-border">
							<legend class="scheduler-border">Filtros</legend>
							<? if(isset($error)) {?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Error!</strong> <?=$error?>
								</div>
							<? } ?>
							<? if(isset($success)) {?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Success!</strong> <?=$success?>
								</div>
							<? } ?>
							<div class="field span3">
								<label for="checkin_date_from">Checkin Desde:</label>
								<input type="date" id="checkin_date_from" name="checkin_date_from" value="<? echo $checkin_date_from; ?>" placeholder=""/>
							</div>
							<div class="field span3">
								<label for="checkin_date_to">Checkin Hasta:</label>
								<input type="date" id="checkin_date_to" name="checkin_date_to" value="<? echo $checkin_date_to; ?>" placeholder=""/>
							</div>

							<div class="field span3">
								<label for="reservation_status">Estado:</label>
								<select id="reservation_status" name="reservation_status">
									<option value="0">--Seleccione --</option>
									<?
										foreach ($list_reservation_status as $k=>$rt) {
										?>
										<option value="<?=$rt->reservation_status_id?>" <? if($rt->reservation_status_id==$reservation_status) { echo "selected"; } ?>><?=$rt->status?></option>
										<?
										}
									?>
								</select>
							</div> <!-- /field -->

							<div class="login-actions">							
								<button class="button btn btn-success btn-large">Buscar</button>							
							</div> <!-- .actions -->						
					</fieldset>
				</div>
			</form>
			
			<input type="hidden" id="report_reservation" name="report_reservation" value="1"/>
			<fieldset class="scheduler-border">
				<legend class="scheduler-border">Datos</legend>
				<table class="table table-striped table-bordered display" id="table_id">
					<thead>
					<tr>
						<th> Hab. ID </th>
						<th> Dni Cliente </th>
						<th> Nombres </th>
						<th> Apellidos </th>
						<th> Tip. Habitación </th>
						<th> Checkin </th>
						<th> Checkout </th>
						<th> Hora inicio </th>
						<th> Hora Fin </th>
						<th> Cant. </th>
						<th> Costo </th>
						<th> Costo Total </th>
						<th> Empleado </th>
						<th> Estado </th>
						<th> Pago </th>
						<th> Contacto </th>		
						<th> Observación </th>					
						<th class="td-actions"> Actions </th>
					</tr>
					</thead>
					<tbody>
					<?
						foreach ($list_report as $k=>$dept) {
							// $emp->username
					?>
					<tr>
						<td> <?=$dept->room_id?> </td>
						<td> <?=$dept->customer_TCno?> </td>
						<td> <?=$dept->customer_firstname?> </td>
						<td> <?=$dept->customer_lastname?> </td>
						<td> <?=$dept->room_type?> </td>
						<td> <?=$dept->checkin_date?> </td>
						<td> <?=$dept->checkout_date?> </td>
						<td> <?=$dept->start_time?> </td>
						<td> <?=$dept->end_time?> </td>
						<td> <?=$dept->count_time?> </td>
						<td> <?=$dept->romm_price?> </td>
						<td> <?=$dept->reservation_price?> </td>
						<td> <?=$dept->employee_username?> </td>
						<td> <?=$dept->status?> </td>
						<td> <?=$dept->type_pay?> </td>
						<td> <?=$dept->contact_channel_descrip?> </td>
						<td> <?=$dept->observacion?> </td>
						<td class="td-actions"><a href="/reservation/edit/<?=$dept->reservation_id?>" 
							class="btn btn-small btn-primary">
							<i class="btn-icon-only icon-edit"> </i></a>
							<a href="/reservation/print/<?=$dept->reservation_id?>"
							 class="btn btn-success btn-small">
							<i class="btn-icon-only icon-print"> </i></a>
						</td>
					</tr>
					<? } ?>
					</tbody>
				</table>
			</fieldset>
		</div>
	  </div>
	</div>
  </div>
</div>