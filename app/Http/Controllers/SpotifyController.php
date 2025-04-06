<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public function redirectToSpotify()
    {
        $query = http_build_query([
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
            'scope' => 'user-top-read user-library-read',
        ]);

        return redirect('https://accounts.spotify.com/authorize?' . $query);
    }

    public function handleSpotifyCallback(Request $request)
    {
        $code = $request->query('code');

        if (!$code) {
            return redirect('/')->with('error', 'Authorization failed');
        }

        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        $data = $response->json();

        if (isset($data['access_token'])) {
            session(['spotify_access_token' => $data['access_token']]);
            return redirect('/top-tracks');
        }

        return redirect('/')->with('error', 'Failed to retrieve access token.');
    }

    public function getTopTracks()
    {
        $token = session('spotify_access_token');
    
        if (!$token) {
            return redirect('/connect-spotify');
        }
    
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('https://api.spotify.com/v1/me/top/tracks?limit=10');
    
        $tracks = $response->json();
    
        if (!isset($tracks['items'])) {
            return redirect('/')->with('error', 'Gagal mengambil top tracks.');
        }
    
        return view('top-tracks', [
            'tracks' => $tracks['items']
        ]);
    }
    
}