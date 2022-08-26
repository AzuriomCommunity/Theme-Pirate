@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <header class="header home-header">
        @include('elements.navbar')

        <div class="container">
            <div class="row gy-4 home-banner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="text-uppercase">{{ site_name() }}</h1>

                        <p>{{ theme_config('home_description') }}</p>

                        @if($server)
                            @if($server->joinUrl())
                                <a href="{{ $server->joinUrl() }}" class="btn btn-primary btn-play">
                                    {{ trans('messages.server.join') }}
                                </a>
                            @else
                                <button type="button" title="{{ trans('messages.actions.copy') }}" class="btn btn-primary btn-play copy-address"
                                        data-copied="{{ trans('messages.clipboard.copied') }}" data-copy-error="{{ trans('messages.clipboard.error') }}">
                                    {{ $server->fullAddress() }}
                                </button>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ site_logo() }}" class="img-fluid d-block mx-auto" width="300" alt="{{ site_name() }}">
                    </div>
                </div>
            </div>
        </div>

        @include('elements.waves')
    </header>

    <main class="content home">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="home-title">{{ trans('messages.news') }}</span>
            </h2>

            <div id="news" class="carousel slide mb-5 mx-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($posts as $id => $post)
                        <div class="carousel-item @if($id === 0) active @endif">
                            <div class="card">
                                @if($post->hasImage())
                                    <img src="{{ $post->imageUrl() }}" class="card-img-top" alt="{{ $post->title }}">
                                @endif
                                <div class="card-body">
                                    <h3>
                                        <a href="{{ route('posts.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p>{{ format_date($post->published_at) }}</p>

                                    <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">
                                        {{ trans('messages.posts.read') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev d-md-block d-none" type="button" data-bs-target="#news" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next d-md-block d-none" type="button" data-bs-target="#news" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>

            @if(! $servers->isEmpty())
                <h2 class="text-center mb-4">
                    <span class="home-title">{{ trans('messages.servers') }}</span>
                </h2>

                <div class="row gy-3 justify-content-center mb-5">
                    @foreach($servers as $server)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h3 class="card-title">
                                        {{ $server->name }}
                                    </h3>

                                    @if($server->isOnline())
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $server->getPlayersPercents() }}%">
                                            </div>
                                        </div>

                                        <p class="mb-1">
                                            {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                                'max' => $server->getMaxPlayers(),
                                            ]) }}
                                        </p>
                                    @else
                                        <p>
                                        <span class="badge bg-danger text-white">
                                            {{ trans('messages.server.offline') }}
                                        </span>
                                        </p>
                                    @endif

                                    @if($server->joinUrl())
                                        <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                            {{ trans('messages.server.join') }}
                                        </a>
                                    @else
                                        <button type="button" title="{{ trans('messages.actions.copy') }}" class="btn btn-primary copy-address"
                                                data-copied="{{ trans('messages.clipboard.copied') }}" data-copy-error="{{ trans('messages.clipboard.error') }}">
                                            {{ $server->fullAddress() }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex flex-md-row flex-column">
                        <div class="flex-shrink-0 feature-parent mb-3">
                            <div class="feature mx-auto">
                                <i class="{{ theme_config('icon_1') }}"></i>
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h2>{{ theme_config('title_1') }}</h2>
                            <p>{{ theme_config('description_1') }}</p>
                        </div>
                    </div>

                    <div class="d-flex flex-md-row flex-column-reverse">
                        <div class="flex-grow-1 me-3">
                            <h2 class="text-md-end">{{ theme_config('title_2') }}</h2>
                            <p>{{ theme_config('description_2') }}</p>
                        </div>

                        <div class="flex-shrink-0 feature-parent mb-3">
                            <div class="feature mx-auto">
                                <i class="{{ theme_config('icon_2') }}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-md-row flex-column">
                        <div class="flex-shrink-0 feature-parent mb-3">
                            <div class="feature mx-auto">
                                <i class="{{ theme_config('icon_3') }}"></i>
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h2>{{ theme_config('title_3') }}</h2>
                            <p>{{ theme_config('description_3') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <iframe src="https://discord.com/widget?id=810782144804683826&theme=dark" class="w-100 mb-3" height="500"></iframe>

                    <a data-theme="dark" data-height="500" class="twitter-timeline" href="https://twitter.com/{{ theme_config('twitter') }}">Tweets</a>
                </div>
            </div>
        </div>

        <div id="particles-js"></div>
    </main>
@endsection

@push('scripts')
    <script async src="https://platform.twitter.com/widgets.js" defer></script>
@endpush
