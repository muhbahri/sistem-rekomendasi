<!DOCTYPE html>
<html>
<head>
    <title>Hasil Rekomendasi</title>
</head>
<body>
    <h1>Rekomendasi Negara Tujuan</h1>
    
    <ul>
        @foreach ($hasil as $negaraId => $skor)
            <li>{{ \App\Models\Negara::find($negaraId)->nama }} - Skor: {{ $skor }}</li>
        @endforeach
    </ul>
</body>
</html>
