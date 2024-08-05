@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouvel événement</h1>
    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date" required>
        </div>
        <div class="form-group">
            <label for="time">Heure</label>
            <input type="time" name="time" class="form-control" id="time" required>
        </div>
        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" id="location" required>
        </div>
        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
