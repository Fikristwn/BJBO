<header class="header_area">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/templates/user/img/BJBO.png') }}" alt="Logo" style="height: 50px;">
            </a>
            <!-- Toggle Button for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('layout') }}">Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#founder">founder</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
