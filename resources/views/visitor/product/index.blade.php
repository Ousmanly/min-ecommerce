<x-visitor.layout>
    <div class="container">
        <div class="note-container">
            <div class="d-flex flex-wrap">
                @foreach ($products as $product )
                <div class="card center-product me-3 mb-2">
                    <div class="img-div">
                        <img src="{{ asset('storage/' . $product->image) }}" width="200" class="img-product mb-3">
                    </div>
                    <div class="text-div">
                        <p>{{ $product->description}}</p>
                        <h2 class="mt-2 bold">{{ $product->price}} MRU</h2>

                        <div class="d-flex mt-2">
                            <button class="btn btn-info me-3 show-category-btn" title="Show"
                                data-bs-toggle="modal"
                                data-bs-target="#productModal"
                                data-name="{{ $product->title }}"
                                data-created="{{ $product->created_at->format('Y-m-d') }}"
                                data-updated="{{ $product->updated_at->format('Y-m-d') }}"
                                data-user="{{ $product->user->name }}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</x-visitor.layout>
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3"><strong>Created At:</strong> <span id="modalCreated"></span></p>
                <p class="mb-3"><strong>Updated At:</strong> <span id="modalUpdated"></span></p>
                <p class="mb-3"><strong>Created By:</strong> <span id="modalUser"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>