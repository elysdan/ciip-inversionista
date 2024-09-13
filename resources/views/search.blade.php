
@extends('layouts.panel')
@section('content')
    

<form class="d-flex m-auto w-50 " role="search" >
            <input class="form-control me-2 mt-5" type="search" placeholder="Ingrese Nombre, Cedula o Rif" aria-label="Search" style="font-size: 2vw;border-radius:3rem;text-align: center;align-items: center;">
            <button class="btn btn-outline-primary mt-5 p-0" type="submit" style="font-size:2vh;width: 4.5vw;border-radius:3rem;align-items: center;" > <svg class="bi p-0  "  align="center"><use xlink:href="#search"/></svg></button>
          </form>


          @endsection     