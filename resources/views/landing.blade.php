@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('components.hero')
    
    <!-- Features Section -->
    @include('components.features')
    
    <!-- Testimonials Section -->
    <div id="testimonials">
        @include('components.testimonials')
    </div>
    
    <!-- Footer/Contact Section -->
    @include('components.footer')
@endsection
