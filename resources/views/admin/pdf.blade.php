<!DOCTYPE html>
<html lang="en TH">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }
    </style>
</head>

<body>
    <h1>รายละเอียดคำสั่งซื้อ</h1>

    ชื่อ<h3>{{ $order->name }}</h3>
    ชื่อ<h3>{{ $order->email }}</h3>
    ชื่อ<h3>{{ $order->phone }}</h3>
    ชื่อ<h3>{{ $order->address }}</h3>
    ชื่อ<h3>{{ $order->user_id }}</h3>

    ชื่อ<h3>{{ $order->product_title }}</h3>
    ชื่อ<h3>{{ $order->price }}</h3>
    ชื่อ<h3>{{ $order->quantity }}</h3>
    ชื่อ<h3>{{ $order->payment_status }}</h3>
    ชื่อ<h3>{{ $order->product_id }}</h3>
</body>

</html>
