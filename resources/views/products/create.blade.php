<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
</head>
<body>
    <h2>Create a product</h2>
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
    <form action="{{route('products.store')}}" method="post">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        
        <div>
            <label for="qty">Quantity</label>
            <input type="number" name="qty" placeholder="Quantity">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" placeholder="Price">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save a New Product">
        </div>
    </form>
    
</body>
</html>