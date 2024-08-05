
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Réservations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Événement</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->event->title }}</td>
                    <td>{{ $booking->event->date->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
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
