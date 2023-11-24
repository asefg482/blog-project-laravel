<div class="blog-pagination">
    <ul class="justify-content-center">
        @foreach(range(1,ceil($pageLength/3)) as $item)
            <li @if($item == $page) class="active" @endif><a href="@if($item == 1) {{url('/')}} @else {{route('page',$item)}} @endif ">{{$item}}</a></li>
        @endforeach
    </ul>
</div>
