<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Get recent posts with weather-related content
        $posts = Post::with(['user', 'category'])
            ->latest()
            ->paginate(6);
        
        // Get all categories
        $categories = Category::all();
        
        // Get weather data (you can integrate with a weather API later)
        $weatherData = $this->getWeatherData();
        
        return view('dashboard.index', compact('user', 'posts', 'categories', 'weatherData'));
    }

    /**
     * Get weather data from external API or mock data
     */
    private function getWeatherData()
    {
        // Mock weather data - replace with real API call if needed
        return [
            'current' => [
                'temp' => '28°C',
                'condition' => 'Cerah',
                'humidity' => '65%',
                'wind_speed' => '10 km/h',
                'location' => 'Indonesia'
            ],
            'forecast' => [
                [
                    'day' => 'Senin',
                    'temp_high' => '29°C',
                    'temp_low' => '24°C',
                    'condition' => 'Cerah',
                    'icon' => '☀️'
                ],
                [
                    'day' => 'Selasa',
                    'temp_high' => '27°C',
                    'temp_low' => '23°C',
                    'condition' => 'Berawan',
                    'icon' => '⛅'
                ],
                [
                    'day' => 'Rabu',
                    'temp_high' => '26°C',
                    'temp_low' => '22°C',
                    'condition' => 'Hujan',
                    'icon' => '🌧️'
                ],
            ]
        ];
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        // If user used token-based auth, delete the token
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        // Logout from session
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Anda telah berhasil keluar.');
    }
}
