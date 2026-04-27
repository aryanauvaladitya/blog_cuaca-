<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Blog Cuaca - Pantau informasi cuaca dan artikel terbaru">
    <title>Dashboard — Blog Cuaca</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }

        .navbar-end {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn {
            background: #667eea;
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .welcome-section {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-title {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .welcome-message {
            color: #666;
            font-size: 1.05rem;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .weather-section {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .weather-header {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #333;
            padding-bottom: 1rem;
            border-bottom: 2px solid #667eea;
        }

        .current-weather {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 0.8rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .temp-display {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .weather-condition {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .weather-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            font-size: 0.9rem;
        }

        .weather-detail-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.8rem;
            border-radius: 0.5rem;
        }

        .weather-label {
            opacity: 0.8;
            font-size: 0.8rem;
        }

        .weather-value {
            font-weight: 600;
            font-size: 1rem;
        }

        .forecast {
            margin-top: 1.5rem;
        }

        .forecast-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid #ddd;
        }

        .forecast-items {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
        }

        .forecast-item {
            background: #f5f7ff;
            padding: 0.8rem;
            border-radius: 0.5rem;
            text-align: center;
            font-size: 0.85rem;
        }

        .forecast-day {
            font-weight: 600;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .forecast-icon {
            font-size: 1.5rem;
            margin: 0.5rem 0;
        }

        .forecast-temp {
            font-size: 0.8rem;
            color: #666;
        }

        .posts-section {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .posts-header {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #333;
            padding-bottom: 1rem;
            border-bottom: 2px solid #667eea;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .post-card {
            background: #f9f9f9;
            border-radius: 0.8rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .post-content {
            padding: 1.2rem;
        }

        .post-category {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 0.3rem;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
        }

        .post-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #333;
            line-height: 1.4;
            min-height: 2.4em;
        }

        .post-excerpt {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            min-height: 3em;
        }

        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #999;
            position: relative;
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .post-date {
            color: #999;
        }

        .read-more {
            display: inline-block;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            color: #764ba2;
        }

        .categories-section {
            margin-top: 2rem;
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .categories-header {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
            padding-bottom: 1rem;
            border-bottom: 2px solid #667eea;
        }

        .categories-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }

        .category-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 0.8rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .category-name {
            font-weight: 700;
            font-size: 1rem;
        }

        .pagination {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.8rem;
            border: 1px solid #ddd;
            border-radius: 0.3rem;
            text-decoration: none;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: #667eea;
            color: white;
        }

        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
            border-color: #e0e0e0;
        }

        .no-posts {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        @media (max-width: 768px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .weather-details {
                grid-template-columns: 1fr;
            }

            .forecast-items {
                grid-template-columns: 1fr;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }

            .categories-list {
                grid-template-columns: repeat(2, 1fr);
            }

            .welcome-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-brand">☁️ Blog Cuaca</div>
            <div class="navbar-end">
                <div class="user-info">
                    <span>Selamat datang, <strong>{{ Auth::user()->name }}</strong></span>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1 class="welcome-title">👋 Halo, {{ Auth::user()->name }}!</h1>
            <p class="welcome-message">Selamat datang di Dashboard Blog Cuaca. Pantau kondisi cuaca terkini dan baca artikel berita terbaru dari kami.</p>
        </div>

        <!-- Main Grid: Weather + Posts -->
        <div class="main-grid">
            <!-- Weather Section -->
            <div class="weather-section">
                <div class="weather-header">🌤️ Informasi Cuaca</div>
                
                <div class="current-weather">
                    <div class="temp-display">{{ $weatherData['current']['temp'] }}</div>
                    <div class="weather-condition">{{ $weatherData['current']['condition'] }}</div>
                    <div class="weather-details">
                        <div class="weather-detail-item">
                            <div class="weather-label">Lokasi</div>
                            <div class="weather-value">{{ $weatherData['current']['location'] }}</div>
                        </div>
                        <div class="weather-detail-item">
                            <div class="weather-label">Kelembaban</div>
                            <div class="weather-value">{{ $weatherData['current']['humidity'] }}</div>
                        </div>
                        <div class="weather-detail-item">
                            <div class="weather-label">Kecepatan Angin</div>
                            <div class="weather-value">{{ $weatherData['current']['wind_speed'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="forecast">
                    <div class="forecast-title">Prakiraan 3 Hari</div>
                    <div class="forecast-items">
                        @foreach ($weatherData['forecast'] as $day)
                            <div class="forecast-item">
                                <div class="forecast-day">{{ $day['day'] }}</div>
                                <div class="forecast-icon">{{ $day['icon'] }}</div>
                                <div class="forecast-temp">
                                    {{ $day['temp_high'] }} / {{ $day['temp_low'] }}
                                </div>
                                <div class="forecast-temp" style="font-size: 0.75rem;">
                                    {{ $day['condition'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="posts-section">
                <div class="posts-header">📰 Artikel Terbaru</div>
                
                @if ($posts->count() > 0)
                    <div class="posts-grid">
                        @foreach ($posts as $post)
                            <div class="post-card">
                                @if ($post->image_url)
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="post-image">
                                @else
                                    <div class="post-image" style="display: flex; align-items: center; justify-content: center; font-size: 3rem;">📷</div>
                                @endif
                                
                                <div class="post-content">
                                    @if ($post->category)
                                        <div class="post-category">{{ $post->category->name }}</div>
                                    @endif
                                    
                                    <h3 class="post-title">{{ $post->title }}</h3>
                                    
                                    <p class="post-excerpt">
                                        {{ Str::limit($post->content, 100, '...') }}
                                    </p>
                                    
                                    <div class="post-meta">
                                        <div class="post-author">
                                            👤 {{ $post->user->name }}
                                        </div>
                                        <div class="post-date">
                                            {{ $post->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="read-more">Baca Selengkapnya →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($posts->hasPages())
                        <div class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($posts->onFirstPage())
                                <span class="disabled">← Sebelumnya</span>
                            @else
                                <a href="{{ $posts->previousPageUrl() }}">← Sebelumnya</a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                @if ($page == $posts->currentPage())
                                    <span class="active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($posts->hasMorePages())
                                <a href="{{ $posts->nextPageUrl() }}">Selanjutnya →</a>
                            @else
                                <span class="disabled">Selanjutnya →</span>
                            @endif
                        </div>
                    @endif
                @else
                    <div class="no-posts">
                        <p>📭 Belum ada artikel. Kembali lagi nanti!</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Categories Section -->
        @if ($categories->count() > 0)
            <div class="categories-section">
                <div class="categories-header">📂 Kategori</div>
                <div class="categories-list">
                    @foreach ($categories as $category)
                        <div class="category-card">
                            <div class="category-name">{{ $category->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>
</html>
