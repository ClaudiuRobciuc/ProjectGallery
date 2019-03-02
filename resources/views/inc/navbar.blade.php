<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('frontpage.index') }}">AuthenCity</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('frontpage.index') }}">Forside</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontpage.prices') }}">Produkter & Priser</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    om
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('frontpage.prices') }}">Firmaet</a>
                    <a class="dropdown-item" href="{{ route('frontpage.prices') }}">Teamet</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('frontpage.prices') }}">Vores Vision</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontpage.contact') }}">Kontakt</a>
            </li>
        </ul>
    </div>
</nav>