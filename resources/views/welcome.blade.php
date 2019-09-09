@extends('layout\master')

@section('title')
Booking
@endsection()

@section('content')
  <table>
    <tr>
      <td><button onclick="window.location='/reservation_index'" type="button" class="btn btn-info btn-lg" style="max-width:250px">Reservation <br><br> -book your desired property</button></td>
    </tr>
    <tr>
      <td><button onclick="window.location='/host'" type="button" class="btn btn-info btn-lg" style="max-width:250px">Host <br><br> - add/edit/delete, see reservation of property </button></td>
    </tr>
  </table>

@endsection()
