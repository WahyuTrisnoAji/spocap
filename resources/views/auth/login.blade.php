{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Spocap</title>
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #c3c3c3;
      font-family: 'VT323', monospace;
    }
    .window {
      box-shadow: inset -2px -2px 0 #fff, inset 2px 2px 0 #000;
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
    input, button {
      font-family: inherit;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <div class="window w-[320px] border border-black bg-gray-200">
    <div class="title-bar">
      <span>Login - Spocap</span>
      <div class="title-bar-buttons">
        <button>−</button>
        <button>□</button>
        <button>×</button>
      </div>
    </div>

    <div class="p-4">
      <form action="{{ route('login') }}" method="POST" class="space-y-3">
        @csrf
        <div>
          <label class="block text-sm">Email:</label>
          <input type="email" name="email" required class="w-full border border-black bg-white px-2 py-1 text-sm" />
        </div>
        <div>
          <label class="block text-sm">Password:</label>
          <input type="password" name="password" required class="w-full border border-black bg-white px-2 py-1 text-sm" />
        </div>

        <div class="flex justify-end space-x-2 pt-2">
          <button type="submit" class="bg-gray-100 border border-black px-3 py-1 text-sm">Login</button>
          <a href="{{ route('register') }}" class="bg-gray-100 border border-black px-3 py-1 text-sm">Register</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
