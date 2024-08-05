@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Événements</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
