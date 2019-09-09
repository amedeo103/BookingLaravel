@extends('layout\master')

@section('title')
Edit unit
@endsection()

@section('content')

<div id="app">
  <div class="container">
    <unit-edit></unit-edit>

  </div>
</div>
<script src="{{asset('js/app.js')}}"> </script>
@endsection()
