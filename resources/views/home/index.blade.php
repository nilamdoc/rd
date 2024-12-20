@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section accent-background" style="background-image: url('http://ruchidoctor.local/assets/img/hero-bg.png');background-size: cover;background-repeat: no-repeat;">
    <!-- <img src="{{ asset('assets/img/hero-bg.png') }}" alt="" data-aos="fade-in"> -->

    <div class="container text-center h-100 d-flex flex-column justify-content-end" data-aos="fade-up" data-aos-delay="100">
        <div class="content-bottom">
            <h1 class="bebas">
                CHOOSE TODAY TO BE <br> REMARKABLE FOR A LIFETIME
            </h1>
            <p class="lead roboto">Start living the life of your dreams. Take the first step and discover the results of your life.</p>
            <a href="{{ url('registration') }}" class="button button-fill">
                <span class="text-primary bebas ">Yes, I am ready to transform my life.</span>
                <span class="text-secondary roboto">Take the first step towards the life of your dreams now!</span>
            </a>
        </div>
    </div>
</section>


<!-- About Section -->
<section id="about" class="about section">
    <div class="container">
        <!-- Button at the bottom -->
        <div class="text-center">
            <a href="#" class="w-100 button button-fill">Click here to explore the tools of transformation</a>
        </div>
    </div>
</section>

<section id="services" class="services section">
    <!-- Section Title -->
    <div class="container h-100 justify-content-center">
        <div class="row align-items-center gy-4">
            <!-- Left-side div with smaller width -->
            <div class="col-xl-4 col-lg-5 col-md-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="video_text_div text-justify position-relative">
                    <h4 class="video_text">
                        Get to <br>know <br>Ruchi <br>Doctor
                    </h4>
                </div>
            </div>

            <!-- Right-side div with larger width for YouTube iframe -->
            <div class="col-xl-8 col-lg-7 col-md-12  d-flex" data-aos="fade-up" data-aos-delay="200">
				<div class="service-item position-relative" style="width:100%">
					<!-- YouTube Video Embed with responsive iframe -->
					<div class="youtube-video-container" style="position: relative; padding-bottom: 56.25%; height: 0; max-width: 100%; overflow: hidden;">
						<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services section">
    <!-- Section Title -->
    <div class="container">
        <div class="row gy-4">
            <!-- Full-width and centered text with larger font size -->
            <div class="video_text_div text-center position-relative" style="width: 100%;">
                <h1 class="font-weight-400 bebas">The world renowned</h1>
                <h1 class="font-weight-600 bebas">PEAK PERFORMANCE</h1>
                <h1 class="font-weight-600 bebas">STRATEGIST, SPEAKER</h1>
                <h1 class="font-weight-600 bebas">AND CONSULTANT</h1>
                <p class="bebas" style="font-size: 2.5rem;">Spain, India, Canada, Dubai, South Africa, Mauritius</p>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services section">
    <!-- Section Title -->
    <div class="container-fluid">
        <div class="row gy-4">
            <!-- Heading for The Author at the top of the section -->
            <div class="col-12 text-center video_text_div">
                <h2>The Author</h2>
            </div>
        </div>
    </div>
</section>


@endsection
