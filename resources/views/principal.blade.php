<?php
  $info = array(
    'contact'=>'Contact'
  );
?>
  @extends('layouts.main')
  @section('title','Principal')
  @section('titulo.header','Welcome my website')
  @section('text.header','Developer Backend PHP')
  @section('header')
    @include('layouts.header')
  @endsection
  @section('content')
    @include('contact')
    @include('listcontact')
  @endsection