<img
    x-data="{ dark: document.documentElement.classList.contains('dark') }"
    x-init="
        new MutationObserver(() => { dark = document.documentElement.classList.contains('dark') }).observe(document.documentElement, { attributes: true, attributeFilter: ['class'] })
    "
    :src="dark
    ? '{{ $generalSettings?->site_logo_light ? asset('storage/' . $generalSettings->site_logo_light) : asset('frontend/images/logo.png') }}'
    : '{{ $generalSettings?->site_logo_dark ? asset('storage/' . $generalSettings->site_logo_dark) : asset('frontend/images/logo.png') }}'"
    alt="logo"
/>
