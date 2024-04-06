@section('title', 'Create ticket')

<x-app-layout>
    <div class="ticket-container">
        <label for="title">Title</label><input type="text" id="title"/><br>
        <label for="priority">Priority</label><input type="text" id="priority"/><br>
        <label for="version">Version</label><input type="text" id="version"/><br>
        <label for="description">Description</label><input type="text" id="description"/><br>
        <button onclick="createTicket()">Create</button>
    </div>

    <script>
        const baseUrl = 'http://manager.docker/';

        async function createTicket() {
            validate();

            let token = document.querySelector('meta[name="csrf-token"]').content;

            let data = {
                title: document.getElementById('title').value,
                priority: document.getElementById('priority').value,
                version: document.getElementById('version').value,
                description: document.getElementById('description').value
            };

            let request = await fetch(baseUrl + 'ticket/create', {
                method: "POST",
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
