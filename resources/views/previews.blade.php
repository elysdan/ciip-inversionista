@extends('layouts.panel')
@section('content')

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


<h2>Reporte de Verificación de Empresas</h2>

<table>
    <tr>
        <th>Objeto y Consideraciones de Interés</th>
        <td>Tiene por objeto realizar a través de la contratación de personal especializado, la prestación de servicios acuáticos y portuarios...</td>
    </tr>
    <tr>
        <th>Información General</th>
        <td></td>
    </tr>
    <tr>
        <th>Búsqueda en Lista</th>
        <td></td>
    </tr>
    <tr>
        <th>Razón Social</th>
        <td>{{$previa->razonsocial}}</td>
    </tr>
    </table>


    @endsection