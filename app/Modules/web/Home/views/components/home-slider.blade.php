<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($sliders); $i++)
                            <li data-target="#slider-carousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
                        @endfor
                    </ol>

                    <div class="carousel-inner">
                        @forelse ($sliders as $slider)
                            <div class="item {{ $loop->index == 0 ? 'active' : '' }}">
                                <div class="col-sm-6">
                                    <h1>{!! $slider['title'] !!}</h1>
                                    <h2>{{ $slider['short_desc'] }}</h2>
                                    <p>{{ $slider['description'] }}</p>
                                    <a href="{{ $slider['url'] }}" class="btn btn-default get">Get it now</a>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset($slider['img1']) }}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset($slider['img2']) }}"  class="pricing" alt="" />
                                </div>
                            </div>
                        @empty
                            <div class="item active">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                        @endforelse
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
