@extends('layouts.master')
@section('content')

<div class="item-container centered">
  <div class="item-container-content">
    <div class="item">
        Please login below!<br/>
        <div class="timer-loader" style="display:none;">
          Loading…
        </div>
    </div>
  </div>
</div>

<div class="item-container">
    <div class="button-container">
        <input id="login" type="button" value="Login!" class="item-button">
    </div>
</div>
@endsection
