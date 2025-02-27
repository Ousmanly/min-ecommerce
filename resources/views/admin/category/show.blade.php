<x-layout>
    <div class="note-container single-note">
        <div class="card card1">
            <div class="d-flex justify-content-between">
                <div class="child1">
                    <div class="details-category mb-3">
                        <span class="bold me-3">Category :</span> <span class="text-b"> {{$category->name}}</span>
                    </div>

                    <div class="details-category ">
                        <span class="bold me-3">Created At :</span> <span class="text-b"> {{$category->created_at->format('y-m-d')}}</span>
                    </div>
                </div>
                <div class="child1">
                    <div class="details-category mb-3">
                        <span class="bold me-3">Created By :</span> <span class="text-b"> {{$category->user->name}}</span>
                    </div>
                    <div class="details-category">
                        <span class="bold me-3">Updated At :</span> <span class="text-b"> {{$category->updated_at->format('y-m-d')}}</span>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{route('category.edit', $category)}}" class="note-edit-button">
                    <button class="btn btn-primary mt-3 me-3 size">Edit</button>
                </a>
                <form action="{{route('category.destroy', $category)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3 me-3 size">Delete</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>