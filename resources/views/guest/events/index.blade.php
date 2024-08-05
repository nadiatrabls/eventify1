@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Liste des événements</h1>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date->format('d/m/Y H:i') }}</p>
                        <p class="card-text"><strong>Lieu:</strong> {{ $event->location }}</p>
                        @auth
                            <form action="{{ route('events.reserve', $event) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Réserver</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Se Connecter pour Réserver</a>
                            <br>
                            <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire pour Réserver</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

