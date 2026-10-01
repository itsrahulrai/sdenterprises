@extends('layouts.app')
@section('title', setting('site_name', 'Sanni Cad Cam'))

@section('content')

    {{-- Hero Slider (Modern Rounded Card Design) --}}
    @if ($banners->count())
        <section class="sde-hero-section">
            <div class="container">
                <div id="heroCarousel" class="carousel slide carousel-fade sde-hero-carousel shadow-sm" data-bs-ride="carousel" data-bs-interval="5000">

                    {{-- Indicators --}}
                    <div class="carousel-indicators">
                        @foreach ($banners as $i => $banner)
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $i }}"
                                class="{{ $i === 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}">
                            </button>
                        @endforeach
                    </div>

                    {{-- Slides --}}
                    <div class="carousel-inner">
                        @foreach ($banners as $i => $banner)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}">
                                @endif

                                {{-- Desktop Image --}}
                                <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                                    class="w-100 d-none d-md-block hero-banner-img">

                                {{-- Mobile Image --}}
                                <img src="{{ $banner->mobile_image ? asset('public/storage/' . $banner->mobile_image) : $banner->image_url }}"
                                    alt="{{ $banner->title }}" class="w-100 d-block d-md-none hero-banner-mobile-img">

                                @if ($banner->link)
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    {{-- Controls (Circular Floating Buttons) --}}
                    <button class="carousel-control-prev sde-carousel-arrow sde-arrow-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <button class="carousel-control-next sde-carousel-arrow sde-arrow-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>
    @else
        {{-- Default Banner --}}
        <section class="sde-hero-section">
            <div class="container">
                <div class="hero-default-banner sde-hero-carousel shadow-sm">
                    {{-- Desktop --}}
                    <img src="{{ base_public_url('assets/img/dummy.png') }}" alt="Banner"
                        class="w-100 d-none d-md-block hero-banner-img">

                    {{-- Mobile --}}
                    <img src="{{ base_public_url('assets/img/dummy.png') }}" alt="Banner"
                        class="w-100 d-block d-md-none hero-banner-mobile-img">
                </div>
            </div>
        </section>
    @endif





    @if ($featuredCategories->count())
        @php
            $catMeta = [
                'coffee-machines'  => [
                    'desc'        => 'Barista-quality espressos & fresh bean-to-cup brews.',
                    'btn_bg'      => '#3B1C10', // Deep Espresso Brown
                    'btn_color'   => '#FFFFFF',
                    'arrow_color' => '#3B1C10',
                ],
                'coffee-premixes'  => [
                    'desc'        => 'Rich aromatic coffee premixes ready in seconds.',
                    'btn_bg'      => '#C0541E', // Warm Roasted Terracotta / Rust (No pink)
                    'btn_color'   => '#FFFFFF',
                    'arrow_color' => '#C0541E',
                ],
                'tea-machines'     => [
                    'desc'        => 'Fresh leaf brews & authentic hot tea infusions.',
                    'btn_bg'      => '#1B5E34', // Deep Forest Emerald Green
                    'btn_color'   => '#FFFFFF',
                    'arrow_color' => '#1B5E34',
                ],
                'water-dispensers' => [
                    'desc'        => 'Pure filtered hot, ambient & chilled water systems.',
                    'btn_bg'      => '#065684', // Deep Glacier Ocean Blue
                    'btn_color'   => '#FFFFFF',
                    'arrow_color' => '#065684',
                ],
                'combos'           => [
                    'desc'        => 'Complete all-in-one machines & value bundle kits.',
                    'btn_bg'      => '#B87414', // Warm Golden Amber
                    'btn_color'   => '#FFFFFF',
                    'arrow_color' => '#B87414',
                ],
            ];
            $defaultPalette = [
                ['desc' => 'Barista-quality espressos & fresh bean-to-cup brews.', 'btn_bg' => '#3B1C10', 'btn_color' => '#FFFFFF', 'arrow_color' => '#3B1C10'],
                ['desc' => 'Rich aromatic coffee premixes ready in seconds.',      'btn_bg' => '#C0541E', 'btn_color' => '#FFFFFF', 'arrow_color' => '#C0541E'],
                ['desc' => 'Fresh leaf brews & authentic hot tea infusions.',       'btn_bg' => '#1B5E34', 'btn_color' => '#FFFFFF', 'arrow_color' => '#1B5E34'],
                ['desc' => 'Pure filtered hot, ambient & chilled water systems.',   'btn_bg' => '#065684', 'btn_color' => '#FFFFFF', 'arrow_color' => '#065684'],
                ['desc' => 'Complete all-in-one machines & value bundle kits.',     'btn_bg' => '#B87414', 'btn_color' => '#FFFFFF', 'arrow_color' => '#B87414'],
            ];
        @endphp

        <section class="sde-category-showcase-section">
            <div class="container">
                {{-- Centered Luxury Editorial Header --}}
                <div class="cat-section-header">
                    <div class="cat-header-content text-center">
                        <div class="cat-explore-tag">
                            <span class="tag-line"></span>
                            <span class="tag-text">EXPLORE OUR RANGE</span>
                            <span class="tag-line"></span>
                        </div>
                        <h2 class="cat-main-heading">
                            Shop by <span class="cat-heading-accent">Category</span>
                        </h2>
                        <p class="cat-desc">
                            Discover thoughtfully curated collections for every occasion, crafted for perfection.
                        </p>
                    </div>
                </div>

                {{-- Cards Slider Container --}}
                <div class="cat-swiper-outer">
                    <button type="button" class="cat-nav-btn cat-prev" aria-label="Previous categories">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <div class="swiper cat-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($featuredCategories as $cat)
                                @php
                                    $fallback = $defaultPalette[$loop->index % count($defaultPalette)];
                                    $meta = $catMeta[$cat->slug] ?? $fallback;
                                    $cardDesc   = $meta['desc'];
                                    $btnBg      = $meta['btn_bg'];
                                    $btnColor   = $meta['btn_color'];
                                    $arrowColor = $meta['arrow_color'];
                                @endphp
                                <div class="swiper-slide">
                                    <a href="{{ route('shop.category', $cat->slug) }}" class="sde-cat-card">
                                        <div class="sde-cat-card-inner">
                                            {{-- Product Image --}}
                                            <div class="sde-cat-img-wrap">
                                                @if ($cat->image)
                                                    <img src="{{ $cat->image_url }}" alt="{{ $cat->name }}" class="sde-cat-img" loading="lazy">
                                                @endif
                                            </div>

                                            {{-- Category Info --}}
                                            <div class="sde-cat-info">
                                                <h3 class="sde-cat-title">{{ $cat->name }}</h3>
                                                <p class="sde-cat-desc">{{ $cardDesc }}</p>
                                                
                                                {{-- Action Pill Button matching reference media_1790833517753.png --}}
                                                <div class="sde-cat-action-btn-pill" style="background-color: {{ $btnBg }}; color: {{ $btnColor }};">
                                                    <span class="sde-cat-action-btn-text">Explore More</span>
                                                    <span class="sde-cat-action-btn-circle" style="color: {{ $arrowColor }};">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="button" class="cat-nav-btn cat-next" aria-label="Next categories">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        @push('styles')
        <style>
            /* ============================================================
               S D ENTERPRISES — ULTRA-LUXURY CATEGORY SHOWCASE
               (Matches reference mockup media_1790833517753.png)
            ============================================================ */
            .sde-category-showcase-section {
                background: #FFFFFF !important;
                position: relative;
                padding: 48px 0 58px;
                overflow: hidden;
            }

            /* Section Header - Vertically stacked, centered */
            .cat-section-header {
                position: relative;
                z-index: 2;
                margin: 0 auto 34px auto !important;
                text-align: center !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                max-width: 760px;
                padding: 0 15px;
            }

            .cat-header-content {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                text-align: center !important;
                width: 100%;
            }

            .cat-explore-tag {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                margin-bottom: 8px;
                background: rgba(200, 159, 101, 0.08);
                padding: 4px 16px;
                border-radius: 30px;
                border: 1px solid rgba(200, 159, 101, 0.22);
            }

            .cat-explore-tag .tag-line {
                width: 20px;
                height: 1.5px;
                background: #C89F65;
                border-radius: 2px;
            }

            .cat-explore-tag .tag-text {
                font-family: 'Poppins', sans-serif;
                font-size: 11px;
                font-weight: 700;
                letter-spacing: 2.4px;
                color: #8C481A;
                text-transform: uppercase;
                white-space: nowrap;
            }

            .cat-main-heading {
                font-family: 'Playfair Display', Georgia, serif;
                font-size: 42px;
                font-weight: 700;
                color: #24130A;
                margin: 0 0 10px 0;
                letter-spacing: -0.5px;
                line-height: 1.18;
                text-align: center !important;
            }

            .cat-main-heading .cat-heading-accent {
                font-family: 'Playfair Display', Georgia, serif;
                font-weight: 700;
                background: linear-gradient(135deg, #8E4C19 0%, #D49B43 50%, #9B5D1E 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                display: inline-block;
            }

            .cat-desc {
                font-family: 'Poppins', -apple-system, sans-serif;
                font-size: 14px;
                font-weight: 400;
                color: #6D5E52;
                line-height: 1.55;
                margin: 0 auto;
                max-width: 620px;
                text-align: center !important;
            }

            /* Swiper Outer & Track */
            .cat-swiper-outer {
                position: relative;
                z-index: 2;
                max-width: 1260px;
                margin: 0 auto;
                padding: 0 10px;
            }

            .cat-swiper {
                padding: 20px 10px 38px !important;
                overflow: hidden !important;
            }

            /* ============================================================
               MATCHING CARD DESIGN (media_1790833517753.png)
            ============================================================ */
            .sde-cat-card {
                display: block;
                width: 100%;
                text-decoration: none !important;
                outline: none;
                border-radius: 22px;
                transition: transform 0.38s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .sde-cat-card-inner {
                background: #FFFFFF;
                border-radius: 20px;
                border: 1px solid rgba(0, 0, 0, 0.07);
                box-shadow: 0 14px 34px rgba(0, 0, 0, 0.11), 0 4px 12px rgba(0, 0, 0, 0.05);
                padding: 10px 10px 12px 10px;
                display: flex;
                flex-direction: column;
                transition: all 0.38s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .sde-cat-card:hover {
                transform: translateY(-8px);
            }

            .sde-cat-card:hover .sde-cat-card-inner {
                box-shadow: 0 24px 50px rgba(0, 0, 0, 0.17), 0 8px 18px rgba(0, 0, 0, 0.07);
                border-color: rgba(0, 0, 0, 0.12);
            }

            /* Product Image Wrapper */
            .sde-cat-img-wrap {
                width: 100%;
                aspect-ratio: 1 / 1.05;
                border-radius: 15px;
                overflow: hidden;
                background: #F8F5F2;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sde-cat-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                display: block;
                border-radius: 15px;
                transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .sde-cat-card:hover .sde-cat-img {
                transform: scale(1.05);
            }

            /* Card Info (Title, Desc & Explore Pill) */
            .sde-cat-info {
                padding: 10px 2px 0 2px;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .sde-cat-title {
                font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                font-size: 13.5px;
                font-weight: 800;
                color: #1A1A1A;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin: 0 0 4px 0;
                line-height: 1.25;
                text-align: center !important;
            }

            .sde-cat-desc {
                font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                font-size: 10.5px;
                font-weight: 400;
                color: #666666;
                line-height: 1.4;
                margin: 0 auto 10px auto;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 28px;
                text-align: center !important;
            }

            /* Action Pill Button matching reference */
            .sde-cat-action-btn-pill {
                width: 100%;
                height: 36px;
                border-radius: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                padding: 0 16px;
                transition: all 0.3s ease;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            }

            .sde-cat-action-btn-text {
                font-family: 'Poppins', sans-serif;
                font-size: 11.5px;
                font-weight: 700;
                letter-spacing: 0.2px;
            }

            .sde-cat-action-btn-circle {
                position: absolute;
                right: 7px;
                width: 23px;
                height: 23px;
                border-radius: 50%;
                background: #FFFFFF;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.12);
                transition: transform 0.25s ease;
            }

            .sde-cat-action-btn-circle i {
                font-size: 11px;
            }

            .sde-cat-card:hover .sde-cat-action-btn-pill {
                filter: brightness(1.06);
                box-shadow: 0 5px 14px rgba(0, 0, 0, 0.14);
            }

            .sde-cat-card:hover .sde-cat-action-btn-circle {
                transform: translateX(3px);
            }

            /* Navigation Buttons */
            .cat-nav-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 44px;
                height: 44px;
                border-radius: 50%;
                border: 1.5px solid #E4D8CB;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(8px);
                color: #3B1C10;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 16px;
                cursor: pointer;
                z-index: 10;
                box-shadow: 0 6px 18px rgba(43, 23, 13, 0.12);
                transition: all 0.25s ease;
            }

            .cat-nav-btn.cat-prev { left: -18px; }
            .cat-nav-btn.cat-next { right: -18px; }

            .cat-nav-btn:hover {
                background: #24120A;
                border-color: #24120A;
                color: #FFFFFF;
                transform: translateY(-50%) scale(1.08);
                box-shadow: 0 10px 24px rgba(43, 23, 13, 0.25);
            }

            .cat-nav-btn.swiper-button-disabled {
                opacity: 0 !important;
                pointer-events: none !important;
            }

            @media (max-width: 991.98px) {
                .cat-main-heading { font-size: 32px; }
                .sde-cat-title { font-size: 13px; }
                .cat-swiper { padding: 14px 6px 26px !important; }
            }

            @media (max-width: 767.98px) {
                .sde-category-showcase-section { padding: 22px 0 28px; }
                .cat-swiper { padding: 8px 4px 18px !important; }
                .cat-nav-btn { display: none; }
                .sde-cat-card-inner {
                    padding: 6px 6px 8px 6px;
                    border-radius: 14px;
                    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08), 0 2px 6px rgba(0, 0, 0, 0.04);
                }
                .sde-cat-img-wrap {
                    border-radius: 11px;
                }
                .sde-cat-img {
                    border-radius: 11px;
                }
                .sde-cat-info { padding: 6px 1px 0 1px; }
                .sde-cat-title {
                    font-size: 10.5px;
                    margin-bottom: 2px;
                    letter-spacing: 0.2px;
                    line-height: 1.2;
                }
                .sde-cat-desc {
                    font-size: 8.5px;
                    line-height: 1.25;
                    min-height: auto;
                    margin-bottom: 6px;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
                .sde-cat-action-btn-pill {
                    height: 25px;
                    padding: 0 8px;
                    border-radius: 30px;
                }
                .sde-cat-action-btn-text {
                    font-size: 9px;
                    font-weight: 700;
                }
                .sde-cat-action-btn-circle {
                    width: 17px;
                    height: 17px;
                    right: 4px;
                }
                .sde-cat-action-btn-circle i {
                    font-size: 8.5px;
                }
            }
        </style>
        @endpush

        @once
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    new Swiper('.cat-swiper', {
                        slidesPerView: 5,
                        spaceBetween: 18,
                        watchOverflow: true,
                        navigation: {
                            nextEl: '.cat-next',
                            prevEl: '.cat-prev',
                        },
                        breakpoints: {
                            0:    { slidesPerView: 2.15, spaceBetween: 10 },
                            480:  { slidesPerView: 2.7,  spaceBetween: 12 },
                            768:  { slidesPerView: 3.4,  spaceBetween: 14 },
                            992:  { slidesPerView: 4,    spaceBetween: 16 },
                            1200: { slidesPerView: 5,    spaceBetween: 18 },
                            1400: { slidesPerView: 5,    spaceBetween: 20 },
                        }
                    });
                });
            </script>
        @endonce
    @endif




    {{-- ============================================================
         FEATURED PRODUCTS SECTION (MATCHES media_1790840736487.jpg)
    ============================================================ --}}
    @php
        $homeFeatured = (isset($featuredProducts) && $featuredProducts->count()) ? $featuredProducts : $trendingProducts;
    @endphp
    @if ($homeFeatured && $homeFeatured->count())
        <section class="sde-lux-section sde-featured-section">
            <div class="container position-relative" style="z-index: 2;">
                <div class="sde-lux-header">
                    <div class="cat-section-header mb-0">
                        <div class="cat-header-content text-center">
                            <div class="cat-explore-tag">
                                <span class="tag-line"></span>
                                <span class="tag-text">CRAFTED FOR A BETTER TOMORROW</span>
                                <span class="tag-line"></span>
                            </div>
                            <h2 class="cat-main-heading">
                                Featured <span class="cat-heading-accent">Products</span>
                            </h2>
                            <p class="cat-desc">
                                Handpicked coffee machines to brew your perfect cup, every day.
                            </p>
                        </div>
                    </div>
                    <div class="sde-lux-header-action d-none d-md-block">
                        <a href="{{ route('shop') }}" class="sde-pill-viewall">
                            <span>View All Products</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-3 g-md-4">
                    @foreach ($homeFeatured as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div class="text-center mt-4 d-md-none">
                    <a href="{{ route('shop') }}" class="sde-pill-viewall">
                        <span>View All Products</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- ============================================================
         SEPARATE SECTION: ADS BANNER (EDGE-TO-EDGE FULL WIDTH, ZERO PADDING)
    ============================================================ --}}
    <section class="sde-ad-banner-section" style="background-color: #ffffff !important; padding: 0 !important; margin: 0 !important; width: 100%; border: none !important; line-height: 0;">
        <div class="container-fluid px-0">
            <a href="{{ route('shop') }}" class="sde-ad-banner-link d-block w-100" title="Professional Coffee Machines" style="line-height: 0;">
                <img src="{{ base_public_url('assets/img/ads-banner.png') }}"
                     alt="Professional Coffee Machines - Premium Coffee Experience"
                     class="sde-ad-banner-img w-100"
                     style="display: block; width: 100%; height: auto;"
                     loading="lazy">
            </a>
        </div>
    </section>

    {{-- ============================================================
         NEW ARRIVALS SECTION (MATCHES media_1790840736487.jpg)
    ============================================================ --}}
    @if ($newArrivals->count())
        <section class="sde-lux-section sde-arrivals-section">
            <div class="container position-relative" style="z-index: 2;">
                <div class="sde-lux-header">
                    <div class="cat-section-header mb-0">
                        <div class="cat-header-content text-center">
                            <div class="cat-explore-tag">
                                <span class="tag-line"></span>
                                <span class="tag-text">LATEST COLLECTION</span>
                                <span class="tag-line"></span>
                            </div>
                            <h2 class="cat-main-heading">
                                New <span class="cat-heading-accent">Arrivals</span>
                            </h2>
                            <p class="cat-desc">
                                Freshly added products to our latest premium range.
                            </p>
                        </div>
                    </div>
                    <div class="sde-lux-header-action d-none d-md-block">
                        <a href="{{ route('shop') }}" class="sde-pill-viewall">
                            <span>View All New Arrivals</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-3 g-md-4">
                    @foreach ($newArrivals as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div class="text-center mt-4 d-md-none">
                    <a href="{{ route('shop') }}" class="sde-pill-viewall">
                        <span>View All New Arrivals</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- ============================================================
         BANNER 2: ADS BANNER 2 (EDGE-TO-EDGE FULL WIDTH, ZERO PADDING)
    ============================================================ --}}
    <section class="sde-ad-banner-section" style="background-color: #ffffff !important; padding: 0 !important; margin: 0 !important; width: 100%; border: none !important; line-height: 0;">
        <div class="container-fluid px-0">
            <a href="{{ route('shop') }}" class="sde-ad-banner-link d-block w-100" title="Professional Coffee Machines" style="line-height: 0;">
                <img src="{{ base_public_url('assets/img/ads-banner2.png') }}"
                     alt="Professional Coffee Machines - Premium Coffee Experience"
                     class="sde-ad-banner-img w-100"
                     style="display: block; width: 100%; height: auto;"
                     loading="lazy">
            </a>
        </div>
    </section>

    {{-- ============================================================
         BEST SELLERS SECTION (MATCHES media_1790840736487.jpg)
    ============================================================ --}}
    @if ($bestSellers->count())
        <section class="sde-lux-section sde-bestsellers-section">
            <div class="container position-relative" style="z-index: 2;">
                <div class="sde-lux-header">
                    <div class="cat-section-header mb-0">
                        <div class="cat-header-content text-center">
                            <div class="cat-explore-tag">
                                <span class="tag-line"></span>
                                <span class="tag-text">CUSTOMER FAVORITES</span>
                                <span class="tag-line"></span>
                            </div>
                            <h2 class="cat-main-heading">
                                Best <span class="cat-heading-accent">Sellers</span>
                            </h2>
                            <p class="cat-desc">
                                Most loved products, trusted and praised by our customers.
                            </p>
                        </div>
                    </div>
                    <div class="sde-lux-header-action d-none d-md-block">
                        <a href="{{ route('shop') }}" class="sde-pill-viewall">
                            <span>View All Best Sellers</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-3 g-md-4">
                    @foreach ($bestSellers as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div class="text-center mt-4 d-md-none">
                    <a href="{{ route('shop') }}" class="sde-pill-viewall">
                        <span>View All Best Sellers</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Latest Blog / Articles --}}
    @if ($latestBlogs->count())
        <section class="py-5" style="
            background: radial-gradient(circle at bottom left, rgba(17,140,196,.04), transparent 30%),
                        linear-gradient(180deg, #FFFFFF 0%, #F6F9FB 100%);
        ">
            <div class="container">
                <div class="position-relative mb-4">
                    <div class="section-luxury-header mb-0">
                        <div class="section-luxury-header-content">
                            <div class="sec-explore-tag">
                                <span class="tag-line"></span>
                                <span class="tag-text">STORIES & INSPIRATION</span>
                                <span class="tag-line"></span>
                            </div>
                            <h2 class="sec-main-heading">
                                Latest <span class="sec-heading-accent">Articles</span>
                            </h2>
                            <p class="sec-desc">
                                Explore stories of timeless craftsmanship, design inspiration, and luxury living.
                            </p>
                        </div>
                    </div>
                    <div class="d-none d-md-block position-absolute end-0 top-50 translate-middle-y">
                        <a href="{{ route('blog.index') }}" class="btn-luxury-viewall">
                            <span>View All</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach ($latestBlogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none h-100 d-block">
                                <article class="luxury-article-card">
                                    {{-- Image Wrapper --}}
                                    <div class="article-img-wrap">
                                        <img src="{{ $blog->thumbnail_url }}"
                                             alt="{{ $blog->title }}"
                                             loading="lazy"
                                             onerror="this.onerror=null;this.src='{{ asset('images/no-image.png') }}';">

                                        {{-- Category Badge --}}
                                        <span class="article-cat-badge">
                                            {{ $blog->blogCategory->name ?? 'Craftsmanship' }}
                                        </span>

                                        {{-- Published Date --}}
                                        <span class="article-date-badge">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $blog->published_at?->format('d M Y') }}
                                        </span>
                                    </div>

                                    {{-- Body Content --}}
                                    <div class="article-body">
                                        <div class="article-meta-row">
                                            <span><i class="bi bi-clock-history me-1"></i> 3 min read</span>
                                            <span>•</span>
                                            <span><i class="bi bi-gem me-1"></i> Luxury Living</span>
                                        </div>

                                        <h3 class="article-title" title="{{ $blog->title }}">
                                            {{ Str::limit($blog->title, 55) }}
                                        </h3>

                                        <p class="article-excerpt">
                                            {{ Str::limit($blog->excerpt, 105) }}
                                        </p>

                                        <div class="article-card-footer">
                                            <span class="article-read-text">Read Full Story</span>
                                            <span class="article-arrow-btn">
                                                <i class="bi bi-arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-4 d-md-none">
                    <a href="{{ route('blog.index') }}" class="btn-luxury-viewall">
                        <span>View All Articles</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

