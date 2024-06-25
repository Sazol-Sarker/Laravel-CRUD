<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
</head>
<body>
    <h1>Products</h1>
    <div>
    <a href="{{route('products.create')}}">Create A Product</a>

    </div><br>
   
    <div>
        <div>
        @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
        
        @if (session()->has('DelSuccess'))
        <div>
            {{session('DelSuccess')}}
        </div>
        @endif
    </div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>

                @foreach($products as $product)
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><a href="{{route('products.edit',['product'=>$product])}}">Edit</a></td>
                <td>
                    <form action="{{route('products.destroy',['product'=>$product])}}" method="post">
                        @csrf 
                        @method('delete')
                      <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
           
            @endforeach
        </table>
    </div>
</body>
</html>