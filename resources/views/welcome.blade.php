<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Spocap - Spotify Recap</title>
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #008080;
      font-family: 'VT323', monospace;
    }
    .window {
      background-color: silver;
      box-shadow: inset -2px -2px 0 #fff, inset 2px 2px 0 #000;
      border: 2px solid black;
    }
    .title-bar {
      background-color: navy;
      color: white;
      padding: 0.25rem 0.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .title-bar-buttons button {
      background-color: silver;
      border: 1px solid black;
      width: 1rem;
      height: 1rem;
      font-size: 0.75rem;
      margin-left: 2px;
    }
    a {
      font-family: inherit;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <div class="window w-[380px]">
    <div class="title-bar">
      <span>Spocap v1.0</span>
      <div class="title-bar-buttons">
        <button>−</button>
        <button>□</button>
        <button>×</button>
      </div>
    </div>

    <div class="p-4 space-y-4">
      <p class="text-black text-lg">Welcome to Spocap!</p>
      <p class="text-black text-sm">Your nostalgic Spotify Recap in a classic Windows 95 style.</p>

        <a href="{{ route('login') }}" class="block bg-gray-200 border-black text-center py-1">View Top Tracks</a>
      @guest    
      <a href="{{ route('login') }}" class="block bg-gray-200 border border-black text-center py-1">Login</a>
      <a href="{{ route('register') }}" class="block bg-gray-200 border border-black text-center py-1">Register</a>
      @endguest
    </div>
  </div>

</body>
</html>
