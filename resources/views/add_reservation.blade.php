@extends('layout\master')

@section('title')
Add Booking
@endsection()

@section('content')

<div id="app">
  <div class="container">
    <add-reservation></add-reservation>

  </div>
</div>
<script src="{{asset('js/app.js')}}"> </script>
@endsection()
