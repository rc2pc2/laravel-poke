<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="https://i.pinimg.com/originals/c7/d7/02/c7d70249300e5473a14ded83c694d242.png" alt="Logo" class="d-inline-block align-text-top brand-logo me-5">
            <a class="navbar-brand me-5" href="#">
                Laravel Pokemon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('guest.home') }}">
                    Homepage
                </a>

                <a class="nav-link" href="{{ route('guest.pokemon.index') }}">
                    Pokemons
                </a>
            </div>
            </div>
        </div>
    </nav>
</header>