<x-layout>

    <div class="container">

        <div class="container-fluid">

            <div class="dashstats mx-2">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="dashstat d-flex">
                            <div class="wd-50">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <div class="dashstat_content">
                                    @if(isset($orders) && $orders->count() > 0)
                                    <h3>{{ $orders->count() }}</h3>
                                    @else
                                    <h3>0</h3>
                                    @endif

                                    <p>Total Orders</p>
                                </div>
                            </div>
                            <div class="bg-order">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="dashstat d-flex">
                            <div class="wd-50">
                                <i class="fa-solid fa-tag"></i>
                                <div class="dashstat_content">
                                    @if(isset($products) && $products->count() > 0)
                                    <h3>{{ $products->count() }}</h3>
                                    @else
                                    <h3>0</h3>
                                    @endif

                                    <p>Total Products</p>
                                </div>
                            </div>
                            <div class="bg-product"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="dashstat d-flex">
                            <div class="wd-50 ">
                                <i class="fa-solid fa-list-ul"></i>
                                <div class="dashstat_content">
                                    @if(isset($categories) && $categories->count() > 0)
                                    <h3>{{ $categories->count() }}</h3>
                                    @else
                                    <h3>0</h3>
                                    @endif
                                    <p>Total Categories</p>
                                </div>
                            </div>
                            <div class="bg-category"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navicards mx-2">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('order.index')}}">
                            <div class="navcard">
                                <div class="nc_left">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <p>Check Order History</p>
                                </div>

                                <div class="nc_right">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('product.create') }}">
                            <div class="navcard">
                                <div class="nc_left">
                                    <i class="fa-solid fa-tag"></i>
                                    <p>Add New Product</p>
                                </div>

                                <div class="nc_right">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>