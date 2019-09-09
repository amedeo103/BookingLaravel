@extends('layout\master')

@section('title')
All units
@endsection()

@section('content')

<div id="app">
  <div class="container">
    <units-edit-all></units-edit-all>
    
  </div>
</div>
<script src="{{asset('js/app.js')}}"> </script>
@endsection()
