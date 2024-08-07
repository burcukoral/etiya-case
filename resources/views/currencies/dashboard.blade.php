<!DOCTYPE html>
<html>
<head>
    <title>Fiyata göre sıralanmış kur bilgisi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>En düşük fiyata göre sıralanmış kur listesi</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sağlayıcı</th>
            <th>Para Birimi</th>
            <th>Sembol</th>
            <th>Fiyat</th>
            <th>Kısa Kod</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($currencies as $currency)
            <tr>
                <td>{{ $currency->provider }}</td>
                <td>{{ $currency->name }}</td>
                <td>{{ $currency->symbol }}</td>
                <td>{{ $currency->price }}</td>
                <td>{{ $currency->shortCode }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
