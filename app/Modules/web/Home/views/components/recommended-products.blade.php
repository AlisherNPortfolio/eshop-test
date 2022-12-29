<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($products as $product)
        @if ($loop->iteration % 4 == 0)
        <div class="item {{ $loop->first ? 'active' : '' }}">
        @endif
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ $product['photos'][0]['url'] }}" alt="" />
                            <h2>${{ $product['price'] }}</h2>
                            <p>{{ $product['translations'][0]['name'] }}</p>
                            <a href="{{ $product['unique_name'] }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @if ($loop->iteration % 4 == 0)
            </div>
            @endif
        @endforeach
    </div>
     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
</div>
