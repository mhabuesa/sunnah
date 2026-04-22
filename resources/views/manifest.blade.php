
{
  "id": "HasnineStore",
  "short_name": "{{ config('app.name') }}",
  "name": "{{ config('app.name') }}",
  "description": "Discover the best products and deals at Hasnine. Fast delivery, secure payments, and premium quality.",
  "lang": "en-US",
  "dir": "ltr",
  "categories": ["shopping", "ecommerce", "lifestyle"],
  
  "start_url": "{{ url('/') }}?utm_source=pwa",
  "display": "standalone",
  "display_override": ["window-controls-overlay", "minimal-ui"],
  "orientation": "portrait-primary",
  "scope": "{{ url('/') }}",
  
  "background_color": "#ffffff",
  "theme_color": "#469347",
  
  "icons": [
    {
      "src": "{{ asset(setting()->favicon) }}",
      "sizes": "192x192",
      "type": "image/png",
      "purpose": "any"
    },
    {
      "src": "{{ asset(setting()->favicon) }}",
      "sizes": "512x512",
      "type": "image/png",
      "purpose": "any"
    },
    {
      "src": "{{ asset(setting()->favicon) }}",
      "sizes": "512x512",
      "type": "image/png",
      "purpose": "maskable"
    }
  ],

  "screenshots": [
    {
      "src": "{{ asset('frontend/assets/images/screenshots/mobile-home.png') }}",
      "sizes": "1080x1920",
      "type": "image/png",
      "form_factor": "narrow",
      "label": "Hasnine Home Screen on Mobile"
    },
    {
      "src": "{{ asset('frontend/assets/images/screenshots/desktop-home.png') }}",
      "sizes": "1920x1080",
      "type": "image/png",
      "form_factor": "wide",
      "label": "Hasnine Shopping Experience on Desktop"
    }
  ],

  "shortcuts": [
    {
      "name": "Cart Page",
      "short_name": "Deals",
      "description": "Check out Cart Item",
      "url": "{{ url('/cart') }}",
      "icons": [{ "src": "{{ asset('frontend/assets/images/cartEmpty.png') }}", "sizes": "192x192" }]
    }
  ],

  "related_applications": [],
  "prefer_related_applications": false
}