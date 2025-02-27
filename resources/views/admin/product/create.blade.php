<x-layout>


    <div class="note-container">
        <div class="col-12 col-lg-9 center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Product</h5>
                </div>
                <div class="card-body">

                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="wd-5 me-3">
                                <label for="title" class="fw-bold mb-2">Product</label>
                                <input type="text" class="form-control mb-3" name="title">
                            </div>
                            <div class="wd-5">
                                <label for="image" class="fw-bold mb-2">Image</label>
                                <input type="file" class="form-control mb-3" name="image" accept="image/*" multiple>
                            </div>
                        </div>
                        <div class="d-flex">

                            <div class="wd-5 me-3">
                                <label for="price" class="fw-bold mb-2">Price</label>
                                <input type="number" class="form-control mb-3" name="price">
                            </div>
                            <div class="wd-5">
                                <label for="category_id" class="fw-bold mb-2">Category</label>
                                <select name="category_id" id="category_id" class="form-control mb-3">
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="description" class="fw-bold mb-2">Description</label>
                            <textarea class="form-control mb-3" id="description" name="description" rows="3"></textarea>

                        </div>
                        <div class="note-buttons">
                            <a href="{{route('product.index')}}" class="btn btn-danger text-white me-2">Cancel</a>
                            <button class="btn note-submit-button"><i class="bx bxl-telegram  me-2"></i>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>