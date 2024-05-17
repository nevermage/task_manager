@section('title', 'Edit ' . $number)

<x-app-layout>
    <div class="ticket-container">
        <input hidden="hidden" type="text" id="ticket-number" value="{{ $number }}"/>
        <label for="title">Title</label><input type="text" id="title" value="{{ $ticket->title }}"/><br>
        <label for="priority">Priority</label><select name="priority" id="priority">
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}" @if($priority->id == $ticket->priority_id) selected @endif>
                    {{ $priority->title }}
                </option>
            @endforeach
        </select><br>
{{--        <label for="version">Version</label><input type="text" id="version"/><br>--}}
        <label for="description">Description</label><input type="text" id="description" value="{{ $ticket->description }}"/><br>
        <button onclick="createTicket()">Save</button>
    </div>

    <script>
        const baseUrl = 'http://manager.docker/';

        async function createTicket() {
            validate();

            let token = document.querySelector('meta[name="csrf-token"]').content;

            let data = {
                number: document.getElementById('ticket-number').value,
                title: document.getElementById('title').value,
                priority_id: document.getElementById('priority').value,
                // version: document.getElementById('version').value,
                description: document.getElementById('description').value ? document.getElementById('description').value : ''
            };

            let request = await fetch(baseUrl + 'ticket/save', {
                method: "PATCH",
                mode: "cors",
                cache: "no-cache",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': token,
                },
                redirect: "follow",
                referrerPolicy: "no-referrer",
                body: JSON.stringify(data),
            });

            let response = await request.json();

            if (request.ok) {
                let number = response.data.number;
                window.location.replace(baseUrl + 'ticket/' + number)
            }
        }

        function validate () {
        }
    </script>
</x-app-layout>
