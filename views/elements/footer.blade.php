<div class="footer-1 py-5">
    <div class="container">
        <div class="row gy-3">
            <div class="col-md-4 d-flex align-items-center">
                <div class="text-center">
                    <h4 class="text-uppercase font-weight-bold">
                        {{ theme_config('footer_title_1') }}
                    </h4>
                    <p>{{ theme_config('footer_description_1') }}</p>
                </div>
            </div>
            <div class="col-md-4 d-md-block d-none">
                <img class="footer-logo d-block mx-auto" src="{{ site_logo() }}" alt="{{ site_name() }}">
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <h4 class="text-uppercase font-weight-bold">
                        {{ theme_config('footer_title_2') }}
                    </h4>
                    <p>{{ theme_config('footer_description_2') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-2 py-3">
    <div class="container">
        <div class="row gy-3 mt-1">
            <div class="col-md-3 d-flex text-center text-center text-md-start">
                <div>
                    @foreach(theme_config('footer_links') ?? [] as $link)
                        <a class="me-2 footer-link" href="{{ $link['value'] }}">{{ $link['name'] }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 text-center">
                <p class="h6 mb-0">{{ setting('copyright') }}</p>
                <small>@lang('messages.copyright') @lang('theme::pirate.credits')</small>
            </div>
            <div class="col-md-3 d-flex justify-content-center justify-content-md-end">
                <div class="list-inline">
                    @foreach(social_links() as $link)
                        <a href="{{ $link->value }}" class="list-inline-item" target="_blank" rel="noreferrer noopener" data-bs-toggle="tooltip" title="{{ $link->title }}">
                            <i class="{{ $link->icon }} fs-2"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
