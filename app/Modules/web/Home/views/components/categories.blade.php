<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach ($menu as $menuItem)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="{{ isset($menuItem['children']) ? "#cat".$menuItem['id'] : $menuItem['cat_name'] }}">
                    @isset($menuItem['children'])
                    <span class="badge pull-right">
                        <i class="fa fa-plus"></i>
                    </span>
                    @endisset
                    {{ $menuItem['menu_name'] }}
                </a>
            </h4>
        </div>
        @isset($menuItem['children'])
        <div id="cat{{ $menuItem['id'] }}" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    @foreach ($menuItem['children'] as $child)
                    <li><a href="/{{ $child['cat_name'] }}">{{ $child['menu_name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endisset
    </div>
    @endforeach

</div><!--/category-products-->
