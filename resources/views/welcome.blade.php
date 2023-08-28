<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h1>admin dashboard</h1>
        @if (\App\Models\Order::count() == 0)
            <form action="{{ route('orders.import') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="col-lg-12 py-3">
                    <label for="users">Upload new commandes</label>
                    <input type="file" class="form-control" style="padding: 3px;" name="orders" required />
                </div>
                <button type="submit" class="btn btn-success" name="upload">Upload</button>
            </form>
        @endif
        @if (\App\Models\Order::count() != 0)
            <div class="container">
                <a href="{{ route('clear') }}" class="btn btn-danger">clear table</a><br>
                <a href="{{ route('getBonCommand') }}" class="btn btn-primary">get bon de commande</a>
                <a href="{{ route('recap') }}" class="btn btn-primary">get Recap</a>
                <a href="{{ route('bon_reception') }}" class="btn btn-primary">get Bon De Reception</a>
                <a href="{{ route('tickets') }}" class="btn btn-primary">Tickets</a>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
