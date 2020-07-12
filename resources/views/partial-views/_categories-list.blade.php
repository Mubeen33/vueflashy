<style>
    .selected-cat{
        background-color: black;
        color: white;
    }
    .un-selected-cat{
        background-color: white;
        color: black;
    }
    .list-group-flush .list-group-item:hover{
        background-color: black;
        color: white;
    }
</style>
<div class="col-md-3 cat-one pr-0" >
    <div class="dropdown">
        <div id="myDropdown"  class="dropdown-content border cat-dropdown">
            <i class="fa fa-search position-absolute search-icon"></i>
            <input type="text" name="search_cat" class="form-control" placeholder="Search..">
            <ul id="myList" class="list-group-flush pl-0 border-top-0 cat-list">
                @foreach($categories as $cat)
                    <li id="{{'/api/seller/categories-child/'.$cat->id}}" data-id="{{$cat->id}}" class="list-group-item p-2 {{count($cat->categories) > 0 ? 'parent-category':'remove-next'}}">
                        <span class="cat-value"> {{$cat->name}}</span>
                        @if(count($cat->categories)) <i class="feather icon-arrow-right float-right mr-0 mt-1"></i>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
