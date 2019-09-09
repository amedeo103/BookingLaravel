@extends('layout\master')

@section('title')
All reservations
@endsection()

@section('content')

<div id="app">
  <div class="container">
    <reservations></reservations>

  </div>
</div>
<script src="{{asset('js/app.js')}}"> </script>
@endsection()
