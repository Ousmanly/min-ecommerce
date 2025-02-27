<x-layout>
    <div class="note-container">

        <a href="{{route('note.create')}}"><button class="btn btn-primary mb-4">Add New Note</button></a>
        @foreach ($notes as $note )
        <div class="card mb-4 p-4">
            <p>{{ Str::words($note->note, 30)}}</p>
            <div class="d-flex">
                <a href="{{route('note.edit', $note->id)}}"> <button class="btn btn-primary mt-3 me-3">Edit</button></a>
                <a href="{{route('note.show', $note->id)}}"><button class="btn btn-info mt-3 me-3">Show</button></a>
                <form action="{{route('note.destroy', $note->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3 me-3">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        {{$notes->links()}}
    </div>
</x-layout>