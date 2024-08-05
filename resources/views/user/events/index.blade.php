@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Événements</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->date->format('d/m/Y') }}</td>
                    <td>{{ $event->time->format('H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->category->name }}</td>
                    <td>
                        @if (Auth::user()->events->contains($event->id))
                            <form action="{{ route('user.reservations.destroy', $event) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Annuler</button>
                            </form>
                        @else
                            <form action="{{ route('user.reservations.store', $event) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Réserver</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
