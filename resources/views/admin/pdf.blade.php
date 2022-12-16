<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>
<body>
    <h1>Order Detail</h1>

     ชื่อ<h3>{{$order->name}}</h3>
     ชื่อ<h3>{{$order->email}}</h3>
     ชื่อ<h3>{{$order->phone}}</h3>
     ชื่อ<h3>{{$order->address}}</h3>
     ชื่อ<h3>{{$order->user_id}}</h3>

     ชื่อ<h3>{{$order->product_title}}</h3>
     ชื่อ<h3>{{$order->price}}</h3>
     ชื่อ<h3>{{$order->quantity}}</h3>
     ชื่อ<h3>{{$order->payment_status}}</h3>
     ชื่อ<h3>{{$order->product_id}}</h3>
</body>
</html>