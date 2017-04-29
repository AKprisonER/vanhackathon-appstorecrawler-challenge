@extends('app')

@section('content')
<div class="jumbo">
    <div class="container">
        <div class="call-to-action">
            <h1 class="text-center mb-5">Get insights for your apps!</h1>

            <p class="lead text-center mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do tempor ut labore et magna aliqua. <br>
                Ut enim ad minim veniam, quis nostrud ullamco nisi ut aliquip ex ea commodo consequat. <br>
                Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu fugiat nulla.
            </p>

            <div class="col-md-10 offset-md-1">
                @include('partials.searchwidget')
            </div>
        </div>
    </div>
</div>
<div class="charts">
    <div class="container">
        <h1 class="text-center margin-bottom-5">Top 10 Free Apps</h1>

        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3"><img src="{{ asset('img/app-store.png') }}" class="store-logo" alt="App store logo."> App Store</h3>

                <div class="ranking-list">
                    @foreach ($appStoreFreeRankingEntry as $rankingEntry)
                        @include('partials.rankingentry')
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3"><img src="{{ asset('img/play-store.png') }}" class="store-logo" alt="App store logo."> Google Play</h3>

                <div class="ranking-list">
                    @foreach ($googlePlayFreeRankingEntry as $rankingEntry)
                        @include('partials.rankingentry')
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ action('AppController@ranking') }}" class="btn btn-block btn-orange mt-5 mb-5">See All</a>
            </div>
        </div>

        <h1 class="text-center margin-top-5 margin-bottom-5">Top 10 Paid Apps</h1>

        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3"><img src="{{ asset('img/app-store.png') }}" class="store-logo" alt="App store logo."> App Store</h3>

                <div class="ranking-list">
                    @foreach ($appStorePaidRankingEntry as $rankingEntry)
                        @include('partials.rankingentry')
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3"><img src="{{ asset('img/play-store.png') }}" class="store-logo" alt="App store logo."> Google Play</h3>

                <div class="ranking-list">
                    @foreach ($googlePlayPaidRankingEntry as $rankingEntry)
                        @include('partials.rankingentry')
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <a href="{{ action('AppController@ranking') }}" class="btn btn-block btn-orange mt-5 mb-5">See All</a>
            </div>
        </div>
    </div>
</div>
@endsection
