@extends('layouts.yellow.master')

@section('title', 'Home')

@section('content')

@include('partials.slides')

@foreach($sections as $section)
<!-- .block-products-carousel -->
@includeWhen($section->type == 'carousel-grid', 'partials.products.carousel.grid', [
    'title' => $section->title,
    'products' => $section->products(),
    'rows' => optional($section->data)->rows,
    'cols' => optional($section->data)->cols,
])
@includeWhen($section->type == 'pure-grid', 'partials.products.pure-grid', [
    'title' => $section->title,
    'products' => $section->products(),
    'rows' => optional($section->data)->rows,
    'cols' => optional($section->data)->cols,
])
<!-- .block-products-carousel / end -->
@endforeach

@endsection
