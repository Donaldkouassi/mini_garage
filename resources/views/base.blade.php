<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Garage 2KYD')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Design proposal (branch: design/proposition) -->
    <link href="{{ asset('css/design-proposal.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #111827, #1f2937);
        }

        .hero-dashboard {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            border-radius: 24px;
            padding: 60px 40px;
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.20);
        }

        .hero-dashboard h1 {
            font-weight: 800;
            font-size: 3rem;
        }

        .hero-dashboard p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.92);
        }

        .dashboard-btn-primary {
            background-color: white;
            color: #1d4ed8;
            border: none;
            font-weight: 700;
            padding: 12px 22px;
            border-radius: 12px;
            transition: 0.3s ease;
        }

        .dashboard-btn-primary:hover {
            background-color: #e5edff;
            color: #1e40af;
        }

        .dashboard-btn-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.65);
            font-weight: 700;
            padding: 12px 22px;
            border-radius: 12px;
            transition: 0.3s ease;
        }

        .dashboard-btn-outline:hover {
            background: rgba(255,255,255,0.15);
            color: white;
            border-color: white;
        }

        .module-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            background: white;
            height: 100%;
        }

        .module-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(0,0,0,0.12);
        }

        .module-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 20px auto;
            color: white;
        }

        .icon-clients {
            background: linear-gradient(135deg, #7c3aed, #2563eb);
        }

        .icon-vehicules {
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
        }

        .icon-reparations {
            background: linear-gradient(135deg, #f97316, #ef4444);
        }

        .icon-techniciens {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .module-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .module-text {
            color: #4b5563;
            font-size: 1.08rem;
            min-height: 72px;
        }

        .module-btn {
            border-radius: 12px;
            font-weight: 700;
            padding: 10px 20px;
        }

        .footer-custom {
            color: #6b7280;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('garage.dashboard') }}">
                Garage 2KYD
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGarage">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarGarage">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('garage.clients.index') }}"
                           class="nav-link {{ request()->routeIs('garage.clients.*') ? 'active' : '' }}">
                            Clients
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('garage.vehicules.index') }}"
                           class="nav-link {{ request()->routeIs('garage.vehicules.*') ? 'active' : '' }}">
                            Véhicules
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('garage.reparations.index') }}"
                           class="nav-link {{ request()->routeIs('garage.reparations.*') ? 'active' : '' }}">
                            Réparations
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('garage.techniciens.index') }}"
                           class="nav-link {{ request()->routeIs('garage.techniciens.*') ? 'active' : '' }}">
                            Techniciens
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="text-center py-4 mt-5 footer-custom">
        <small>Garage 2KYD — Plateforme de gestion d’un garage de réparation automobile</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>