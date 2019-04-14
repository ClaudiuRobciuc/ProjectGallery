<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontpage.index') }}">AuthenCity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('frontpage.index') }}">Forside <span class="sr-only">(nuværende)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontpage.prices') }}">Priser</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontpage.about') }}">Om os</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontpage.services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontpage.contact') }}">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