@endsection

@push('styles')
<style>
/* ============================================================
   S D ENTERPRISES — LUXURY SECTIONS (MATCHING media_1790840736487.jpg)
============================================================ */
.sde-lux-section {
    background-color: #FAF6F0 !important;
    background-image:
        radial-gradient(ellipse at 5% 15%, rgba(200, 160, 110, 0.08) 0%, transparent 45%),
        radial-gradient(ellipse at 95% 85%, rgba(195, 123, 21, 0.06) 0%, transparent 45%);
    position: relative;
    padding: 56px 0 68px;
    overflow: hidden;
    border-top: 1px solid #ECE4DA;
}

/* Specific Clean White Background for New Arrivals Section */
.sde-lux-section.sde-arrivals-section {
    background-color: #FFFFFF !important;
    background-image: none !important;
    border-top: 1px solid #ECE4DA;
    border-bottom: 1px solid #ECE4DA;
}


/* Section Header (Centered title with right-aligned button) */
.sde-lux-header {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 36px;
    position: relative;
    text-align: center;
}

.sde-lux-header-action {
    position: absolute;
    right: 0;
    bottom: 8px;
}

/* Category & Product Section Header Luxury Typography (Matches Shop by Category) */
.cat-section-header {
    position: relative;
    z-index: 2;
    margin: 0 auto;
    text-align: center !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    max-width: 760px;
    padding: 0 15px;
}

