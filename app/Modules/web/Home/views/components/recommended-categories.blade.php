<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categories as $category)
            <li @if ($loop->first)
            class="active"
            @endif><a href="#{{ $category['unique_name'] }}" data-toggle="tab">{{ $category['unique_name'] }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categories as $category)
        <div class="tab-pane fade {{ $loop->first ? 'active in' : '' }}" id="{{ $category['unique_name'] }}" >
            @foreach ($category['products'] as $product)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            @php
                                $productName = $product['name'];
                            @endphp
                            <img src="{{ $product['img'] }}" alt="{{ $productName }}" />
                            <h2>${{ $product['price'] }}</h2>
                            <p>{{ $productName }}</p>
                            <a href="/{{ $product['unique_name'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Add to cart
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div><!--/category-tab-->
