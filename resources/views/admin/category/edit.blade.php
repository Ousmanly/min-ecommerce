<x-layout>

    <div class="note-container">
        <div class="col-12 col-lg-9 center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
                </div>
                <div class="card-body">

                    <form action="{{route('category.update' , $category)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="wd-5">
                            <label for="name" class="fw-bold mb-2">Category</label>
                            <input type="text" class="form-control mb-3" name="name" value="{{$category->name}}">
                        </div>
                        <div class="note-buttons">
                            <a href="{{route('category.index')}}" class="btn btn-danger text-white me-3">Cancel</a>
                            <button class="btn note-submit-button"><i class="bx bxl-telegram me-2"></i>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>