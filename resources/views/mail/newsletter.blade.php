<h1>
    These are our new featured products
</h1>

<div>
    @for($products as $product)
        <div style="display: block;">
            {$product->name} - \${$product->price}
        </div>
        @endforeach
</div>