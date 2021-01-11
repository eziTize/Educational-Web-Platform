@extends('custom-theme.master_profile')
@section('cdn')
@endsection
@section('content')
  <div class="container" style="margin-top: 15vh;" id="app">
    <div class="row">
      <div class="col-md-3">
        @include('messages.shared.users')
      </div>
      <div class="col-md-9">
        <chat-component :auth-user="{{ auth()->user() }}" :other-user="{{ $otherUser }}"></chat-component>
      </div>
    </div>
  </div>
@endsection