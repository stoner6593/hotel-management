<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
	        rel="stylesheet">
	<link href="<?php echo base_url()?>css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/pages/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url()?>css/pages/signin.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>js/guidely/guidely.css" rel="stylesheet"> 
  <link href="<?php echo base_url()?>css/bootstrap-select.css" rel="stylesheet">

  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
  </head>
  <body style="margin-bottom: 50px;">
  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="/"><i class="icon-home"></i> <?=HOTEL_NAME?></a>
      <?
        if(UID){
          ?>
          <div class="nav-collapse">
            <ul class="nav pull-right">
              <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Account <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="javascript:;">Settings</a></li>
                  <li><a href="javascript:;">Help</a></li>
                </ul>
              </li> -->
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                  class="icon-user"></i> <?=FULLNAME?> (<?=USERNAME?>) <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/login/logout">Salir</a></li>
                  </ul>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=DEPARTMENT_NAME?></a>
                </li>
              </ul>
              <form class="navbar-search pull-right" action="/search" method="POST">
                <input type="text" name="customer" class="search-query" placeholder="Buscar Cliente">
              </form>
          </div>
          <!--/.nav-collapse --> 
      <? } ?>
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?
  if(UID)
{?>
    <? 
      if(DEPARTMENT_ID == 1){
    ?>
      <div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
              <li <? if($page == "dashboard"){ echo 'class="active"'; } ?>><a href="/"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
              <li <? if($page == "customer"){ echo 'class="active"'; } ?>><a href="/customer"><i class="icon-male"></i><span>Clientes</span> </a> </li>
              <li <? if($page == "employee"){ echo 'class="active"'; } ?>><a href="/employee"><i class="icon-user"></i><span>Empleados</span> </a> </li>
              <!-- <li <? if($page == "reservation"){ echo 'class="active"'; } ?>><a href="/reservation"><i class="icon-list-alt"></i><span>Reservation</span> </a> </li> -->
              <li class="dropdown <? if($page == "reservation" || $page == "reservation"){ echo 'active'; } ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reservación</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/reservation">Reservar</a></li>
                  <li><a href="/reservation/list_report">Reporte Reservaciones</a></li>
                </ul>
              </li>
              <li class="dropdown <? if($page == "room" || $page == "room_type"){ echo 'active'; } ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-home"></i><span>Habitaciones</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/room">Habitaciones</a></li>
                  <li><a href="/room-type">Tipo Habitación</a></li>
                </ul>
              </li>
              <li <? if($page == "departments"){ echo 'class="active"'; } ?>><a href="/departments"><i class="icon-file"></i><span>Departamentos</span> </a> </li>
              <li <? if($page == "restaurant"){ echo 'class="active"'; } ?>><a href="/restaurant"><i class="icon-fire"></i><span>Restaurantes</span> </a> </li>
              <li <? if($page == "medical_service"){ echo 'class="active"'; } ?>><a href="/medical_service"><i class="icon-user-md"></i><span>Servicio médico</span> </a> </li>
              <li <? if($page == "sport_facility"){ echo 'class="active"'; } ?>><a href="/sport_facility"><i class="icon-trophy "></i><span>Instalación deportiva</span> </a> </li>
              <li <? if($page == "massage_room"){ echo 'class="active"'; } ?>><a href="/massage_room"><i class="icon-retweet "></i><span>Sala de masaje</span> </a> </li>
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>
    <?
    }
    ?>

    <? 
      if(DEPARTMENT_ID == 3){
    ?>
      <div class="subnavbar">
        <div class="subnavbar-inner">
          <div class="container">
            <ul class="mainnav">
              <li <? if($page == "dashboard"){ echo 'class="active"'; } ?>><a href="/"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
              <li <? if($page == "customer"){ echo 'class="active"'; } ?>><a href="/customer"><i class="icon-male"></i><span>Clientes</span> </a> </li>              
              <!-- <li <? if($page == "reservation"){ echo 'class="active"'; } ?>><a href="/reservation"><i class="icon-list-alt"></i><span>Reservation</span> </a> </li> -->
              <li class="dropdown <? if($page == "reservation" || $page == "reservation"){ echo 'active'; } ?>"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Reservación</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/reservation">Reservar</a></li>
                  <li><a href="/reservation/list_report">Reporte Reservaciones</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
      </div>
    <?
    }
    ?>
<? } ?>
<!-- /subnavbar -->