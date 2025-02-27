<x-user.layout>
    <div class="note-container">

        <div class="d-flex flex-wrap gap-4">
            @foreach ($categories as $category)
            <div class="card d-flex card-cat text-center">
                <!-- <div class="image"> -->
                <img src="{{ asset('storage/' . $category->image) }}" alt="" height="250px" width="250px" class="mx-img mb-2 inline-block" />
                <h3>{{$category->name}}</h3>
                <!-- </div> -->
                <div class="category d-flex align-items-center justify-content-center">
                    <a href="{{ route('user.products.byCategory', $category->id) }}" class="btn-orange mx-btn text-white">
                        Show products
                    </a>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</x-user.layout>