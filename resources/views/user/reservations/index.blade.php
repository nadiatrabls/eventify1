@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Réservations</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date->format('d/m/Y') }}</td>
                    <td>{{ $event->time->format('H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <form action="{{ route('user.reservations.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
