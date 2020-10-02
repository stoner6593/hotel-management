<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Comprobante de pago</title>
<style>
body {
    direction: ltr;
    font-size: 100%;
    font-family: 'monospace', sans-serif;
}

table {
    margin: 0;
    padding: 0;
    width: 100%;
}
.font-sm{
  font-size: 8px !important;
}
.font-md {
    font-size: 12px;
}
.font-lg {
    font-size: 14px;
}
.font-xlg {
    font-size: 16px;
}
.font-bold {
    font-weight: bold;
}
.company_logo_sm{
  max-height: 70px !important;
  max-width: 70px !important;
}
.company_logo_box_sm{
  height: 70px !important;
  width: 70px !important;
}
.content{
  object-fit: contain;
}
.company_logo {
  max-height: 100px;
}
.company_logo_box {
  height: 100px;
}
.company_logo_ticket {
  max-width: 200px;
  max-height: 80px
}
.company_logo_ticket-sm{
    max-width: 100px;
    max-height: 80px
}
.contain {object-fit: cover;}

.text-right {
    text-align: right !important;
}
.text-center {
    text-align: center !important;
}
.text-left {
    text-align: left !important;
}
.align-top {
    vertical-align: top !important;
}

.full-width {
    width: 100%;
}

.m-10 {
    margin: 10px;
}
.mt-10 {
    margin-top: 10px;
}
.mb-10 {
    margin-bottom: 10px;
}
.m-20 {
    margin: 20px;
}
.mt-20 {
    margin-top: 20px;
}
.mb-20 {
    margin-bottom: 20px;
}

.p-20 {
    padding: 20px;
}
.pt-20 {
    padding-top: 20px;
}
.pb-20 {
    padding-bottom: 20px;
}
.p-10 {
    padding: 10px;
}
.pt-10 {
    padding-top: 10px;
}
.pb-10 {
    padding-bottom: 10px;
}

.border-box {
    border: thin solid #333;
}
.border-top {
    border-top: thin solid #333;
}
.border-bottom {
    border-bottom: thin solid #333;
}
.border-top-bottom {
    border-top: thin solid #333;
    border-bottom: thin solid #333;
}

.bg-grey {
    background-color: #F8F8F8;
}

.logo {

}

.qr_code {
    width: 150px;
}

.qr_code-sm{
  width: 90px !important;
  height: 90px !important;
}

/* Headings */
h1, h2, h3, h4, h5, h6 {
    font-weight: 200;
    letter-spacing: -1px;
}

h1 {
    font-size: 32px;
    line-height: 44px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
    font-weight: 500;
    line-height: 42px;
}

h3 {
    font-size: 18px;
    font-weight: 400;
    letter-spacing: normal;
    line-height: 24px;
}

h4 {
    font-size: 16px;
    font-weight: 400;
    letter-spacing: normal;
    line-height: 27px;
}

h5 {
    font-size: 13px;
    font-weight: 300;
    letter-spacing: normal;
    line-height: 18px;
}

h6 {
    font-size: 10px;
    font-weight: 300;
    letter-spacing: normal;
    line-height: 18px;
}

table, tr, td, th {
    font-size: 12px !important;
}

p {
    font-size: 12px !important;
}

.desc {
  font-size: 10px !important;
}

.desc-9 {
  font-size: 9px !important;
}


.m-0 {
  margin: 0 !important;
}

.mt-0,
.my-0 {
  margin-top: 0 !important;
}

.mr-0,
.mx-0 {
  margin-right: 0 !important;
}

.mb-0,
.my-0 {
  margin-bottom: 0 !important;
}

.ml-0,
.mx-0 {
  margin-left: 0 !important;
}

.m-1 {
  margin: 0.25rem !important;
}

.mt-1,
.my-1 {
  margin-top: 0.25rem !important;
}

.mr-1,
.mx-1 {
  margin-right: 0.25rem !important;
}

.mb-1,
.my-1 {
  margin-bottom: 0.25rem !important;
}

.ml-1,
.mx-1 {
  margin-left: 0.25rem !important;
}

.m-2 {
  margin: 0.5rem !important;
}

.mt-2,
.my-2 {
  margin-top: 0.5rem !important;
}

.mr-2,
.mx-2 {
  margin-right: 0.5rem !important;
}

.mb-2,
.my-2 {
  margin-bottom: 0.5rem !important;
}

.ml-2,
.mx-2 {
  margin-left: 0.5rem !important;
}

.m-3 {
  margin: 1rem !important;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}

