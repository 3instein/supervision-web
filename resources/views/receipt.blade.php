<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Supervision</title>
</head>

<body>
    <div class="container card mt-3">
        <div class="p-4">
            <div class="text-center">
                <h4>Receipt</h4>
            </div>
            <span class="mt-4"> Date & Time : </span> <span class="mt-4">{{ $transaction->created_at }}</span>
            <p class="mt-4"> Order No: {{ $transaction->order->id }}</p>
            <p class="mt-4"> Cashier ID: {{ $transaction->user->id ?? 'TBA' }}</p>
            <p class="mt-4"> Cashier Name: {{ $transaction->user->name ?? 'TBA'}}</p>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($transaction->order->menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->pivot->quantity }} </td>
                                <td class="text-center">Rp. {{ number_format($menu->price) }}</td>
                                <td class="text-center">Rp.
                                    {{ number_format($subtotal += $menu->price * $menu->pivot->quantity) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td class="text-right text-dark">
                            <h5><strong>Sub Total: </strong></h5>
                            @if ($transaction->voucher)
                            <p><strong>Discount: </strong></p>
                            @endif
                            <p><strong>Tax (11%) : </strong></p>
                        </td>
                        <td class="text-center text-dark">
                            <h5> <strong><span id="subTotal">Rp. {{ number_format($subtotal) }}</strong></h5>
                            @if ($transaction->voucher)
                            <h5> <strong><span id="discount">Rp. {{ number_format($discount = $transaction->voucher->discount) }}</strong></h5>
                            @endif
                            <h5> <strong><span id="taxAmount">Rp. {{ number_format($tax = $subtotal * 0.11) }}</strong>
                            </h5>
                        </td>
                    </tr>
                    <tr>

                        <td> </td>
                        <td> </td>
                        <td class="text-right text-dark">
                            <h5><strong> Total: </strong></h5>
                        </td>
                        <td class="text-center text-danger">
                            @if($transaction->voucher)
                            <h5 id="totalPayment"><strong>Rp. {{ number_format($subtotal + $tax - $discount) }}</strong></h5>
                            @else
                            <h5 id="totalPayment"><strong>Rp. {{ number_format($subtotal + $tax) }}</strong></h5>
                            @endif

                        </td>
                    </tr>
                    <tr>

                        <td> </td>
                        <td> </td>
                        <td class="text-center">
                            {{-- <a href="#" class="btn btn-success">
                <span class="bi bi-printer"></span> Print Receipt
              </a> --}}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('home') }}" class="btn btn-success">
                                <span class="bi bi-back"></span> Back to Menu
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
