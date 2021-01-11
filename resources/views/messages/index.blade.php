@extends('custom-theme.master_profile')
@section('content')
  <div class="container" style="margin-top: 15vh;">
    <div class="row">
      <div class="col-md-3">
        @include('messages.shared.users')
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body text-center">
            <p class="font-weight-bold" style="color: black;">You don’t have a chat selected</p>
            <p>Choose a user to continue an existing chat or start a new one.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('cdn')
@endsection