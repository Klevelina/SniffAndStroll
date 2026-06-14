{{-- Public navigation (always visible) --}}
<div class="hidden md:flex gap-6">
    <a href="/">{{ __('messages.home') }}</a>
    <a href="/#how-it-works">{{ __('messages.how_it_works') }}</a>
    <a href="/about">{{ __('messages.about') }}</a>
    <a href="/contact">{{ __('messages.contact') }}</a>

    <a href="{{ route('language.switch', 'en') }}">EN</a>
    <a href="{{ route('language.switch', 'lv') }}">LV</a>
</div>
