@extends('layouts.app')


@section('content')
<div class="container">
@section('title','ADMIN DASHBOARD')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Admin!<br><br>
                   
                    <a href="{{ url('registeredusers') }}">Registered-Users</a><br><br>
                    <a href="{{ url('addproducts') }}">Add Products</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
