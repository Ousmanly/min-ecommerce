<x-visitor.layout>


    <div class="note-container">
        <div class="col-12 col-lg-9 center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Confirmation de la Commande</h5>
                </div>
                <div class="card-body">

                    <div class="img-center"><img src="{{ asset('storage/' . $product->image) }}" width="200" class="img-product mb-3"></div>
                    <form action="{{ route('visitor.order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="command d-flex justify-content-between">
                            <div class="lef-p">
                                <div class="d-flex flex-wrap mt-3 mb-3 justify-content-between top-w">
                                    <div class="d-flex flex-column mb-3 me-2 quantity">
                                        <label for="quantity">Quantité :</label>
                                        <input type="number" name="quantity" id="quantity" data-price="{{ $product->price }}" min="1" required class="form-control mt-2">
                                    </div>
                                    <div class="d-flex flex-column me-2 phone-number">
                                        <label for="phone_number">Numéro de téléphone :</label>
                                        <input type="text" name="phone_number" id="phone_number" required class="form-control mt-2">
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" id="email" class="form-control mt-2 ">
                                </div>
                            </div>
                            <div class="right-p">
                                <h5 class="mb-4">PU : {{$product->price}} MRU</h5>
                                <div >
                                    <h5 class="mb-1">Total</h5>
                                    <h5 id="total-price">0.00 MRU</h5>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn-orange">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-visitor.layout>