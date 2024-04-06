@extends('main');

@section('title', $number)

@section('content')
    <div class="ticket-container">
        <div>Number: {{ $number }}</div>
        <div>Title: {{ $title }}</div>
        <div>Priority: {{ $priority }}</div>
        <div>Description: {{ $description }}</div>
        <div>Version: {{ $version }}</div>
        <div>Estimation time: {{ $estimationTime }}</div>
        <div>Time spent: {{ $timeSpent }}</div>
        <div>Created: {{ $created }}</div>
        <div>Updated: {{ $updated }}</div>
    </div>
@endsection
