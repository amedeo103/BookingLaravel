@extends('layout\master')

@section('title')
Host
@endsection()

@section('content')
  <style type="text/css">
    .wrapper {
        text-align: center;
        font-size: 40px;
    }
    .wrapper ul {
        display: inline-table;
        text-align: left;
    }
    .wrapper ul li{
      padding-bottom: 25px;
    }

</style>
  <div class="wrapper">

  <ul class="list-unstyled">
    <li>
      <a href="show_all_units">Show all units</a>
    </li>
    <li>
      <a href="add_unit">Add unit</a>
    </li>
    <li>
      <a href="show_all_reservations">Show all reservations</a>
    </li>

  </ul>
</div>

@endsection()