.cat-header-content {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    width: 100%;
}

.cat-explore-tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 8px;
    background: rgba(200, 159, 101, 0.08);
    padding: 4px 18px;
    border-radius: 30px;
    border: 1px solid rgba(200, 159, 101, 0.22);
}

.cat-explore-tag .tag-line {
    width: 20px;
    height: 1.5px;
    background: #C89F65;
    border-radius: 2px;
}

.cat-explore-tag .tag-text {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2.4px;
    color: #8C481A;
    text-transform: uppercase;
    white-space: nowrap;
}

.cat-main-heading {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 40px;
    font-weight: 700;
    color: #24130A;
    margin: 0 0 10px 0;
    letter-spacing: -0.5px;
    line-height: 1.18;
    text-align: center !important;
}

.cat-main-heading .cat-heading-accent {
    font-family: 'Playfair Display', Georgia, serif;
    font-weight: 700;
    background: linear-gradient(135deg, #8E4C19 0%, #D49B43 50%, #9B5D1E 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
}

.cat-desc {
    font-family: 'Poppins', -apple-system, sans-serif;
    font-size: 13.5px;
    font-weight: 400;
    color: #6D5E52;
    line-height: 1.55;
    margin: 0 auto;
    max-width: 620px;
    text-align: center !important;
}

.sde-pill-viewall {
    background: #3B1C10;
    color: #FFFFFF !important;
    font-family: 'Poppins', sans-serif;
    font-size: 11.5px;
    font-weight: 600;
    padding: 7px 18px;
    border-radius: 50px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 8px rgba(59, 28, 16, 0.2);
    transition: all 0.25s ease;
    white-space: nowrap;
}

.sde-pill-viewall:hover {
    background: #C37B15;
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(195, 123, 21, 0.32);
    color: #FFFFFF !important;
}

/* ============================================================
   SEPARATE SECTION: ADS BANNER (EDGE-TO-EDGE FULL WIDTH, ZERO PADDING)
============================================================ */
.sde-ad-banner-section {
    background-color: #FFFFFF !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
    position: relative;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.sde-ad-banner-link {
    display: block;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transition: opacity 0.3s ease, filter 0.3s ease;
    background: #24140D;
}

.sde-ad-banner-link:hover {
    filter: brightness(1.03);
}

.sde-ad-banner-img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover;
    line-height: 0;
}

/* ============================================================
   BANNER 2: 4-ITEM TRUST / FEATURE BAR
============================================================ */
.sde-trust-bar {
    background: #FFFFFF;
    border: 1px solid #ECE4DA;
    border-radius: 14px;
    padding: 22px 28px;
    box-shadow: 0 4px 18px rgba(50, 28, 14, 0.05);
}

.sde-trust-item {
    display: flex;
    align-items: center;
    gap: 14px;
}

.sde-trust-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #FAF5EE;
    border: 1px solid #EFE4D6;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8C6542;
    font-size: 20px;
    flex-shrink: 0;
}

