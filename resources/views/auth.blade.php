@extends('layouts.master')
@section('content')
<div class="item-container centered">
  <div class="item-container-content">
    <div class="item">
        <b>Hey, {{{$user->full_name}}}!</b><br/><br/>
        @if ($user->profile_picture && $user->profile_picture != "")
            <img class="profile-picture" src="{{{$user->profile_picture}}}" /><br/><br/>
        @endif
    </div>
  </div>
</div>

<div class="item-container">
    <div class="button-container">
        <input type="button" class="item-button" value="Ok, close this!" onClick="location.href='pebblejs://close#{{$options}}'">
    </div>
</div>
@endsection
