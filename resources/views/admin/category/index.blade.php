<x-layout>
    <div class="note-container">

        <a href="{{route('category.create')}}"><button class="btn btn-primary-p mb-4"> <i class="fa-solid fa-plus me-2"></i>Add New Category</button></a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('category.edit', $category)}}">
                                    <button class="btn btn-primary me-3"  title="Edit"><i class="fa fa-pencil"></i></button>
                                </a>

                                <button class="btn btn-info me-3 show-category-btn" title="Show"
                                    data-bs-toggle="modal"
                                    data-bs-target="#categoryModal"
                                    data-name="{{ $category->name }}"
                                    data-created="{{ $category->created_at->format('Y-m-d') }}"
                                    data-updated="{{ $category->updated_at->format('Y-m-d') }}"
                                    data-user="{{ $category->user->name }}"
                                    data-products="{{ $category->product->count() }}">
                                    <i class="fa fa-eye" ></i>
                                </button>

                                <form action="{{route('category.destroy', $category)}}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn" title="delete"><i class="fa fa-trash" ></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</x-layout>
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
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
                <p class="mb-3"><strong>Total Product:</strong> <span id="modalProducts"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>