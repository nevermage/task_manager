@section('title', $number)

<x-app-layout>
    <div class="ticket-container">
        <div class="top-container">
            <div class="top-left">
                <div class="ticket-item title">
                    <span class="parameter" style="white-space: nowrap;">{{ $number }}: </span>
                    <span class="value">{{ $title }}</span>
                </div>
                <div class="ticket-item left">
                    <span class="parameter">Status:</span>
                    <span class="value">{{ $status }}</span>
                </div>
                <div class="ticket-item left">
                    <span class="parameter">Priority:</span>
                    <span class="value">High</span>
                </div>
                <div class="ticket-item left">
                    <span class="parameter">Description:</span>
                    <span class="value">{{ $description }}</span>
                </div>
            </div>
            <div class="edit">
                <a class="edit-button" href="{{ route('editTicket', $number) }}">Edit</a>
            </div>
            <div class="top-right">
                <div class="ticket-item right assignee">
                    <span class="parameter">Assigned to:</span>
                    <span class="value">{{ $assignedUserName }}</span>
                </div>
                <div class="top-right-bottom">
                    <div class="ticket-item right">
                        <span class="parameter">Version:</span>
                        <span class="value">{{ $version }}</span>
                    </div>
                    <div class="ticket-item right">
                        <span class="parameter">Created:</span>
                        <span class="value">{{ $created }}</span>
                    </div>
                    <div class="ticket-item right">
                        <span class="parameter">Updated:</span>
                        <span class="value">{{ $updated }}</span>
                    </div>
                </div>
{{--                <a class="edit-button" href="{{ route('editTicket', $number) }}">Edit</a>--}}
            </div>
        </div>
    </div>

</x-app-layout>

<style>
    .ticket-container {
        width: 100%;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .top-container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 20px;
    }

    .top-left {
        width: 760px;
    }

    .top-right {
        text-align: -webkit-right;display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .assignee {
        padding: 0 10px !important;
        margin-top: 28px;
        background-color: inherit !important;
        box-shadow: none !important;
    }

    .assignee span {
        font-size: 18px !important;
    }

    .edit {
        margin-top: 30px;
    }

    .right {
        height: min-content;
        width: 310px !important;
        display: flex;
    }

    .left {
        font-size: 17px;
        background-color: #fff !important;
    }

    .title {
        background-color: inherit !important;
        box-shadow: none !important;
    }

    .title span {
        /*white-space: nowrap;*/
        font-size: 26px;
    }

    .ticket-item {
        /*width: 400px;*/
        /*background-color: #fff;*/
        background-color: #f4f4f4;
        border-radius: 5px;
        /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
        padding: 15px;
        /*display: flex;*/
        justify-content: space-between;
        align-items: center;
    }

    .parameter {
        font-weight: bold;
        margin-right: 10px;
    }

    .value {
        font-size: 16px;
    }

    .edit-button {
        grid-column: 1 / span 2;
        background-color: #525252;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .edit-button:hover {
        background-color: #656565;
    }
</style>
