<!-- <div> -->
   @foreach($categories as $category)
    <li class="dropdown-submenu">
        <a class="dropdown-item" href="javascript:void(0)">
            {{ $category->name }}
            <i class="icofont-rounded-right float-right"></i>
        </a> 
        <ul class="dropdown-menu">
            <h6 class="dropdown-header">
                {{ $category->name }}
            </h6>
            @foreach($category->sub_categories as $sub_category)
                <li><a class="dropdown-item" href="{{ url('subcategory_item', $sub_category->id)}}">{{ $sub_category->name }}</a></li>
            @endforeach
        </ul>
    </li>
    <div class="dropdown-divider"></div>
    @endforeach
<!-- </div> -->