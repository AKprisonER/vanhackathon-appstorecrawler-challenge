@extends('app')

@section('content')
<div class="searchbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.searchwidget')
            </div>
        </div>
    </div>
</div>
<div class="app-details mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $app->icon_url }}" alt="App Icon" class="full-width app-icon">
            </div>
            <div class="col-md-6">
                <h2>{{ $app->name }}
                    @if ($app->os == 'ios')
                        <a href="{{ $app->store_url }}" target="_blank"><img src="{{ asset('img/app-store.png') }}" alt="App Store Logo" class="store-logo"></a>
                    @else
                        <a href="{{ $app->store_url }}" target="_blank"><img src="{{ asset('img/play-store.png') }}" alt="App Store Logo" class="store-logo"></a>
                    @endif
                </h2>

                <p class="fw-400">{{ $app->developer }}</p>

                <p>{{ str_limit($app->description, 230) }}</p>
                <p class="fw-400">Price: {{ $app->price }}
                    <span class="tag">{{ $app->category }}</span>
                    <span class="tag">{{ $app->price == 'Free' ? 'Free' : 'Paid' }}</span>
                </p>
            </div>
            <div class="col-md-3">
                <h3>Rating</h3>
                <hr>
                <div class="rating-box text-center">
                    @if ($app->rating)
                        <h1>{{ number_format($app->rating, 1) }}</h1>
                        @include('partials.stars')
                        <p><small>{{ $app->rating_count }} ratings</small></p>
                    @else
                        <p><small>Not yet rated.</small></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="stats mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="with-hr">Ranking</h3>
                @if ($app->rankingEntries->count() > 0)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="stats-box">
                                <p>General</p>
                                <hr>
                                <h1 class="text-center">#{{ $app->rankingEntries->last()->position }}</h1>
                                <p class="text-center">
                                    {{ ucfirst($app->rankingEntries->last()->type) }} Apps
                                    <br>
                                    @if ($app->os == 'ios')
                                        App Store
                                    @else
                                        Google Play
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="stats-box inverse">
                                <p>By Category</p>
                                <hr>
                                <h1 class="text-center">#{{ $categoryPosition }}</h1>
                                <p class="text-center">
                                    {{ $app->category }},
                                    {{ ucfirst($app->rankingEntries->first()->type) }}
                                    <br>
                                    @if ($app->os == 'ios')
                                        App Store
                                    @else
                                        Google Play
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <p>This app hasn't been featured in the top 100 rank.</p>
                @endif
            </div>
            <div class="col-md-6">
                <h3 class="with-hr">Statistics</h3>
                <p>There's not enough data to generate a chart for this app.</p>
            </div>
        </div>
    </div>
</div>
<div class="screens mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="with-hr">Screenshots</h3>
                <div class="screenshots">
                    @foreach ($app->screenshots as $screenshot)
                        <img src="{{ $screenshot->img_url }}" alt="App screenshot." class="app-screenshot">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