.mr-3,
.mx-3 {
  margin-right: 1rem !important;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

.ml-3,
.mx-3 {
  margin-left: 1rem !important;
}

.m-4 {
  margin: 1.5rem !important;
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important;
}

.mr-4,
.mx-4 {
  margin-right: 1.5rem !important;
}

.mb-4,
.my-4 {
  margin-bottom: 1.5rem !important;
}

.ml-4,
.mx-4 {
  margin-left: 1.5rem !important;
}

.m-5 {
  margin: 3rem !important;
}

.mt-5,
.my-5 {
  margin-top: 3rem !important;
}

.mr-5,
.mx-5 {
  margin-right: 3rem !important;
}

.mb-5,
.my-5 {
  margin-bottom: 3rem !important;
}

.ml-5,
.mx-5 {
  margin-left: 3rem !important;
}

.p-0 {
  padding: 0 !important;
}

.pt-0,
.py-0 {
  padding-top: 0 !important;
}

.pr-0,
.px-0 {
  padding-right: 0 !important;
}

.pb-0,
.py-0 {
  padding-bottom: 0 !important;
}

.pl-0,
.px-0 {
  padding-left: 0 !important;
}

.p-1 {
  padding: 0.25rem !important;
}

.pt-1,
.py-1 {
  padding-top: 0.25rem !important;
}

.pr-1,
.px-1 {
  padding-right: 0.25rem !important;
}

.pb-1,
.py-1 {
  padding-bottom: 0.25rem !important;
}

.pl-1,
.px-1 {
  padding-left: 0.25rem !important;
}

.p-2 {
  padding: 0.5rem !important;
}

.pt-2,
.py-2 {
  padding-top: 0.5rem !important;
}

.pr-2,
.px-2 {
  padding-right: 0.5rem !important;
}

.pb-2,
.py-2 {
  padding-bottom: 0.5rem !important;
}

.pl-2,
.px-2 {
  padding-left: 0.5rem !important;
}

.p-3 {
  padding: 1rem !important;
}

.pt-3,
.py-3 {
  padding-top: 1rem !important;
}

.pr-3,
.px-3 {
  padding-right: 1rem !important;
}

.pb-3,
.py-3 {
  padding-bottom: 1rem !important;
}

.pl-3,
.px-3 {
  padding-left: 1rem !important;
}

.p-4 {
  padding: 1.5rem !important;
}

.pt-4,
.py-4 {
  padding-top: 1.5rem !important;
}

.pr-4,
.px-4 {
  padding-right: 1.5rem !important;
}

.pb-4,
.py-4 {
  padding-bottom: 1.5rem !important;
}

.pl-4,
.px-4 {
  padding-left: 1.5rem !important;
}

.p-5 {
  padding: 3rem !important;
}

.pt-5,
.py-5 {
  padding-top: 3rem !important;
}

.pr-5,
.px-5 {
  padding-right: 3rem !important;
}

.pb-5,
.py-5 {
  padding-bottom: 3rem !important;
}

.pl-5,
.px-5 {
  padding-left: 3rem !important;
}

.m-n1 {
  margin: -0.25rem !important;
}

.mt-n1,
.my-n1 {
  margin-top: -0.25rem !important;
}

.mr-n1,
.mx-n1 {
  margin-right: -0.25rem !important;
}

.mb-n1,
.my-n1 {
  margin-bottom: -0.25rem !important;
}

.ml-n1,
.mx-n1 {
  margin-left: -0.25rem !important;
}

.m-n2 {
  margin: -0.5rem !important;
}

.mt-n2,
.my-n2 {
  margin-top: -0.5rem !important;
}

.mr-n2,
.mx-n2 {
  margin-right: -0.5rem !important;
}

.mb-n2,
.my-n2 {
  margin-bottom: -0.5rem !important;
}

.ml-n2,
.mx-n2 {
  margin-left: -0.5rem !important;
}

.m-n3 {
  margin: -1rem !important;
}

.mt-n3,
.my-n3 {
  margin-top: -1rem !important;
}

.mr-n3,
.mx-n3 {
  margin-right: -1rem !important;
}

.mb-n3,
.my-n3 {
  margin-bottom: -1rem !important;
}

.ml-n3,
.mx-n3 {
  margin-left: -1rem !important;
}

.m-n4 {
  margin: -1.5rem !important;
}

.mt-n4,
.my-n4 {
  margin-top: -1.5rem !important;
}

.mr-n4,
.mx-n4 {
  margin-right: -1.5rem !important;
}

.mb-n4,
.my-n4 {
  margin-bottom: -1.5rem !important;
}

.ml-n4,
.mx-n4 {
  margin-left: -1.5rem !important;
}

.m-n5 {
  margin: -3rem !important;
}

.mt-n5,
.my-n5 {
  margin-top: -3rem !important;
}

.mr-n5,
.mx-n5 {
  margin-right: -3rem !important;
}

.mb-n5,
.my-n5 {
  margin-bottom: -3rem !important;
}

.ml-n5,
.mx-n5 {
  margin-left: -3rem !important;
}

.m-auto {
  margin: auto !important;
}

.mt-auto,
.my-auto {
  margin-top: auto !important;
}

.mr-auto,
.mx-auto {
  margin-right: auto !important;
}

.mb-auto,
.my-auto {
  margin-bottom: auto !important;
}

.ml-auto,
.mx-auto {
  margin-left: auto !important;
}

table tr td {
    padding: 3px 0 0;
    margin: 0;
    vertical-align: top!important;
    font-size: 9px;
}

.width-first-td {
    width: 55px;
}

</style>
</head>
<body>

<table class="full-width">
    <tr>
       
        <td width="20%">
            <div class="company_logo_box">
                <!--<img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>assets/logo/logo_empresa.png" class="company_logo" style="max-width: 150px;">
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/logo/logo_empresa.png';?>"/>
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'\assets/logo/logo_empresa.png';?>"/>
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'./assets/logo/logo_empresa.png';?>"/>
                <img src="./assets/logo/logo_empresa.png"/>
                <img src="assets/logo/logo_empresa.png"/>
                <img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>./assets/logo/logo_empresa.png" class="company_logo" style="max-width: 150px;">
                <img src="<?php echo base_url('application/assets/logo/logo_empresa.png')?>" class="company_logo" style="max-width: 150px;">-->
              
             
            </div>
        </td>
  
        <td width="50%" class="pl-3">
            <div class="text-left">
                <p><b><?=$title?><b></p>
                <p><!--RUC-->11111111111</p>
                <p>
                  <!--Dirección-->Lima - Perú
                </p> 
                <p><!--Correo--> administracion@management.com</p>
                <p><!--Telefono--> 01-123456</p>
            </div>
        </td>
        <td width="30%" class="border-box py-4 px-2 text-center">
            <h5 class="text-center"><?=$document?></h5>
            <h3 class="text-center"><?=str_pad($reservation_id, 5, '0', STR_PAD_LEFT);?></h3>
        </td>
    </tr>
</table>
<table class="full-width mt-5">
    <tr>
        <td width="120px">DNI</td>
        <td width="8px">:</td>
        <td><?=$customer_TCno?></td>
    </tr>
 
    <tr>
        <td>CLIENTE</td>
        <td width="8px">:</td>
        <td>
        <?
        foreach ($customer as $k=>$rt) {
        ?>
           <?=$rt->customer_lastname.' '.$rt->customer_firstname ?>"					
        <?
        }
        ?>
        </td>
    </tr>
   
    <tr>
        <td>TELÉFONO:</td>
        <td>:</td>
        <td><?=$customer[0]->customer_telephone ?></td>
    </tr>
    <tr>
        <td>E-MAIL</td>
        <td>:</td>
        <td><?=$customer[0]->customer_email ?></td>
    </tr>
   
</table>
<table class="full-width mt-10 mb-10">
    <thead class="">
    <tr class="bg-grey">
        <th class="border-top-bottom text-center py-2" width="12%">T. HABIT.</th>
        <th class="border-top-bottom text-center py-2" width="12%">T. ALQ.</th>
        <th class="border-top-bottom text-left py-2" width="12%">CHECK-IN FECHA</th>
        <th class="border-top-bottom text-left py-2" width="12%">CHECK-OUT FECHA</th>
        <th class="border-top-bottom text-right py-2" width="8%">CHECK-IN HORA</th>
        <th class="border-top-bottom text-right py-2" width="8%">CHECK-OUT HORA</th>
        <th class="border-top-bottom text-right py-2" width="8%">DÍAS</th>
        <th class="border-top-bottom text-right py-2" width="8%">HORAS</th>
        <th class="border-top-bottom text-right py-2" width="12%">TOTAL</th>
    </tr>
    </thead>
    <tbody>
   
        <tr>
            <td class="text-center align-top"><?=$room_type?></td>
            <td class="text-center align-top">
                <?
                foreach ($type_rental as $k=>$rt) {						
                    if($rt->type_rental_id == $type_rental_id){
                        $type_rental_desc = $rt->type_rental;
                ?>
                <?=$rt->type_rental ?>					
                <?
                    }
                }
                ?>	
            </td>
            <td class="text-center align-top"><?=$checkin_date?></td>
            <td class="text-center align-top"><?=$checkout_date?></td>
            <td class="text-center align-top"><?=$start_time?></td>
            <td class="text-center align-top"><?=$end_time?></td>
            <td class="text-center align-top"><?=$nro_days?></td>
            <td class="text-center align-top"><?=$nro_hours?></td>
            <td class="text-right align-top"><?=$reservation_price?></td>
            
        </tr>
        <tr>
            <td colspan="8" class="border-bottom"></td>

        <tr>
            <td colspan="8" class="text-right font-bold">TOTAL A PAGAR: S/</td>
            <td class="text-right font-bold"><?=$reservation_price?></td>
        </tr>
    </tbody>
</table>


</body>
</html>