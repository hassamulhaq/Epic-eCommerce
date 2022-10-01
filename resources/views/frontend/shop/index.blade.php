@extends('layouts.frontend')

@section('content')
    <x-frontend.shop-products :products="$products"></x-frontend.shop-products>
@endsection
