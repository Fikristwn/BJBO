@extends('layouts.admin.main') 
@section('title', 'Admin Dashboard')

@section('content') 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#"> Dashboard </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengguna</h4>
                        </div>
                        <div class="card-body">
                            {{ $users }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Postingan</h4>
                        </div>
                        <div class="card-body">
                            {{ $postings }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Statistik Pengguna dan Postingan</h4>
            </div>
            <div class="card-body">
                <canvas id="userPostChart" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    // Data dari backend
    const userCount = {{ $users }};
    const postCount = {{ $postings }};

    // Konfigurasi Chart.js
    const ctx = document.getElementById('userPostChart').getContext('2d');
    const userPostChart = new Chart(ctx, {
        type: 'bar', // Jenis grafik: bar
        data: {
            labels: ['Pengguna', 'Postingan'], // Label kategori
            datasets: [{
                label: 'Jumlah',
                data: [userCount, postCount], // Data
                backgroundColor: ['#3498db', '#2ecc71'], // Warna batang
                borderColor: ['#2980b9', '#27ae60'], // Warna border
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true // Skala dimulai dari nol
                }
            }
        }
    });
</script>

