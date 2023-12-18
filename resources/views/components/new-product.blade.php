<div class="latest-product">
    @foreach ($products as $key=>$product)
        <ul>
            <li>{{$key}} : {{ $product->name }}</li>
        </ul>
    @endforeach
</div>