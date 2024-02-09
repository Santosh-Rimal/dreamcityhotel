@extends('layouts.admin.master')
@section('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .error-container {
            text-align: center;
            margin-top: 100px;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #dc3545;
        }

        .error-message {
            font-size: 24px;
            color: #343a40;
            margin-bottom: 30px;
        }

        .error-image {
            max-width: 100%;
            height: auto;
        }

        .back-home-btn {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 error-container">
                <div class="error-code">404</div>
                <div class="error-message">Oops! Page not found.</div>
                <a class="btn btn-primary back-home-btn" href="{{ route('dashboard') }}">Back to Dashboard</a>
            </div>
        </div>
    </div>
@endsection
