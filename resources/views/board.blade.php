@section('title', 'Board')

<x-app-layout>
    <div class="board-container">
        @foreach($columns as $columnTitle => $tickets)
            <div class="column">
                <div class="column-header">
                    {{ $columnTitle }}
                </div>
                <div class="column-content">
                    @foreach($tickets as $ticket)
                        <div class="ticket">
                            <div class="ticket-importance" style="color: {{ \App\Models\Priority::getColorByPriority($ticket['priorityId']) }}">
                                {{ \App\Models\Priority::getAsKeyValueArray()[$ticket['priorityId']] }}
                            </div>
                            <div class="ticket-number">
                                <a href="/ticket/{{ $ticket['number'] }}">{{ $ticket['number'] }}</a>
                            </div>
                            <div class="ticket-title">{{ $ticket['title'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
