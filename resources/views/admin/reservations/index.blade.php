@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Réservations</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Événement</th>
                <th>Réservations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>
                        @foreach ($event->users as $user)
                            <p>{{ $user->name }} ({{ $user->email }})</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
