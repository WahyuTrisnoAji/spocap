<!-- resources/views/top-tracks.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Tracks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans p-8">
    <h1 class="text-2xl font-bold mb-6">Top Tracks Kamu</h1>

    <ul class="space-y-4">
        @foreach ($tracks as $track)
            <li class="p-4 bg-gray-100 rounded shadow">
                <div class="font-semibold">{{ $track['name'] }}</div>
                <div class="text-sm text-gray-600">Artist: {{ $track['artists'][0]['name'] }}</div>
            </li>
        @endforeach
    </ul>
    <h1>yippi</h1>
</body>
</html>
