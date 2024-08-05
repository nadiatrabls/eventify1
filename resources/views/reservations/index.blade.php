@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Réservations</h1>

    @if($reservations->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Événement</th>
                    <th>Date</th>
                    <th>Lieu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->title }}</td>
                        <td>{{ $reservation->date->format('d/m/Y H:i') }}</td>
                        <td>{{ $reservation->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune réservation trouvée.</p>
    @endif
</div>
@endsection
