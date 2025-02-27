<x-user.layout>
    <div class="welcome">
        <i>Browse our latest products</i>
        <button class="shop-btn">Shop all</button>
    </div>
    <div class="container">

        <div class="d-flex flex-wrap">
            @foreach ($products as $product )
            <div class="card center-product me-3 mb-2">
                <div class="img-div">
                    <img src="{{ asset('storage/' . $product->image) }}" width="200" class="img-product mb-3">
                </div>
                <div class="text-div">
                    <p>{{ $product->description}}</p>
                    <h2 class="mt-2 bold">{{ $product->price}} MRU</h2>
                    <a href="{{ route('user.order.create', $product->id) }}">
                        <button class="btn-orange">Commander</button></a>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</x-user-layout>