@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'événement</h1>
    <form action="{{ route('admin.events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $event->date->toDateString() }}" required>
        </div>
        <div class="form-group">
            <label for="time">Heure</label>
            <input type="time" name="time" class="form-control" id="time" value="{{ $event->date->format('H:i') }}" required>
        </div>
        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" id="location" value="{{ $event->location }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

