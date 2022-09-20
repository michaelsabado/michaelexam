@extends('layouts.app')

@section('content')


<div class="container">
    <div class="d-flex py-5 justify-content-between">
           <div class="h1 fw-bold mb-0">User Profile</div>
           <div>
            <a href="/logout" class="btn btn-lg bg-dark text-white px-5">Logout</a>
           </div>
    </div>
    
    @if(session('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('message') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif

    <div class="h5 mb-0">Firstname</div>
    <div class="h3 fw-bold mb-3">{{ $user->firstname }}</div>
    <div class="h5 mb-0">Firstname</div>
    <div class="h3 fw-bold mb-3">{{ $user->lastname }}</div>
    <div class="h5 mb-0">Email</div>
    <div class="h3 fw-bold mb-3">{{ $user->email }}</div>
    <div class="h5 mb-0">Address</div>
    <div class="h3 fw-bold mb-3">{{ $user->address }}</div>
</div>


@endsection