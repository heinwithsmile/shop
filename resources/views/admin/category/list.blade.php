
<a href="{{route('category.create')}}">Add</a>
<br>
<ul>
    @foreach ($categories as $item)
        <li>{{$item->name}}</li>   
    @endforeach
</ul>