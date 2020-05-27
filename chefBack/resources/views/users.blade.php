<?php 

use Illuminate\Support\Facades\DB;
$users = DB::table('users')->get();

?>

@extends('template')

@section('users')

    {{-- @foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
    @endforeach --}}
    PRUEBA
    
@endsection