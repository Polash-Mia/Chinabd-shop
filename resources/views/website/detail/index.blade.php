@extends('website.master')
@section('body')

<section>
    <div class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 py-2 text-white">
                    <p>
                        <a href="{{route('home')}}" class="text-white">Home</a>
                        /
                        <a href="#" class="text-white" >{{$product->name}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Shop Detail Start -->
    <div class="container-fluid py-2">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">

                        @foreach($product->subImages as $key => $subImage)
                        <div class="imagegalary carousel-item p-3  {{$key==0 ? "active" : " "}}" >
                             <img src="{{asset($subImage->image)}}" class="rounded w-100" style="height: 350px; width:350px;">
                         </div>

                         @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>


            </div>

            <div class="col-lg-5 p-3">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>

			   <div class="d-flex">
			                <h3 class="text-muted "><del>৳{{$product->regular_price}}</del></h3>
							<h3 class="text-danger ml-2">৳{{$product->selling_price}}</h3>
				</div>

                 <form action="{{route('add-to-cart', ['id' => $product->id ])}}" method="POST">
                 @csrf

                <div class=" d-flex align-items-center mb-4 pt-2">
				পরিমান :
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-minus"  id="qty_minus">
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" id="qty" min="1" name="quantity" class="form-control  text-center" value="1">
                        {{-- <input type="number" name="quantity" class="form-control bg-secondary text-center" value="1" min="1"> --}}
                        <div class="input-group-btn">
                            <button type="button" class="btn  btn-plus" id="qty_plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                </div>
				 <div class="mt-md-4 mt-2  d-flex">
                     <button type="submit" class="btn px-3 bg-danger text-white order_now_btn order_now_btn_m mr-3" name="order_now" >অর্ডার করুন</button>
                     <button type="submit" class="btn px-3 bg-info text-white add_cart_btn ml-2" name="add_cart" >কার্টে রাখুন</button>

                     {{-- <input type="submit" class="btn px-5 bg-danger text-white order_now_btn order_now_btn_m mr-3" name="order_now" value="অর্ডার করুন"> --}}
                     {{-- <input type="submit" class="btn px-5 bg-info text-white add_cart_btn ml-2" name="add_cart" value="কার্টে রাখুন"> --}}
                 </div>

                 </form>


							<div class="py-3">
							<a class="btn btn-success w-75 " href="tel:01968573982">
                                        <i class="fa fa-phone-square"></i>
                                        @foreach ($settings as $setting)
                                        {{ $setting->bkas }}
                                        @endforeach
                                        
                                    </a>
							</div>

                            @foreach ($shippings as $shipping )
                                
                           

                                <table class="table" style="color:#08c !important">
                                    <tbody>
                                                                            <tr>
                                            <td style="padding-left: 0;border-bottom: 1px solid #ddd;">
                                                ঢাকার বাইরে ডেলিভারি খরচ
                                            </td>
                                            <td style="border-bottom: 1px solid #ddd;">
                                                <b>৳ {{ $shipping->outside_dhaka  }}</b>
                                            </td>
                                        </tr>
                                                                            <tr>
                                            <td style="padding-left: 0;border-bottom: 1px solid #ddd;">
                                                ঢাকার ভিতরে ডেলিভারি খরচ
                                            </td>
                                            <td style="border-bottom: 1px solid #ddd;">
                                                <b>৳ {{ $shipping->inside_dhaka}}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-left border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">পন্যের বিবরণ</a>

                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        {{-- <h4 class="mb-3">Product Description</h4> --}}
                        <p>{!!$product->long_description!!}</p>


                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h5 class=" text-left font-weight-bold">রিলেটেড প্রোডাক্ট</h5>
        </div>


        <div class="row px-xl-5 pb-3">

            @foreach($related_products as $product)

           <div class=" col-md-2 col-6 ">
                <div class="card  border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                            <img class="img-fluid w-100" src="{{asset($product->image)}}" alt="">
                        </a>

                    </div>
                    <div class="card-body border-left border-right text-center p-0 ">


                            <h6 class="text-muted ml-2"><del>৳{{$product->regular_price}}</del></h6>
                            <h6 class="text-warning">৳{{$product->selling_price}}</h6>
                            <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                            </a>

                                <form action="" method="post">
                                    <input type="hidden" name="qty" value="1">
                                    <div class="pb-2 px-1">
                                        <button type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" >অর্ডার করুন</button> 
                                    </div>
                                    {{-- <button type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now">অর্ডার করুন</button> --}}
                                    {{-- <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" value="অর্ডার করুন"> --}}
                                </form>

                    </div>

                </div>
            </div>

            @endforeach







        </div>
    </div>
    <!-- Products End -->



@endsection


