<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>
<body>
    <h2>Edit a product</h2>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
            @endforeach
        </ul>
        @endif
    </div>
    <form action="{{route('products.update',['product' => $product])}}" method="post">
        @csrf
        @method('put')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="{{$product->name}}" value="{{$product->name}}">
        </div>
        
        <div>
            <label for="qty">Quantity</label>
            <input type="number" name="qty" placeholder="{{$product->qty}}" value="{{$product->qty}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" placeholder="{{$product->price}}" value="{{$product->price}}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="{{$product->description}}" value="{{$product->description}}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
    
</body>
</html>