.sde-trust-text h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 12.5px;
    font-weight: 700;
    color: #1E120A;
    margin: 0 0 2px 0;
    line-height: 1.25;
}

.sde-trust-text p {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: #8C7B6E;
    margin: 0;
    line-height: 1.2;
}

/* Responsive */
@media (max-width: 991.98px) {
    .sde-lux-title { font-size: 28px; }
    .sde-lux-header {
        flex-direction: column;
        align-items: center;
    }
    .sde-lux-header-action {
        position: static;
        margin-top: 14px;
    }
}

@media (max-width: 767.98px) {
    .sde-lux-section { padding: 36px 0 44px; }
    .cat-main-heading { font-size: 26px !important; margin-bottom: 6px !important; }
    .cat-desc { font-size: 12px !important; line-height: 1.45 !important; }
    .cat-explore-tag { gap: 8px; padding: 3px 12px; margin-bottom: 6px; }
    .cat-explore-tag .tag-text { font-size: 9.5px; letter-spacing: 1.8px; }
    .sde-trust-bar { padding: 14px 16px; }
    .sde-trust-item { gap: 10px; }
    .sde-trust-icon { width: 36px; height: 36px; font-size: 16px; }
    .sde-trust-text h4 { font-size: 11px; }
    .sde-trust-text p { font-size: 9.5px; }
}
</style>
@endpush


