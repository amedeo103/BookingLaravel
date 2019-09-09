@extends('layout\master')

@section('title')
Add unit
@endsection()

@section('content')

<div id="app">
  <div class="container">
    <add-unit></add-unit>

  </div>
</div>
<script src="{{asset('js/app.js')}}"> </script>
@endsection()
