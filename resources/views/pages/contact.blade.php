@extends('layout.app')
@section('content')

<!-- Page Content -->
<section class="py-3">
    <div class="container">
        <h1 class="text-center">
            Kontakt Os
        </h1>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <form>
            <div class="row py-1">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Fornavn" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Efternavn" required>
                </div>
            </div>
            <div class="row py-1">
                <div class="col">
                    <input type="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Angående" required>
                </div>
            </div>
            <div class="row py-1">
                <textarea class="form-control" placeholder="Besked" required></textarea>
            </div>
            <div class="row py-1">
                <button class="btn btn-primary" type="submit">Send Besked</button>
            </div>
        </form>
    </div>
</section>
@endsection