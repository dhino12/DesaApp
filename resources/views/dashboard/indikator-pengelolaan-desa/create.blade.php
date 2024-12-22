@extends('dashboard/layouts/main')

@section('container_content')
    @include('components.stepper.stepper', [ 'provinces' => $provinces])
@endsection
