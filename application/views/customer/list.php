<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="/customer/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-plus"></i>Agregar Cliente</a>
			<br><br>
			<table class="table table-striped table-bordered display" id="table_customer">
				<thead>
				  <tr>
				    <th> Nombre Completo </th>
				    <th> Doc. Identidad </th>
				    <th> Ciudad </th>
					<th> Pais </th>
					<th> Teléfono / Celular </th>
				    <th> Email </th>
				    <th class="td-actions"> Actions </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($customers as $emp) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$emp->customer_firstname ." ".$emp->customer_lastname?> </td>
				    <td> <?=$emp->customer_TCno ?> </td>
				    <td> <?=$emp->customer_city ?> </td>
					<td> <?=$emp->customer_country ?> </td>
					<td> <?=$emp->customer_telephone ?> </td>
				    <td> <?=$emp->customer_email ?> </td>
				    <td class="td-actions"><a href="/customer/edit/<?=$emp->customer_id?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a><a href="/customer/delete/<?=$emp->customer_id?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
				  </tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>