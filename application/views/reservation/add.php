<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span4">
        <a href="/customer/add/reservation" class="btn btn-success btn-large">Add Cliente</a>

        <div class="account-container">
          
          <div class="content">
            
            <form action="/reservation/check" method="post">
            
              <h1>Registro Reservación</h1>    
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
      <div class="add-fields">

        <!--<div class="field">
          <label for="customer_TCno">Dni Cliente:</label>
          <input type="text" id="customer_TCno" name="customer_TCno" required value="" placeholder="Dni"/>
        </div>--> <!-- /field -->

        <div class="field">
          <label for="room_type">Cliente:</label>
          <select id="customer_TCno" name="customer_TCno" class="selectpicker">
          <option value="">--Seleccione Cliente</option>
          <?
            foreach ($list_customers as $k=>$rt) {
              ?>
              <option value="<?=$rt->customer_TCno?>" >
                <?=$rt->customer_TCno." ".$rt->customer_lastname.", ".$rt->	customer_firstname?>
              </option>
              <?
            }
          ?>
         </select>
        </div>

        <div class="field">
          <label for="room_type">Tipo Habitación:</label>
          <select id="room_type" name="room_type">
          <?
            foreach ($room_types as $k=>$rt) {
              ?>
              <option value="<?=$rt->room_type?>" <? if($k==0) { echo "selected"; } ?>><?=$rt->room_type?></option>
              <?
            }
          ?>
         </select>
        </div> <!-- /field -->

        <div class="field">
          <label for="room_type">Tipo Alquiler:</label>
          <select id="type_rental" name="type_rental">
          <?
            foreach ($type_rental as $k=>$rt) {
              ?>
              <option value="<?=$rt->type_rental_id?>" <? if($k==1) { echo "selected"; } ?>><?=$rt->type_rental?></option>
              <?
            }
          ?>
         </select>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="checkin_date">Check-in Fecha:</label>
          <input type="date" id="checkin_date" name="checkin_date" required value=""/>
        </div> <!-- /field -->

        <div class="field" id="div_checkout_date">
          <label for="checkout_date">Check-out Fecha:</label>
          <input type="date" id="checkout_date" name="checkout_date" required value=""/>
        </div> <!-- /field -->

        <div id="div_hour">
          <div class="field">
            <label for="checkin_hour">Check-in Hora:</label>
            <input type="time" id="checkin_hour" name="checkin_hour" required value="<? echo CHECKIN; ?>"/>
          </div> <!-- /field -->

          <div class="field">
            <label for="checkout_hour">Check-out Hora:</label>
            <input type="time" id="checkout_hour" name="checkout_hour" required value="<? echo CHECKIN; ?>"/>
          </div> <!-- /field -->
        </div>

        <div class="field">
          <label for="room_type">Contacto:</label>
          <select id="contact_channel" name="contact_channel">
          <?
            foreach ($contact_channel as $k=>$rt) {
              ?>
              <option value="<?=$rt->contact_channel_id?>" <? if($k==0) { echo "selected"; } ?>><?=$rt->contact_channel_descrip?></option>
              <?
            }
          ?>
         </select>
        </div> <!-- /field -->

        <!--div class="field">
          <label for="room_quantity">Quantity:</label>
          <input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantity"/>
        </div--> <!-- /field -->

      </div> <!-- /login-fields -->
      
      <div class="login-actions">
        
        <button class="button btn btn-success btn-large">
          Listar habitaciones disponibles
        </button>
        
      </div> <!-- .actions -->
      
      
      
    </form>

    <input type="hidden" id="regreserva" value="1"/>
    
  </div> <!-- /content -->
</div> <!-- /account-container -->
</div>
<style type="text/css">.account-container{margin-top: 10px;padding-bottom: 15px;}</style>
      <div class="span7">
        <!-- /widget -->
        <div class="widget widget-nopad">
          <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Reservation</h3>
          </div>
          <!-- /widget-header -->
          <div class="widget-content">
            <div id='calendar' class='calendar'>
            </div>
          </div>
          <!-- /widget-content --> 
        </div>
        <!-- /widget -->
      </div>
    </div>
  </div>
</div>
