@extends('layouts.aplicacion')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class='fas fa-digital-tachograph' style='font-size:36px'></i>
        Panel de Control
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
           <!-- @ foreach($listaDatos as $dato)
              <h3>{ {$dato['numero']}}</h3>
              @ endforeach-->
              <p>Productos</p>
              <br>
            </div>
            <div class="icon">
            <span class="fas fa-archive"></span>
            </div>
            <a href="{{route('productos.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
           <!-- @ foreach($listaDatos as $dato)
              <h3>{ {$dato['numero']}}</h3>
              @ endforeach-->
              <p>Inventario</p>
              <br>
            </div>
            <div class="icon">
            <span class="fas fa-clipboard"></span>
            </div>
            <a href="{{route('productos.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
           <!-- @ foreach($listaDatos as $dato)
              <h3>{ {$dato['numero']}}</h3>
              @ endforeach-->
              <p>Proveedores</p>
              <br>
            </div>
            <div class="icon">
            <span class="fas fa-truck"></span>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
           <!-- @ foreach($listaDatos as $dato)
              <h3>{ {$dato['numero']}}</h3>
              @ endforeach-->
              <p>Reportes</p>
              <br>
            </div>
            <div class="icon">
            <span class="fas fa-paste"></span>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

        </seccion>

@endsection