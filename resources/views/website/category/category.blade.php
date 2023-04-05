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
                        <a href="{{route('category', ['id' => $category->id])}}" class="text-white">{{$category->name}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid pt-3">
    {{-- <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">প্রয়োজনীয় প্রোডাক্ট</span></h2>
    </div> --}}
    <div class="row px-xl-5 pb-3">

        @foreach($products as $product)
        
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
                            <form action="{{route('add-to-cart', ['id' => $product->id ])}}" method="POST">  
                            @csrf    
                            {{-- <input type="hidden" name="qty" value="1"> --}}
                            <input type="hidden" name="quantity"  value="1" >
                            <div class="pb-2 px-1">
                                <button type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" >অর্ডার করুন</button> 
                            </div>
                        </form>
                    
                </div>
                
            </div>
        </div>

        @endforeach

       
    </div>

    {{-- <span>{{$products->links()}}</span> --}}
</div>

{{-- <style>
    .w-5{
        height: 45px;
        width: 45px;
    }
</style> --}}
@endsection