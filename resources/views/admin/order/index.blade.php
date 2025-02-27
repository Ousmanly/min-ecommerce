<x-layout>
    <div class="note-container">

        <div class="table-responsive ">
            <table class="table table-striped table-bordered border-b">
                <thead>
                    <tr class="tr">
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    @if($order->order_details->isNotEmpty() && (
                    $order->order_details->first()->phone_number !== null ||
                    $order->order_details->first()->created_at !== null ||
                    $order->order_details->first()->email !== null
                    ))
                    <tr class="align-middle tr">
                        <td>{{ $order->id}}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <div>
                                    <img src="{{ asset('storage/' . $order->order_details->first()->product->image) }}" width="80" class="img-product mb-3">
                                </div>
                                <div>
                                    {{$order->order_details->first()->product->price}} MRU
                                </div>
                            </div>
                        </td>
                        <td>{{ $order->order_details->first()->quantity?? 'N/A' }}</td>
                        <td>{{ $order->order_details->first()->phone_number ?? 'N/A' }}</td>
                        <td>{{ $order->order_details->first()->created_at ?? 'N/A' }}</td>
                        <td>{{ $order->order_details->first()->email ?? 'N/A' }}</td>
                        @php
                        $statusClass = match($order->status) {
                        'confirmé' => 'bg-primary',
                        'validé' => 'bg-success',
                        'en attente' => 'bg-warning border-e',
                        'rejeté' => 'bg-danger',
                        default => 'bg-secondary'
                        };
                        @endphp
                        <td class="status-cell">
                            <span class="{{$statusClass}} text-white bold border-span">{{ $order->status ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <select class="form-select status-select" data-order-id="{{ $order->id }}">
                                <option value="en attente" {{ $order->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                                <option value="confirmé" {{ $order->status == 'confirmé' ? 'selected' : '' }}>Confirmé</option>
                                <option value="validé" {{ $order->status == 'validé' ? 'selected' : '' }}>Validé</option>
                                <option value="rejeté" {{ $order->status == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                            </select>

                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</x-layout>