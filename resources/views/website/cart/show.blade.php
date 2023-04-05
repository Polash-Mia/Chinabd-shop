@extends('website.master')

@section('body')
    <div class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12 mb-md-0 mb-4">
                    <div class="card p-2 pt-3" style="border: none">
                        <div class="card-body ">
                            <p class="text-center">অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার, লিখে <span
                                    class="text-danger">অর্ডার কনফার্ম করুন</span> বাটনে ক্লিক করুন</p>
                            <form action="{{ route('new-order') }}" method="POST" id="checkout_form" class="checkout_form">
                                @csrf
                                {{-- <input type="hidden" name="_token" value="mjdin2FB3zFYJB1QiENlAD6uH4TdfijBgSXBNezA">                                        <input type="hidden" name="shipping_cost" id="shipping_cost" value="60"> --}}
                                <div class="form-group">
                                    <label for="customer_name" class="text-dark">আপনার নাম : </label>
                                    <input type="text" class="form-control" id="customer_name" name="name"
                                        placeholder="আপনার নাম লিখুন" required="">
                                </div>

                                <div class="form-group">
                                    <label for="customer_address" class="text-dark">আপনার ঠিকানা :</label>
                                    <input type="text" class="form-control" id="customer_address" name="delivery_address"
                                        placeholder="আপনার ঠিকানা লিখুন" required="">
                                </div>

                                <div class="form-group">
                                    <label for="customer_phone" class="text-dark">আপনার মোবাইল :</label>
                                    <input type="number" class="form-control" id="customer_phone" name="mobile"
                                        placeholder="আপনার মোবাইল লিখুন" required="">
                                </div>
                                <input type="hidden" id="cash" class=""name="payment_method" value="1">

                                <div class="form-group">
                                    <label for="shipping_method" class="text-dark">আপনার এরিয়া সিলেক্ট করুন :</label>
                                    <select name="shipping_method" id="shipping_method" class="form-control" required="">
                                        @foreach ($shippings as $shipping)
                                        <option value="{{ $shipping->outside_dhaka }}">ঢাকার বাইরে</option>
                                        <option value="{{ $shipping->inside_dhaka}}">ঢাকার ভিতরে</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success w-100 mb-2" style="height: 50px"
                                    id="conf_order_btn">অর্ডার কনফার্ম করুন</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-12 p-4">
                    <div class="card " style="border: 1px solid #e9e9e9">
                        <h5 class="font-weight-bold card-header">আপনার অর্ডার</h5>
                        <div class="card-body p-2 table-responsive" id="order_info_table">
                            <table class="cart_table table text-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Remove</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($sum = 0)
                                    @foreach ($products as $product)
                                        <tr>

                                            {{-- <a href="https://trustedbdshop.com/cart-item-delete/16"><i class="fa fa-trash text-danger"></i></a> --}}
                                            <td class="align-middle"><a class="remove-item"
                                                    onclick="return confirm('Are you sure to remove this..');"
                                                    href="{{ route('remove-cart-product', ['id' => $product->id]) }}"><i
                                                        class="fa fa-trash text-danger"></i></a></td>

                                            <td class="text-left">
                                                <img width="35" src="{{ asset($product->attributes->image) }}"
                                                    alt="">
                                                <a style="font-size: 14px" class="text-info"
                                                    href="https://trustedbdshop.com/product/Miss-Belt/16">{{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            {{-- <td>{{$product->quantity}}</td> --}}
                                            <td width="15%" class="cart_qty text-center">
                                                <div class=" d-flex align-items-center mb-4 pt-2">

                                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                                        <div class="input-group-btn">
                                                            <button class="btn  btn-minus qty_minus"
                                                                data-id="{{ $product->id }}">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" class="form-control  text-center"
                                                            value="{{ $product->quantity }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn qty_plus btn-plus"
                                                                data-id="{{ $product->id }}">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>{{ $product->quantity * $product->price }}</td>
                                        </tr>
                                        @php($sum = $sum + $product->quantity * $product->price)
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right pr-2">Sub Total</th>
                                        <td><span id="net_total" data-value="{{$sum}}">{{ number_format($sum) }}</span></td>
                                        {{-- <input type="hidden" id="net_total" value="{{$sum}}" name=""> --}}
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right pr-2">Shipping Cost</th>
                                        <td>
                                            @php($shipping = 100)
                                            <span id="cart_shipping_cost">0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right pr-2">Total</th>
                                        <td>
                                            @php($grandTotal = $sum + $shipping)
                                            <span id="grand_total">{{ number_format($grandTotal) }}</span>
                                        </td>
                                        <?php
                                        Session::put('order_total', $grandTotal);
                                        Session::put('shipping_total', $shipping);
                                        ?>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(function() {
            $('#shipping_method').on('change', function() {
                var vvv = $(this).val();
                $("#cart_shipping_cost").text(vvv);
                $("#shipping_cost").val(vvv);
                calculate();

            })
            $('#shipping_method').trigger('change')

            $(".qty_plus").click(function() {
                var qty = $('#qty').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('increment-cart-product') }}',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $(this).data('id')
                    },
                    success: function(response) {
                        // $('#order_info_table').empty();
                        // $('#order_info_table').append(data);
                        if (response) {
                           // console.log(response.data);
                             location.reload();
                        } else {
                            alert('something went wrong')
                        }
                         calculate();
                    }
                });
            });

            $(".qty_minus").click(function() {
                var qty = $('#qty').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('decrement-cart-product') }}',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $(this).data('id')
                    },
                    success: function(response) {
                        // $('#order_info_table').empty();
                        // $('#order_info_table').append(data);
                        if (response) {
                           // console.log(response.data);
                             location.reload();
                        } else {
                            alert('something went wrong')
                        }

                         calculate();
                    }
                });
            });
        })

        function calculate() {
            var net_total = parseFloat($('#net_total').data('value'));
            var cart_shipping_cost = parseFloat($('#cart_shipping_cost').text());
            $('#grand_total').text(net_total + cart_shipping_cost);
        }
    </script>
@endpush
