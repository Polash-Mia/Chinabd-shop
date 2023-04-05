@extends('website.master')
@section('body')
<div class="container-fluid pt-2">
     <!-- Products Start -->
     @if ($products->count() > 0)
     <div class="container-fluid py-2 mb-5 bg-hotdeal">
        {{-- <div class=" mb-4 d-flex">
            
            <div><img src="{{ asset('/') }}website/img/hot-deal-logo.gif" alt="" width="100px"></div>
            <div><span class="px-2 text-right">সকল হট ডিল </span></h2></div>
            
            
        </div> --}}




        <div class="row mb-3">
            <div class="col-md-6 col-6">
                <div class="hot-deals-gif">
                    <img src="{{ asset('/') }}website/img/hot-deal-logo.gif" alt="" width="100px">
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="all-hot-deals-btn text-right mt-2 font-weight-bold">
                    <a href="{{ route('hotdeal') }}" class="text-danger">সকল হট ডিল <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row px-xl-5 bg-warnings">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($products as $product)
                    
                     <div class="position  " style="height: 200px; width:200px;   margin-right: -90px;">
                        <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                        <img class="img-fluid w-100 h-100" src="{{asset($product->image)}}" alt="" style="height: 100%; width:100%;">
                         </a>
                        <div class="sub-position">
                            <div class="dis-image">
                                <img src="{{asset('/')}}website/img/flash-deal-percentage.png" alt="">
                                <div class="discount text-white">
                                    <span>{{$product->parcent}}%</span>
                                     <br>
                                    <span>ছাড়</span>
                                </div>
                            </div>
                        </div>
                        <div class="sub-price ">
                            <p class="text-white text-center">৳{{$product->selling_price}}</p>
                         </div>
                     </div>    
                                    
                     @endforeach
                     
                </div>
            </div>
        </div>
    </div>
   @endif

  <img src="" alt="" >
    <!-- Products End -->
    <div class="text-center mb-4">


        @if ($products->count() == 0)
                <h1 class="text-center text-danger py-5">দুঃখিত কোন পণ্য পাওয়া যায়নি  </h1>
                <a href="{{ route('home') }}" class="btn btn-success rounded">HOME</a>
    

                @else
        <h5 class="text-left px-5 font-weight-bold">প্রয়োজনীয় প্রোডাক্ট</h5>
    </div>
    <div class="row px-xl-5 pb-3">

        @foreach($products as $product)
        
       <div class=" col-md-2 col-6 border-light border-1 ">
            <div class="card  border-1 ">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                        <img class="img-fluid w-100" src="{{asset($product->image)}}" alt="" style="height: 210px; width:205px;">
                    </a>
                    
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>৳{{$product->regular_price}}</del></h6>
                        <h6 class="text-warning">৳{{$product->selling_price}}</h6>
                        <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                            <h6 class="text-truncate mb-3 px-3">{{$product->name}}</h6>
                        </a>
                        
                            <form action="{{route('add-to-cart', ['id' => $product->id ])}}" method="POST">  
                                @csrf    
                                {{-- <input type="hidden" name="qty" value="1"> --}}
                                <input type="hidden" name="quantity"  value="1" >
                                <div class="pb-2 px-1">
                                    <button type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" >অর্ডার করুন</button> 
                                </div>
                                
                                {{-- <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" value="অর্ডার করুন"> --}}
                            </form>
                    
                </div>
                
            </div>
        </div>

        @endforeach
        @endif
    </div>
    <div class=" container px-5 ">
        <span class="px-5 mx-5">{{$products->links()}}</span>
    </div>

   
</div>

{{-- <style>
    .w-5{
        height: 45px;
        width: 45px;
    }
</style> --}}
@endsection