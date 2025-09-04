<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <br>
    @foreach ($data as $item)
        <div>
            <p>Product Name: {{ $item['name_product'] }}</p>
            <p>Category: {{ $item['category'] }}</p>    
            <p>Price: {{ $item['price'] }}</p>
            <p>Stock: {{ $item['stock'] }}</p>
            <p>Status: {{ $item['status'] }}</p>
            <hr>
        </div>
    @endforeach
</body>
</html>