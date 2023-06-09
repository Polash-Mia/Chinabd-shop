{{-- @extends('admin.master')

@section('title')
    Admin Order Invoice
@endsection

@section('body') --}}
<style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
</style>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            @foreach ($settings as $setting)
                                
                            
                            <img src="{{ asset($setting->logo) }}" alt="Company logo" style="width: 100%; max-width: 250px" />
                            {{-- <img src="{{ asset($setting->logo) }}" alt="" height="50" width="50"> --}}
                            {{-- <img src="{{asset('/')}}admin/assets/images/company.png" alt="Company logo" style="width: 100%; max-width: 250px" /> --}}
                            @endforeach
                        </td>

                        <td>
                            Invoice #: 000{{$order->id}}<br />
                            Order Date: {{$order->order_date}}<br />
                            Delivery Date: {{date('Y-m-d')}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h3>Billing Info</h3>
                            {{$order->customer->name}}.<br/>
                            {{-- {{$order->customer->email}}<br/> --}}
                            {{$order->customer->mobile}}
                        </td>

                        <td>
                            <h3>Shipping Info</h3>
                            {{$order->delivery_address}}<br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- <tr class="heading">
            <td colspan="3">Payment Method</td>

            <td></td>
        </tr>

        <tr class="details">
            <td colspan="3">{{$order->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment'}}</td>

            <td></td>
        </tr> --}}

        <tr class="heading">
            <td>Item</td>
            <td style="text-align: center;">Quantity</td>
            <td style="text-align: center;">Unit Price</td>
            <td style="text-align: right;">Price</td>
        </tr>
        @php($sum=0)
        @foreach($order->orderDetails as $orderDetail)
        <tr class="item">
            <td> <img src="{{asset($orderDetail->product_image)}}" alt="" height="40" width="60"/>{{$orderDetail->product_name}}</td>
            <td style="text-align: center;">{{$orderDetail->product_quantity}}</td>
            <td style="text-align: center;">{{$orderDetail->product_price}}</td>
            <td style="text-align: right;">{{$orderDetail->product_price * $orderDetail->product_quantity}}</td>
        </tr>
        @php($sum = $sum + ($orderDetail->product_price * $orderDetail->product_quantity))
        @endforeach
        <tr class="total">
            <td colspan="3"></td>
            <td>Sub Total: {{number_format($sum)}}</td>
        </tr>
        {{-- <tr class="total">
            <td colspan="3"></td>
            @php($tax = round((($sum*15)/100)))
            <td>Tax Total: {{number_format($tax)}}</td>
        </tr> --}}
        <tr class="total">
            <td colspan="3"></td>
            <td>Shipping Total: {{number_format($order->shipping_total)}}</td>
        </tr>
        <tr class="total">
            <td colspan="3"></td>
            <td>Total Payable: {{number_format(($sum  + $order->shipping_total))}}</td>
        </tr>
    </table>
</div>
{{-- @endsection --}}
