@section('title', $number)

<x-app-layout>
    <div class="ticket-container">
        <div>Number: {{ $number }}</div>
        <div>Title: {{ $title }}</div>
        <div>Status: {{ $status }}</div>
        <div>Priority: {{ $priorities[$priority] }}</div>
        <div>Description: {{ $description }}</div>
        <div>Version: {{ $version }}</div>
{{--        <div>Estimation time: {{ $estimationTime }}</div>--}}
{{--        <div>Time spent: {{ $timeSpent }}</div>--}}
        <div>Created: {{ $created }}</div>
        <div>Updated: {{ $updated }}</div>
        <a href="{{ route('editTicket', $number) }}">Edit</a>
    </div>
</x-app-layout>
