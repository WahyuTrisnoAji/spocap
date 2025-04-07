<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Tracks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans p-8">
    <h1 class="text-3xl font-bold mb-6">🎵 Your Top 10 Tracks</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($tracks as $track)
            <div class="bg-white p-4 rounded-xl shadow-md">
                <img src="{{ $track['album']['images'][0]['url'] }}" alt="{{ $track['name'] }}" class="rounded-md mb-3">
                <h2 class="text-xl font-semibold">{{ $track['name'] }}</h2>
                <p class="text-gray-600">Artist: {{ $track['artists'][0]['name'] }}</p>
                <p class="text-sm text-gray-500">Album: {{ $track['album']['name'] }}</p>
                <a href="{{ $track['external_urls']['spotify'] }}" target="_blank" class="text-green-600 underline text-sm">Open in Spotify</a>
            </div>
        @endforeach
    </div>
</body>
</html>
