<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Covoiturage Local</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|inter:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
    .font-display { font-family: 'Playfair Display', serif; }

    .hero {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(180deg, #000000 0%, #0a0e27 50%, #000000 100%);
        overflow: hidden;
    }

    .stars, .stars2, .stars3 {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-repeat: repeat;
        pointer-events: none;n 
    }

    .stars {
        background-image:
            radial-gradient(1.5px 1.5px at 20px 30px, white, transparent),
            radial-gradient(1.5px 1.5px at 90px 90px, white, transparent),
            radial-gradient(1px 1px at 150px 50px, white, transparent),
            radial-gradient(1.5px 1.5px at 200px 120px, white, transparent),
            radial-gradient(1px 1px at 250px 20px, white, transparent);
        background-size: 280px 280px;
        animation: twinkle 3s ease-in-out infinite alternate;
    }

    .stars2 {
        background-image:
            radial-gradient(1px 1px at 60px 10px, white, transparent),
            radial-gradient(1.5px 1.5px at 120px 60px, white, transparent),
            radial-gradient(1px 1px at 180px 100px, white, transparent),
            radial-gradient(1.5px 1.5px at 240px 40px, white, transparent);
        background-size: 320px 320px;
        animation: twinkle 4s ease-in-out infinite alternate-reverse;
    }

    @keyframes twinkle {
        0% { opacity: 0.3; }
        100% { opacity: 1; }
    }
</style>
</head>
<body class="text-gray-800" style="font-family: 'Inter', sans-serif;">

    <div class="hero flex flex-col">
        <div class="stars"></div>
    <div class="stars2"></div>
        {{-- Navigation --}}
        <nav class="max-w-6xl mx-auto w-full px-6 py-6 flex justify-between items-center">
            <span class="text-xl font-semibold text-white">🚗 Covoiturage Local</span>
            <div class="flex gap-6 items-center">
                <a href="{{ route('trajets.index') }}" class="text-white/90 hover:text-white text-sm">Trajets</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-gray-900 px-5 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="text-white/90 hover:text-white text-sm">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-white text-gray-900 px-5 py-2 rounded-md text-sm font-medium">S'inscrire</a>
                @endauth
            </div>
        </nav>

      {{-- Hero content --}}
<div class="flex-1 flex flex-col items-center justify-center text-center px-6">
    <span class="text-white/80 tracking-[0.3em] text-xs font-medium border border-white/40 px-4 py-2 rounded-full mb-6">
        BIENVENUE SUR
    </span>
    <h1 class="font-display text-5xl md:text-7xl text-white mb-4">
        Covoiturage Local
    </h1>
    <p class="text-white/85 text-xl font-display italic mb-8">
        Voyagez ensemble, dépensez moins
    </p>
    <a href="{{ route('trajets.index') }}" class="bg-white text-gray-900 px-8 py-3 rounded-md text-sm font-semibold tracking-wide hover:bg-gray-100 mb-10">
        VOIR LES TRAJETS
    </a>
    <img src="{{ asset('images/hero-car.jpg') }}" alt="Voiture" class="w-full max-w-2xl rounded-lg shadow-2xl opacity-95">
</div>
    </div>

    {{-- Comment ça marche --}}
    <section class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="font-display text-3xl text-center mb-12 text-gray-900">Comment ça marche ?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="text-center">
                    <div class="text-3xl mb-3">📝</div>
                    <h3 class="font-semibold mb-2">Créez votre compte</h3>
                    <p class="text-gray-600 text-sm">Inscrivez-vous en quelques secondes avec vos informations de base.</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl mb-3">🚙</div>
                    <h3 class="font-semibold mb-2">Enregistrez votre véhicule</h3>
                    <p class="text-gray-600 text-sm">Ajoutez les infos de votre véhicule pour proposer des trajets.</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl mb-3">📍</div>
                    <h3 class="font-semibold mb-2">Proposez ou trouvez un trajet</h3>
                    <p class="text-gray-600 text-sm">Publiez vos trajets ou consultez ceux des autres conducteurs.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-8 text-center text-gray-500 text-sm bg-white">
        © {{ date('Y') }} Covoiturage Local — Projet réalisé par Rebecca dans le cadre d'un TP ESAG-NDE
    </footer>

</body>
</html>