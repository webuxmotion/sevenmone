@extends('layouts.app')


@section('content')
<div class="container py-5 text-center">
    <h1 class="display-1 text-danger fw-bold">404</h1>
    <p class="fs-4 text-muted">Page Not Found</p>
    <a href="{{ localized_url('/') }}" class="btn btn-primary mt-3">Go to Homepage</a>
</div>
@endsection