@extends('layouts.user.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    
@endsection

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Gambar di sebelah kiri -->
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                            </div>
                        </div>
                        <!-- Konten teks di sebelah kanan -->
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1><br></h1>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- End Banner Area -->

    <!-- Start Product Area -->
    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <h1 class="text-center my-4">Founder</h1>
            <!-- Start Founder Card Section -->
            <section id="founder" class="founder-card-section py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Card 1 -->
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card text-center">
                                <img src="{{ asset('assets/founders/founder1.jpg') }}" class="card-img-top" alt="Founder 1" style="height: 400px;  width: 100%; object-fit: cover; border-radius: 8px;">
                                <div class="card-body">
                                    <h5 class="card-title">Sandy Mulia Kesuma</h5>
                                    <p class="card-text">Project Manager</p>
                                    <a href="https://www.instagram.com/subarukunowo/" class="btn btn-primary" target="_blank">
                                        Follow
                                    </a>
                                </div>
                            </div>
                        </div>
            
                        <!-- Card 2 -->
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card text-center">
                                <img src="{{ asset('assets/founders/founder3.jpg') }}" class="card-img-top" alt="Founder 2" style="height: 400px;  width: 100%; object-fit: cover; border-radius: 8px;">
                                <div class="card-body">
                                    <h5 class="card-title">Dimas Rio Ardianto</h5>
                                    <p class="card-text">UI/UX Designer</p>
                                    <a href="https://www.instagram.com/dimasrioardianto/" class="btn btn-primary" target="_blank">
                                        Follow
                                    </a>
                                </div>
                            </div>
                        </div>
            
                        <!-- Card 3 -->
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card text-center">
                                <img src="{{ asset('assets/founders/founder2.jpg') }}" class="card-img-top" alt="Founder 3" style="height: 400px;  width: 100%; object-fit: cover; border-radius: 8px;">
                                <div class="card-body">
                                    <h5 class="card-title">Muhammad Yusri</h5>
                                    <p class="card-text">UI/UX Designer</p>
                                    <a href="https://www.instagram.com/bgyusg/" class="btn btn-primary" target="_blank">
                                        Follow
                                    </a>
                                </div>
                            </div>
                        </div>
            
                        <!-- Card 4 -->
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card text-center">
                                <img src="{{ asset('assets/founders/founder4.jpeg') }}" class="card-img-top" alt="Founder 4" style="height: 400px;  width: 100%; object-fit: cover; border-radius: 8px;" >
                                
                                <div class="card-body">
                                    <h5 class="card-title">M Fikri Setiawan</h5>
                                    <p class="card-text">Programmer</p>
                                    <a href="https://www.instagram.com/muhammad_fkriiiiii/" class="btn btn-primary" target="_blank">
                                        Follow
                                    </a>
                                </div>
                            </div>
                        </div>
            
                        <!-- Card 5 -->
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card text-center">
                                <img src="{{ asset('assets/founders/founder5.jpg') }}" class="card-img-top" alt="Founder 5" style="height: 400px;  width: 100%; object-fit: cover; border-radius: 8px;">
                                <div class="card-body">
                                    <h5 class="card-title">Riski Afendi</h5>
                                    <p class="card-text">System Analyst</p>
                                    <a href="https://www.instagram.com/riski_star_19/" class="btn btn-primary" target="_blank">
                                        Follow
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
<!-- End Founder Card Section -->

                
        

            <h1 class="text-center my-4">Produk</h1>
          
    </section>
    <!-- End Product Area -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
@endsection