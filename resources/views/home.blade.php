@extends('layouts.app')

@section('content')
<div class="container">
<h1>User Dashboard </h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div class="card-header">{{ __('User Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Login Successful!') }}
                </div>

            </div>
            
        <div class="card">
        <div class="card-header">Equipments</div>
        <div class="card-body"></div>

            
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>No. of pieces</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ $medicine->quantity }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
        </div>
    </div>
</div>
@endsection
