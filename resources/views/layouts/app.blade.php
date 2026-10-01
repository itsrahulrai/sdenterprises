<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) - {{ setting('site_tagline', 'Premium Shopping') }}</title>
    <meta name="description" content="@yield('meta_description', setting('meta_description', ''))">
    <meta name="keywords" content="@yield('meta_keywords', setting('meta_keywords', ''))">

    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', '')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Favicon --}}
    <link rel="icon"
        href="{{ setting('site_favicon') ? asset('storage/' . setting('site_favicon')) : asset('images/favicon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ base_public_url('assets/css/style.css') }}">
    @stack('styles')
    <style>
        /* ============================================================
           S D ENTERPRISES — COFFEE PALETTE & BASE RESETS
        ============================================================ */
        :root {
            --sde-coffee-dark: #24130A;
            --sde-espresso: #2B170D;
            --sde-primary: #5A3218;
            --sde-secondary: #7A4A24;
            --sde-accent: #A66A35;
            --sde-gold: #B8945A;
            --sde-cream-bg: #FAF7F3;
            --sde-cream-card: #FAF4ED;
            --sde-cream-border: #EADBCE;
            --sde-cream-border-subtle: #EDE4DB;
            --sde-peach-pill: #FDF0E5;
            --sde-peach-border: #F8D9C4;
            --sde-peach-text: #6E3517;
            --sde-text-dark: #2B170D;
            --sde-text-muted: #7A6A5E;
        }

        /* ============================================================
           GLOBAL CONTAINER EXPANSION — BALANCED SIDE MARGINS
           Reduces excessive empty left/right margins across full layout
        ============================================================ */
        @media (min-width: 1200px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 94%;
            }
        }

        @media (min-width: 1400px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 93%;
            }
            .sde-search-wrapper {
                max-width: 680px;
            }
        }

        @media (min-width: 1600px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 92%;
            }
            .sde-search-wrapper {
                max-width: 720px;
            }
        }

        @media (min-width: 1920px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 1740px;
            }
        }

        /* ============================================================
           1. TOPBAR
        ============================================================ */
        .sde-topbar {
            background: var(--sde-coffee-dark);
            color: #E6D8CC;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            z-index: 1060;
        }

        .sde-topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 38px;
            padding: 4px 0;
        }

        .sde-topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .sde-topbar-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #E6D8CC;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
            white-space: nowrap;
        }

        .sde-topbar-item:hover {
            color: #F8D5A3;
        }

        .sde-topbar-item i {
            font-size: 13px;
            color: #C89F6B;
        }

        .sde-topbar-sep {
            color: rgba(255, 255, 255, 0.25);
            font-size: 11px;
            user-select: none;
        }

        .sde-topbar-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .sde-topbar-perks {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .sde-perk-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #E6D8CC;
            font-size: 11.5px;
            font-weight: 500;
            white-space: nowrap;
        }

        .sde-perk-item i {
            font-size: 13px;
            color: #C89F6B;
        }

        .sde-topbar-socials {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 6px;
        }

        .sde-topbar-socials a {
            color: #E6D8CC;
            font-size: 13.5px;
            transition: color 0.2s ease, transform 0.2s ease;
            text-decoration: none;
            display: inline-flex;
        }

        .sde-topbar-socials a:hover {
            color: #F8D5A3;
            transform: translateY(-1px);
        }

        @media (max-width: 1199.98px) {
            .sde-topbar-perks .sde-perk-item:nth-child(3) {
                display: none;
            }
        }

        @media (max-width: 991.98px) {
            .sde-topbar-perks {
                display: none;
            }
            .sde-topbar-inner {
                padding: 6px 0;
            }
        }

        @media (max-width: 767.98px) {
            .sde-topbar {
                padding: 4px 0 !important;
            }
            .sde-topbar-inner {
                flex-direction: row !important;
                justify-content: center !important;
                align-items: center !important;
                padding: 2px 0 !important;
                gap: 0 !important;
                text-align: center;
            }
            .sde-topbar-left {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: wrap !important;
                justify-content: center !important;
                align-items: center !important;
                gap: 4px 10px !important;
                width: 100% !important;
            }
            .sde-topbar-item {
                font-size: 11px !important;
                display: inline-flex !important;
                align-items: center !important;
                gap: 4px !important;
                white-space: nowrap;
            }
            .sde-topbar-item i {
                font-size: 11.5px !important;
            }
            .sde-topbar-sep-phone {
                display: inline-block !important;
                color: rgba(255, 255, 255, 0.35) !important;
                margin: 0 2px !important;
                font-size: 10px !important;
            }
            .sde-topbar-sep-location,
            .sde-topbar-location,
            .sde-topbar-right,
            .sde-topbar-socials {
                display: none !important;
            }
        }

        /* ============================================================
           2. MAIN HEADER (MIDDLE ROW)
        ============================================================ */
        .sde-main-header {
            background: #FFFFFF;
            padding: 14px 0;
            border-bottom: 1px solid #F0E8DF;
            position: relative;
            z-index: 1055;
        }

        .sde-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        /* Brand Logo */
        .sde-brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .sde-brand-logo img,
        .sde-logo-icon {
            height: 64px;
            width: auto;
            object-fit: contain;
            transition: transform 0.25s ease;
        }

        .sde-brand-logo:hover img,
        .sde-brand-logo:hover .sde-logo-icon {
            transform: scale(1.02);
        }

        .sde-brand-text {
            display: inline-flex;
            flex-direction: column;
            justify-content: center;
            width: max-content;
            vertical-align: middle;
        }

        .sde-brand-name {
            display: block;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 26px;
            font-weight: 800;
            color: #22120A;
            letter-spacing: 0.8px;
            line-height: 1.05;
            text-transform: uppercase;
            white-space: nowrap;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .sde-brand-tagline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-top: 3px;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 7.8px;
            font-weight: 700;
            color: #22120A;
            letter-spacing: 0.3px;
            line-height: 1;
            text-transform: uppercase;
            white-space: nowrap;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .sde-brand-tagline span {
            display: inline-block;
        }

        .sde-text-logo {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 22px;
            font-weight: 700;
            color: #3B1C10;
            letter-spacing: 0.5px;
        }

        @media (max-width: 991.98px) {
            .sde-brand-logo {
                gap: 10px;
            }
            .sde-brand-logo img,
            .sde-logo-icon {
                height: 48px;
            }
            .sde-brand-name {
                font-size: 18px;
                letter-spacing: 0.6px;
            }
            .sde-brand-tagline {
                font-size: 5.6px;
                margin-top: 2px;
                letter-spacing: 0.2px;
            }
        }

        @media (max-width: 575.98px) {
            .sde-brand-logo {
                gap: 8px;
            }
            .sde-brand-logo img,
            .sde-logo-icon {
                height: 42px;
            }
            .sde-brand-name {
                font-size: 15px;
                letter-spacing: 0.4px;
            }
            .sde-brand-tagline {
                font-size: 4.8px;
                margin-top: 1.5px;
                letter-spacing: 0.15px;
            }
        }

        /* Central Search Bar with Category Dropdown */
        .sde-search-wrapper {
            flex: 1;
            max-width: 630px;
            margin: 0 15px;
            position: relative;
        }

        .sde-search-form {
            display: flex;
            align-items: center;
            background: #FFFFFF;
            border: 1.5px solid #DDD0C2;
            border-radius: 50px;
            height: 46px;
            transition: all 0.25s ease;
            position: relative;
        }

        .sde-search-form:focus-within {
            border-color: #5A3218;
            box-shadow: 0 4px 16px rgba(90, 50, 24, 0.12);
        }

        /* Search Category Dropdown */
        .sde-search-cat-dropdown {
            position: relative;
            flex-shrink: 0;
        }

        .sde-search-cat-btn {
            background: transparent;
            border: none;
            outline: none;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #3B1C10;
            padding: 0 14px 0 18px;
            height: 44px;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            white-space: nowrap;
        }

        .sde-search-cat-btn i {
            font-size: 11px;
            color: #8C7B6B;
            transition: transform 0.2s ease;
        }

        .sde-search-cat-dropdown.show .sde-search-cat-btn i {
            transform: rotate(180deg);
        }

        .sde-search-cat-menu {
            border-radius: 16px !important;
            border: 1px solid #EADBCE !important;
            box-shadow: 0 12px 35px rgba(43, 23, 13, 0.14) !important;
            padding: 8px !important;
            min-width: 210px !important;
            margin-top: 8px !important;
            background: #FFFFFF !important;
        }

        .sde-cat-opt {
            font-family: 'Poppins', sans-serif !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            color: #3B1C10 !important;
            padding: 9px 14px !important;
            border-radius: 10px !important;
            transition: all 0.2s ease !important;
            display: flex !important;
            align-items: center !important;
        }

        .sde-cat-opt:hover,
        .sde-cat-opt.active {
            background: #FAF4ED !important;
            color: #5A3218 !important;
            font-weight: 600 !important;
        }

        .sde-search-divider {
            width: 1px;
            height: 24px;
            background: #EADBCE;
            flex-shrink: 0;
        }

        .sde-search-input-wrap {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 0;
            padding-left: 12px;
        }

        .sde-search-icon {
            font-size: 14px;
            color: #8C7B6B;
            margin-right: 8px;
            flex-shrink: 0;
        }

        .sde-search-input {
            border: none;
            outline: none;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #2B170D;
            width: 100%;
            padding: 0;
        }

        .sde-search-input::placeholder {
            color: #9C8B7D;
            font-weight: 400;
        }

        .sde-search-submit-btn {
            background: #4A2511;
            color: #FFFFFF;
            border: none;
            height: 46px;
            width: 52px;
            border-radius: 0 50px 50px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s ease;
            flex-shrink: 0;
        }

        .sde-search-submit-btn:hover {
            background: #331709;
        }

        /* AJAX Search Results Dropdown */
        .sde-ajax-search-results {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: #FFFFFF;
            border-radius: 16px;
            border: 1px solid #EADBCE;
            box-shadow: 0 14px 40px rgba(43, 23, 13, 0.16);
            max-height: 380px;
            overflow-y: auto;
            z-index: 1100;
            padding: 8px;
        }

        .sde-ajax-search-results .search-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #2B170D;
            transition: background 0.2s ease;
        }

        .sde-ajax-search-results .search-item:hover {
            background: #FAF4ED;
        }

        .sde-ajax-search-results .search-item img {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ECE3DA;
        }

        /* Header Right Actions */
        .sde-header-actions {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-shrink: 0;
        }

        .sde-action-item {
            text-decoration: none;
            cursor: pointer;
        }

        .sde-action-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #2B170D;
            transition: color 0.2s ease;
        }

        .sde-action-link:hover {
            color: #5A3218;
        }

        .sde-action-icon-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sde-action-link i {
            font-size: 22px;
            line-height: 1;
            color: #2B170D;
        }

        .sde-action-link .sde-action-label,
        .sde-action-link > span:not(.sde-count-badge) {
            font-size: 11.5px;
            font-weight: 600;
            margin-top: 3px;
            color: #2B170D;
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
            transition: color 0.2s ease;
        }

        .sde-count-badge {
            position: absolute;
            top: -6px;
            right: -10px;
            background: #D9531E;
            color: #FFFFFF !important;
            font-family: 'Poppins', -apple-system, sans-serif !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            min-width: 19px;
            height: 19px;
            padding: 0 4px;
            border-radius: 10px;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            border: 2px solid #FFFFFF;
            box-shadow: 0 2px 7px rgba(217, 83, 30, 0.4);
            line-height: 1 !important;
            margin: 0 !important;
            text-align: center;
            user-select: none;
            transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.25s ease, box-shadow 0.25s ease;
        }

        .sde-count-badge.is-empty {
            background: #9E8D82;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }

        .sde-count-badge.has-items {
            background: #D9531E;
            box-shadow: 0 2px 8px rgba(217, 83, 30, 0.45);
        }

        @keyframes sdeBadgeBump {
            0% { transform: scale(1); }
            35% { transform: scale(1.45); }
            65% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .sde-badge-bump {
            animation: sdeBadgeBump 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes sdeIconWiggle {
            0%, 100% { transform: rotate(0deg); }
            20% { transform: rotate(-12deg); }
            40% { transform: rotate(10deg); }
            60% { transform: rotate(-6deg); }
            80% { transform: rotate(4deg); }
        }

        .sde-icon-wiggle {
            animation: sdeIconWiggle 0.5s ease-in-out;
        }

        /* Luxury Coffee Toast Notification */
        .sde-custom-toast {
            background: #24130A !important;
            color: #FFFFFF !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important;
            border-left: 4px solid #D9531E !important;
            min-width: 320px;
            max-width: 420px;
        }
        .sde-toast-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 16px;
            flex-shrink: 0;
        }
        .sde-toast-msg {
            font-size: 13px;
            font-weight: 500;
            color: #FAF4ED;
            font-family: 'Poppins', sans-serif;
            line-height: 1.3;
        }
        .sde-toast-cart-btn {
            background: #D9531E !important;
            color: #FFFFFF !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            padding: 5px 12px !important;
            border-radius: 6px !important;
            text-decoration: none !important;
            white-space: nowrap !important;
            transition: all 0.2s ease !important;
        }
        .sde-toast-cart-btn:hover {
            background: #BF4413 !important;
            transform: translateY(-1px);
        }

        /* Get a Quote Button */
        .sde-quote-btn {
            background: #3B1C10 !important;
            color: #FFFFFF !important;
            text-decoration: none;
            padding: 9px 20px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(59, 28, 16, 0.28);
            transition: all 0.25s ease;
            white-space: nowrap;
            border: none;
            cursor: pointer;
        }

        .sde-quote-btn:hover {
            background: #24120A !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(59, 28, 16, 0.38);
            color: #FFFFFF !important;
        }

        .sde-quote-btn i {
            font-size: 16px;
        }

        /* User Account Dropdown */
        .sde-account-dropdown {
            border-radius: 16px !important;
            border: 1px solid #EADBCE !important;
            box-shadow: 0 12px 35px rgba(43, 23, 13, 0.14) !important;
            padding: 8px !important;
            min-width: 190px !important;
            margin-top: 10px !important;
        }

        .sde-account-dropdown .dropdown-item {
            font-family: 'Poppins', sans-serif !important;
            font-size: 13px !important;
            padding: 8px 14px !important;
            border-radius: 8px !important;
            color: #2B170D !important;
        }

        .sde-account-dropdown .dropdown-item:hover {
            background: #FAF4ED !important;
            color: #5A3218 !important;
        }

        /* Mobile Nav triggers */
        .sde-mobile-nav-triggers {
            display: none;
            align-items: center;
            gap: 16px;
        }

        .sde-mobile-cart-btn {
            position: relative;
            font-size: 24px;
            color: #2B170D;
            text-decoration: none;
        }

        .sde-mobile-toggle-btn {
            background: transparent;
            border: none;
            font-size: 28px;
            color: #2B170D;
            padding: 0;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        @media (max-width: 991.98px) {
            .sde-search-wrapper,
            .sde-header-actions {
                display: none !important;
            }
            .sde-mobile-nav-triggers {
                display: flex !important;
            }
            .sde-brand-logo img {
                height: 52px;
            }
        }

        @media (max-width: 1199.98px) and (min-width: 992px) {
            .sde-header-row {
                gap: 12px;
            }
            .sde-search-wrapper {
                margin: 0 8px;
            }
            .sde-header-actions {
                gap: 14px;
            }
            .sde-quote-btn {
                padding: 8px 14px;
                font-size: 12.5px;
            }
            .sde-brand-name {
                font-size: 22px;
            }
            .sde-brand-tagline {
                font-size: 6.8px;
            }
        }

        /* ============================================================
           STICKY HEADER (MAIN HEADER + NAVBAR TOGETHER)
        ============================================================ */
        .sde-sticky-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: #FFFFFF;
            box-shadow: 0 4px 20px rgba(43, 23, 13, 0.08);
            transition: box-shadow 0.25s ease;
        }

        /* ============================================================
           3. NAVBAR & MENU ITEMS
        ============================================================ */
        .sde-navbar {
            background: #FFFFFF;
            border-top: 1px solid #F1ECE6;
            border-bottom: 1px solid #EAE1D7;
            box-shadow: 0 4px 16px rgba(43, 23, 13, 0.07);
            position: relative;
            z-index: 1045;
        }

        .sde-nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 52px;
            padding-left: 0;
            padding-right: 0;
        }

        .sde-nav-menu {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        /* Home active button */
        .sde-nav-home-btn {
            background: #3B1C10 !important;
            color: #FFFFFF !important;
            border-radius: 8px;
            padding: 8px 18px !important;
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
            margin-right: 4px;
        }

        .sde-nav-home-btn:hover {
            background: #271108 !important;
            transform: translateY(-1px);
            color: #FFFFFF !important;
        }

        .sde-nav-home-btn i {
            font-size: 14px;
        }

        /* Standard Nav Links */
        .sde-nav-item {
            position: relative;
        }

        .sde-nav-link {
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            color: #2B170D;
            text-decoration: none;
            padding: 8px 11px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .sde-nav-link i.sde-arrow {
            font-size: 11px;
            color: #7A6A5E;
            transition: transform 0.25s ease, color 0.2s ease;
        }

        .sde-nav-item:hover > .sde-nav-link {
            color: #5A3218;
            background: rgba(90, 50, 24, 0.05);
        }

        .sde-nav-item:hover > .sde-nav-link i.sde-arrow {
            transform: rotate(180deg);
            color: #5A3218;
        }

        /* ============================================================
           HERO BANNER SLIDER (MODERN CARD DESIGN)
        ============================================================ */
        .sde-hero-section {
            padding-top: 8px;
            padding-bottom: 14px;
            background: transparent;
        }

        .sde-hero-carousel,
        #heroCarousel,
        .hero-default-banner {
            width: 100%;
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(43, 23, 13, 0.08);
            background: #1A0D07;
        }

        .sde-hero-carousel .carousel-inner {
            border-radius: 12px;
            overflow: hidden;
        }

        .hero-banner-img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
            object-fit: cover;
        }

        .hero-banner-mobile-img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
            object-fit: cover;
        }

        /* Floating Circular White Arrows (Like Reference Screenshot) */
        .sde-carousel-arrow,
        #heroCarousel .carousel-control-prev,
        #heroCarousel .carousel-control-next {
            width: 44px !important;
            height: 44px !important;
            background: #FFFFFF !important;
            border-radius: 50% !important;
            border: none !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2) !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            opacity: 0.95 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            cursor: pointer;
            z-index: 10;
            padding: 0;
        }

        .sde-carousel-arrow i,
        #heroCarousel .carousel-control-prev i,
        #heroCarousel .carousel-control-next i {
            font-size: 17px !important;
            font-weight: 800 !important;
            color: #2B170D !important;
            line-height: 1;
        }

        .sde-arrow-prev,
        #heroCarousel .carousel-control-prev {
            left: 20px !important;
            right: auto !important;
        }

        .sde-arrow-next,
        #heroCarousel .carousel-control-next {
            right: 20px !important;
            left: auto !important;
        }

        .sde-carousel-arrow:hover,
        #heroCarousel .carousel-control-prev:hover,
        #heroCarousel .carousel-control-next:hover {
            background: #FFFFFF !important;
            opacity: 1 !important;
            transform: translateY(-50%) scale(1.1) !important;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.3) !important;
        }

        .sde-carousel-arrow:hover i,
        #heroCarousel .carousel-control-prev:hover i,
        #heroCarousel .carousel-control-next:hover i {
            color: #5A3218 !important;
        }

        /* Indicators (Sleek Pills & Dots) */
        #heroCarousel .carousel-indicators {
            margin-bottom: 18px;
            gap: 4px;
        }

        #heroCarousel .carousel-indicators [data-bs-target],
        #heroCarousel .carousel-indicators button {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.65);
            border: none;
            margin: 0 3px;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        #heroCarousel .carousel-indicators .active {
            width: 26px;
            border-radius: 12px;
            background-color: #FFFFFF;
            opacity: 1;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 767.98px) {
            .sde-hero-section {
                padding-top: 6px;
                padding-bottom: 8px;
            }
            .sde-hero-carousel,
            #heroCarousel,
            .hero-default-banner,
            .sde-hero-carousel .carousel-inner,
            .hero-banner-img,
            .hero-banner-mobile-img {
                border-radius: 8px;
            }
            .sde-carousel-arrow,
            #heroCarousel .carousel-control-prev,
            #heroCarousel .carousel-control-next {
                width: 36px !important;
                height: 36px !important;
            }
            .sde-arrow-prev,
            #heroCarousel .carousel-control-prev {
                left: 10px !important;
            }
            .sde-arrow-next,
            #heroCarousel .carousel-control-next {
                right: 10px !important;
            }
            .sde-carousel-arrow i,
            #heroCarousel .carousel-control-prev i,
            #heroCarousel .carousel-control-next i {
                font-size: 14px !important;
            }
        }

        /* ============================================================
           4. SINGLE CATEGORY DROPDOWN MENU
        ============================================================ */
        .sde-simple-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: #FFFFFF;
            border-radius: 14px;
            border: 1px solid #E8DDD2;
            box-shadow: 0 12px 35px rgba(43, 23, 13, 0.12);
            min-width: 250px;
            padding: 8px;
            margin-top: 4px;
            display: none;
            opacity: 0;
            transform: translateY(8px);
            transition: all 0.2s ease;
            z-index: 1050;
            list-style: none;
        }

        .sde-nav-item:hover > .sde-simple-dropdown {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .sde-simple-dropdown-item {
            margin: 0;
        }

        .sde-simple-dropdown-link {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 12px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: #2B170D;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sde-dropdown-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #5A3218;
            opacity: 0.5;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .sde-simple-dropdown-link:hover {
            background: #FAF4ED;
            color: #5A3218;
            font-weight: 600;
            padding-left: 15px;
        }

        .sde-simple-dropdown-link:hover .sde-dropdown-dot {
            opacity: 1;
            transform: scale(1.3);
            background: #5A3218;
        }

        .sde-dropdown-footer-link {
            border-top: 1px dashed #EAE1D7;
            margin-top: 6px;
            padding-top: 8px;
            font-weight: 600;
            color: #5A3218;
        }

        /* ============================================================
           5. LUXURY SPLIT-PANE MEGA DROPDOWN (COFFEE BRAND STYLE)
        ============================================================ */
        .sde-nav-item.dropdown-mega {
            position: relative;
        }

        .sde-mega-category-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 820px;
            max-width: 90vw;
            background: #FFFFFF;
            border: 1px solid #E8DDD2;
            border-radius: 20px;
            box-shadow: 0 16px 50px rgba(43, 23, 13, 0.16);
            display: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s ease;
            overflow: hidden;
            z-index: 1050;
            margin-top: 6px;
        }

        .sde-nav-item.dropdown-mega:hover .sde-mega-category-dropdown,
        .sde-mega-category-dropdown.show {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .sde-mega-desktop-wrapper {
            display: flex;
            width: 100%;
        }

        /* Left Sidebar: Categories List */
        .sde-mega-cat-sidebar {
            width: 250px;
            background: #FAF6F1;
            border-right: 1px solid #EDE4DB;
            padding: 16px 12px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            max-height: 480px;
            overflow-y: auto;
        }

        .sde-mega-cat-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sde-mega-cat-sidebar::-webkit-scrollbar-thumb {
            background: #D8C7B8;
            border-radius: 4px;
        }

        .sde-mega-sidebar-header {
            padding: 2px 10px 10px 10px;
            border-bottom: 1px solid #EDE4DB;
            margin-bottom: 10px;
        }

        .sde-mega-sidebar-title {
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #8C6F59;
        }

        .sde-mega-cat-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sde-mega-cat-item {
            margin: 0;
        }

        .sde-mega-cat-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #2B170D;
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .sde-mega-cat-link i.mega-arrow {
            font-size: 11px;
            color: #A69282;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .sde-mega-cat-item:hover .sde-mega-cat-link,
        .sde-mega-cat-item.active .sde-mega-cat-link {
            background: #FFFFFF;
            color: #5A3218;
            font-weight: 600;
            border-color: #E8DDD2;
            box-shadow: 0 4px 12px rgba(90, 50, 24, 0.08);
        }

        .sde-mega-cat-item:hover .mega-arrow,
        .sde-mega-cat-item.active .mega-arrow {
            color: #5A3218;
            transform: translateX(3px);
        }

        /* Right Content: Subcategories Showcase */
        .sde-mega-subcat-content {
            flex: 1;
            min-width: 0;
            background: #FFFFFF;
            padding: 24px 28px;
            display: flex;
            flex-direction: column;
            max-height: 480px;
            overflow-y: auto;
        }

        .sde-mega-subcat-panel {
            display: none;
            flex-direction: column;
            height: 100%;
        }

        .sde-mega-subcat-panel.active {
            display: flex !important;
            animation: sdeFadeIn 0.2s ease-out;
        }

        .sde-mega-panel-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding-bottom: 12px;
            border-bottom: 1px solid #F0E8DF;
            margin-bottom: 16px;
        }

        .sde-mega-panel-tag {
            font-family: 'Poppins', sans-serif;
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #A66A35;
            display: block;
            margin-bottom: 2px;
        }

        .sde-mega-panel-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 22px;
            font-weight: 600;
            color: #2B170D;
            margin: 0;
            line-height: 1.2;
        }

        .sde-mega-explore-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 12.5px;
            font-weight: 600;
            color: #5A3218;
            text-decoration: none;
            transition: gap 0.2s ease;
        }

        .sde-mega-explore-link:hover {
            color: #3B1C10;
            gap: 9px;
        }

        .sde-mega-subcat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .sde-mega-subcat-card {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            background: #FAF7F3;
            border: 1px solid #ECE2D7;
            border-radius: 12px;
            text-decoration: none;
            color: #2B170D;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sde-mega-subcat-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #5A3218;
            opacity: 0.5;
            margin-right: 10px;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .sde-mega-subcat-name {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sde-mega-subcat-icon {
            font-size: 11px;
            color: #9E8E81;
            margin-left: 6px;
            opacity: 0.6;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .sde-mega-subcat-card:hover {
            background: #FFFFFF;
            border-color: #5A3218;
            color: #5A3218;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(90, 50, 24, 0.1);
        }

        .sde-mega-subcat-card:hover .sde-mega-subcat-dot {
            opacity: 1;
            background: #5A3218;
            box-shadow: 0 0 6px rgba(90, 50, 24, 0.4);
        }

        .sde-mega-subcat-card:hover .sde-mega-subcat-icon {
            opacity: 1;
            color: #5A3218;
            transform: translate(2px, -2px);
        }

        .sde-mega-empty-state {
            padding: 24px;
            text-align: center;
            background: #FAF7F3;
            border-radius: 12px;
        }

        .sde-mega-empty-state p {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #7A6A5E;
            margin-bottom: 12px;
        }

        .sde-mega-viewall-btn {
            background: #5A3218 !important;
            color: #FFFFFF !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            border-radius: 8px !important;
            padding: 6px 18px !important;
            text-decoration: none;
            display: inline-block;
        }

        /* ============================================================
           6. VALUE PROPOSITION / FEATURES STRIP
        ============================================================ */
        .sde-features-strip {
            background: #FAF7F3;
            border-top: 1px solid #F0E8DF;
            border-bottom: 1px solid #ECE3DA;
            padding: 12px 0;
            position: relative;
            overflow: hidden;
        }

        .sde-beans-left {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            height: 44px;
            width: auto;
            pointer-events: none;
            opacity: 0.95;
        }

        .sde-beans-right {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            height: 44px;
            width: auto;
            pointer-events: none;
            opacity: 0.95;
        }

        .sde-features-row {
            display: flex;
            align-items: center;
            justify-content: space-around;
            gap: 15px;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }

        .sde-feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sde-feat-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #F4EAE0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5A3218;
            font-size: 17px;
            flex-shrink: 0;
            border: 1px solid #EADBCE;
        }

        .sde-feat-text {
            display: flex;
            flex-direction: column;
        }

        .sde-feat-text strong {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: #2B170D;
            line-height: 1.2;
        }

        .sde-feat-text span {
            font-family: 'Poppins', sans-serif;
            font-size: 11.5px;
            color: #7A6A5E;
            line-height: 1.2;
        }

        @media (max-width: 991.98px) {
            .sde-beans-left,
            .sde-beans-right {
                display: none;
            }
            .sde-features-row {
                justify-content: center;
                gap: 18px 24px;
            }
        }

        /* ============================================================
           7. QUICK QUOTE MODAL
        ============================================================ */
        .sde-modal-content {
            border-radius: 20px;
            border: 1px solid #EADBCE;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(43, 23, 13, 0.25);
        }

        .sde-modal-header {
            background: linear-gradient(135deg, #24130A 0%, #4A2511 100%);
            color: #FFFFFF;
            padding: 18px 24px;
            border-bottom: none;
        }

        .sde-modal-header .modal-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 20px;
            font-weight: 600;
            color: #FFFFFF;
        }

        .sde-modal-header .modal-subtitle {
            font-size: 12px;
            color: #E2D3C4;
        }

        .sde-label {
            font-family: 'Poppins', sans-serif;
            font-size: 12.5px;
            font-weight: 600;
            color: #3B1C10;
            margin-bottom: 5px;
        }

        .sde-input {
            border: 1.5px solid #DDD0C2;
            border-radius: 10px;
            font-size: 13px;
            padding: 9px 12px;
            color: #2B170D;
        }

        .sde-input:focus {
            border-color: #5A3218;
            box-shadow: 0 0 0 3px rgba(90, 50, 24, 0.12);
        }

        .sde-btn-primary {
            background: linear-gradient(135deg, #4A2511 0%, #5C2D16 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13.5px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .sde-btn-primary:hover {
            background: #331709;
            color: #FFFFFF;
        }

        .sde-btn-whatsapp {
            background: #25D366;
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s ease;
        }

        .sde-btn-whatsapp:hover {
            background: #1EBE5D;
            color: #FFFFFF;
        }

        /* ============================================================
           8. MOBILE OFFCANVAS DRAWER & RESPONSIVE MENU
        ============================================================ */
        .sde-mobile-drawer {
            max-width: 320px;
            background: #FFFFFF;
        }

        .sde-drawer-header {
            background: #24130A;
            color: #FFFFFF;
            padding: 14px 18px;
        }

        .sde-drawer-body {
            padding: 14px;
        }

        .sde-mob-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sde-mob-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            border-radius: 10px;
            color: #2B170D;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            background: #FAF7F3;
            border: 1px solid #ECE3DA;
        }

        .sde-mob-link.active {
            background: #3B1C10;
            color: #FFFFFF;
            border-color: #3B1C10;
        }

        .sde-mob-subcat-list {
            list-style: none;
            padding: 6px 10px 8px 24px;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sde-mob-subcat-link {
            font-size: 13px;
            color: #5A3218;
            text-decoration: none;
            padding: 6px 0;
            display: block;
        }
    </style>
</head>

<body>

    @php
        $navCategories = \App\Models\Category::with(['subcategories' => function($q) {
            $q->where('is_active', true)->orderBy('sort_order');
        }])->where('is_active', true)->orderBy('sort_order')->get();

        $coffeeMachinesCat = $navCategories->firstWhere('slug', 'coffee-machines');
        $teaMachinesCat = $navCategories->firstWhere('slug', 'tea-machines');
        $premixesCat = $navCategories->firstWhere('slug', 'coffee-premixes');
        $waterDispensersCat = $navCategories->firstWhere('slug', 'water-dispensers');
        $combosCat = $navCategories->firstWhere('slug', 'combos');
    @endphp

    {{-- 1. TOPBAR --}}
    <div class="sde-topbar">
        <div class="container">
            <div class="sde-topbar-inner">
                {{-- Left: Email | Phone | Location --}}
                <div class="sde-topbar-left">
                    <a href="mailto:{{ setting('site_email', 'thahriani.sumit@gmail.com') }}" class="sde-topbar-item sde-topbar-email">
                        <i class="bi bi-envelope"></i>
                        <span>{{ setting('site_email', 'thahriani.sumit@gmail.com') }}</span>
                    </a>
                    <span class="sde-topbar-sep sde-topbar-sep-phone">|</span>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('site_phone', '+919911815542')) }}" class="sde-topbar-item sde-topbar-phone">
                        <i class="bi bi-telephone"></i>
                        <span>{{ setting('site_phone', '+91 99118 15542') }}</span>
                    </a>
                    <span class="sde-topbar-sep sde-topbar-sep-location d-none d-md-inline">|</span>
                    <span class="sde-topbar-item sde-topbar-location d-none d-md-inline-flex">
                        <i class="bi bi-geo-alt"></i>
                        <span>{{ setting('site_address', 'Rohini, New Delhi - 110085') }}</span>
                    </span>
                </div>

                {{-- Right: Perks & Socials --}}
                <div class="sde-topbar-right d-none d-md-flex">
                    <div class="sde-topbar-socials">
                        <a href="https://www.facebook.com/" target="_blank" rel="noopener" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/" target="_blank" rel="noopener" title="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.linkedin.com/" target="_blank" rel="noopener" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STICKY WRAPPER: MAIN HEADER + NAVBAR --}}
    <div class="sde-sticky-header">
        {{-- 2. MAIN HEADER (MIDDLE BAR) --}}
        <header class="sde-main-header">
            <div class="container">
                <div class="sde-header-row">
                {{-- Brand Logo with Icon & Name --}}
                <a href="{{ route('home') }}" class="sde-brand-logo">
                    @if (setting('site_logo'))
                        <img src="{{ asset('public/storage/' . setting('site_logo')) }}" alt="{{ config('app.name', 'S D Enterprises') }}" class="sde-logo-icon">
                    @endif
                    <div class="sde-brand-text">
                        <span class="sde-brand-name">{{ setting('site_name', 'S D ENTERPRISES') }}</span>
                        <span class="sde-brand-tagline">
                            @php
                                $tagline = trim(setting('site_tagline', 'BEVERAGE SOLUTIONS FOR A BETTER TOMORROW'));
                                $taglineWords = preg_split('/\s+/', $tagline);
                            @endphp
                            @foreach($taglineWords as $word)
                                <span>{{ $word }}</span>
                            @endforeach
                        </span>
                    </div>
                </a>

                {{-- Search Bar with Category Selector --}}
                <div class="sde-search-wrapper">
                    <form action="{{ route('search') }}" method="GET" class="sde-search-form" id="sdeHeaderSearchForm">
                        {{-- All Categories dropdown filter --}}
                        <div class="sde-search-cat-dropdown dropdown">
                            <button type="button" class="sde-search-cat-btn" data-bs-toggle="dropdown" aria-expanded="false" id="sdeCatDropdownBtn">
                                <span id="sdeSelectedCategoryName">All Categories</span>
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <input type="hidden" name="category" id="sdeSelectedCategoryInput" value="{{ request('category') }}">
                            <ul class="dropdown-menu sde-search-cat-menu shadow-lg">
                                <li>
                                    <a class="dropdown-item sde-cat-opt {{ !request('category') ? 'active' : '' }}" href="javascript:void(0)" data-slug="" data-name="All Categories">
                                        <i class="bi bi-grid-fill me-2"></i> All Categories
                                    </a>
                                </li>
                                @foreach ($navCategories as $cat)
                                    <li>
                                        <a class="dropdown-item sde-cat-opt {{ request('category') === $cat->slug ? 'active' : '' }}" href="javascript:void(0)" data-slug="{{ $cat->slug }}" data-name="{{ $cat->name }}">
                                            <i class="bi bi-cup-hot me-2"></i> {{ $cat->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sde-search-divider"></div>

                        {{-- Input with Search Icon --}}
                        <div class="sde-search-input-wrap">
                            <i class="bi bi-search sde-search-icon"></i>
                            <input type="text"
                                   name="q"
                                   id="search-input"
                                   class="sde-search-input"
                                   placeholder="Search for coffee machines, premixes, tea, dispensers..."
                                   autocomplete="off"
                                   value="{{ request('q') }}">
                        </div>

                        {{-- Brown search button --}}
                        <button type="submit" class="sde-search-submit-btn" aria-label="Search">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>

                    {{-- Live AJAX search dropdown container --}}
                    <div id="search-results-dropdown" class="sde-ajax-search-results d-none"></div>
                </div>

                {{-- Right: Account, Wishlist, Cart & Get a Quote --}}
                <div class="sde-header-actions">
                    {{-- Account --}}
                    @auth
                        <div class="dropdown sde-action-item">
                            <a href="javascript:void(0)" class="sde-action-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                                <span>{{ Str::words(Auth::user()->name, 1, '') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end sde-account-dropdown">
                                <li><a class="dropdown-item" href="{{ route('account.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.orders') }}"><i class="bi bi-box me-2"></i> Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.profile') }}"><i class="bi bi-person me-2"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown sde-action-item">
                            <a href="javascript:void(0)" class="sde-action-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                                <span>Account</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end sde-account-dropdown">
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i> Sign In</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus me-2"></i> Register</a></li>
                            </ul>
                        </div>
                    @endauth

                    @php
                        $wishCount = Auth::check() ? \App\Models\Wishlist::where('user_id', Auth::id())->count() : 0;
                        $cartCount = (int) app(\App\Services\CartService::class)->count();
                    @endphp

                    {{-- Wishlist --}}
                    <a href="{{ route('wishlist.index') }}" class="sde-action-item sde-action-link" title="Wishlist">
                        <div class="sde-action-icon-wrap">
                            <i class="bi bi-heart" id="wishlist-icon"></i>
                            <span class="sde-count-badge {{ $wishCount > 0 ? 'has-items' : 'is-empty' }}" id="wishlist-count">{{ $wishCount }}</span>
                        </div>
                        <span class="sde-action-label">Wishlist</span>
                    </a>

                    {{-- Cart --}}
                    <a href="{{ route('cart.index') }}" class="sde-action-item sde-action-link" title="Cart" id="sdeCartActionBtn">
                        <div class="sde-action-icon-wrap">
                            <i class="bi bi-cart3" id="cart-icon"></i>
                            <span class="sde-count-badge {{ $cartCount > 0 ? 'has-items' : 'is-empty' }}" id="desktop-cart-count">{{ $cartCount }}</span>
                        </div>
                        <span class="sde-action-label">Cart</span>
                    </a>

                    {{-- Enquire Now Button --}}
                    <button type="button" class="sde-quote-btn" data-bs-toggle="modal" data-bs-target="#quickQuoteModal">
                        <i class="bi bi-whatsapp"></i>
                        <span>Enquire Now</span>
                    </button>
                </div>

                {{-- Mobile navigation triggers --}}
                <div class="sde-mobile-nav-triggers d-lg-none">
                    <a href="{{ route('cart.index') }}" class="sde-mobile-cart-btn" title="Cart">
                        <div class="sde-action-icon-wrap">
                            <i class="bi bi-cart3"></i>
                            <span class="sde-count-badge {{ $cartCount > 0 ? 'has-items' : 'is-empty' }}" id="mobile-cart-count">{{ $cartCount }}</span>
                        </div>
                    </a>
                    <button class="sde-mobile-toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sdeMobileMenu" aria-controls="sdeMobileMenu">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- 3. NAVIGATION BAR --}}
    <nav class="sde-navbar d-none d-lg-block">
        <div class="container">
            <div class="sde-nav-container">
                <ul class="sde-nav-menu">
                    {{-- Home Pill --}}
                    <li>
                        <a href="{{ route('home') }}" class="sde-nav-home-btn {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    {{-- Shop with Mega Categories Dropdown --}}
                    <li class="sde-nav-item dropdown-mega">
                        <a href="{{ route('shop') }}" class="sde-nav-link" id="sdeShopDropdownToggle">
                            <span>Shop</span>
                            <i class="bi bi-chevron-down sde-arrow"></i>
                        </a>

                        {{-- LUXURY COFFEE-THEMED MEGA DROPDOWN --}}
                        <div class="sde-mega-category-dropdown">
                            <div class="sde-mega-desktop-wrapper">
                                {{-- Left Rail: Categories --}}
                                <div class="sde-mega-cat-sidebar">
                                    <div class="sde-mega-sidebar-header">
                                        <span class="sde-mega-sidebar-title">Categories</span>
                                    </div>
                                    <ul class="sde-mega-cat-list">
                                        @foreach ($navCategories as $index => $cat)
                                            <li class="sde-mega-cat-item {{ $index === 0 ? 'active' : '' }}" data-target="sde-mega-panel-{{ $cat->id }}">
                                                <a href="{{ route('shop.category', $cat->slug) }}" class="sde-mega-cat-link">
                                                    <span>{{ $cat->name }}</span>
                                                    @if($cat->subcategories->count())
                                                        <i class="bi bi-chevron-right mega-arrow"></i>
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- Right Panel: Subcategories Showcase --}}
                                <div class="sde-mega-subcat-content">
                                    @foreach ($navCategories as $index => $cat)
                                        <div class="sde-mega-subcat-panel {{ $index === 0 ? 'active' : '' }}" id="sde-mega-panel-{{ $cat->id }}">
                                            <div class="sde-mega-panel-header">
                                                <div>
                                                    <span class="sde-mega-panel-tag">Beverage Collection</span>
                                                    <h4 class="sde-mega-panel-title">{{ $cat->name }}</h4>
                                                </div>
                                                <a href="{{ route('shop.category', $cat->slug) }}" class="sde-mega-explore-link">
                                                    <span>Explore All {{ $cat->name }}</span>
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>

                                            <div class="sde-mega-panel-body">
                                                @if($cat->subcategories->count())
                                                    <div class="sde-mega-subcat-grid">
                                                        @foreach($cat->subcategories as $sub)
                                                            <a href="{{ route('shop.subcategory', ['categorySlug' => $cat->slug, 'subcategorySlug' => $sub->slug]) }}"
                                                               class="sde-mega-subcat-card">
                                                                <span class="sde-mega-subcat-dot"></span>
                                                                <span class="sde-mega-subcat-name">{{ $sub->name }}</span>
                                                                <i class="bi bi-arrow-up-right sde-mega-subcat-icon"></i>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="sde-mega-empty-state">
                                                        <p>Discover our exclusive range of commercial {{ strtolower($cat->name) }} solutions.</p>
                                                        <a href="{{ route('shop.category', $cat->slug) }}" class="sde-mega-viewall-btn">
                                                            View {{ $cat->name }}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- Coffee Machines Dropdown --}}
                    @if($coffeeMachinesCat)
                        <li class="sde-nav-item">
                            <a href="{{ route('shop.category', $coffeeMachinesCat->slug) }}" class="sde-nav-link">
                                <span>{{ $coffeeMachinesCat->name }}</span>
                                <i class="bi bi-chevron-down sde-arrow"></i>
                            </a>
                            @if($coffeeMachinesCat->subcategories->count())
                                <ul class="sde-simple-dropdown">
                                    @foreach($coffeeMachinesCat->subcategories as $sub)
                                        <li class="sde-simple-dropdown-item">
                                            <a href="{{ route('shop.subcategory', ['categorySlug' => $coffeeMachinesCat->slug, 'subcategorySlug' => $sub->slug]) }}" class="sde-simple-dropdown-link">
                                                <span class="sde-dropdown-dot"></span>
                                                <span>{{ $sub->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="sde-simple-dropdown-item">
                                        <a href="{{ route('shop.category', $coffeeMachinesCat->slug) }}" class="sde-simple-dropdown-link sde-dropdown-footer-link">
                                            <span>View All {{ $coffeeMachinesCat->name }} &rarr;</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endif

                    {{-- Tea Machines Dropdown --}}
                    @if($teaMachinesCat)
                        <li class="sde-nav-item">
                            <a href="{{ route('shop.category', $teaMachinesCat->slug) }}" class="sde-nav-link">
                                <span>{{ $teaMachinesCat->name }}</span>
                                <i class="bi bi-chevron-down sde-arrow"></i>
                            </a>
                            @if($teaMachinesCat->subcategories->count())
                                <ul class="sde-simple-dropdown">
                                    @foreach($teaMachinesCat->subcategories as $sub)
                                        <li class="sde-simple-dropdown-item">
                                            <a href="{{ route('shop.subcategory', ['categorySlug' => $teaMachinesCat->slug, 'subcategorySlug' => $sub->slug]) }}" class="sde-simple-dropdown-link">
                                                <span class="sde-dropdown-dot"></span>
                                                <span>{{ $sub->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="sde-simple-dropdown-item">
                                        <a href="{{ route('shop.category', $teaMachinesCat->slug) }}" class="sde-simple-dropdown-link sde-dropdown-footer-link">
                                            <span>View All {{ $teaMachinesCat->name }} &rarr;</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endif



                    {{-- Combos --}}
                    @if($combosCat)
                        <li class="sde-nav-item">
                            <a href="{{ route('shop.category', $combosCat->slug) }}" class="sde-nav-link">
                                <span>{{ $combosCat->name }}</span>
                            </a>
                        </li>
                    @endif

                    {{-- Brands --}}
                    <li class="sde-nav-item">
                        <a href="{{ route('shop') }}" class="sde-nav-link">
                            <span>Brands</span>
                        </a>
                    </li>

                    {{-- About Us --}}
                    <li class="sde-nav-item">
                        <a href="{{ route('about') }}" class="sde-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                            <span>About Us</span>
                        </a>
                    </li>

                    {{-- Blog --}}
                    <li class="sde-nav-item">
                        <a href="{{ route('blog.index') }}" class="sde-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                            <span>Blog</span>
                        </a>
                    </li>

                    {{-- Contact Us --}}
                    <li class="sde-nav-item">
                        <a href="{{ route('contact') }}" class="sde-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    </div>{{-- End .sde-sticky-header --}}


    {{-- Flash Messages --}}
    @if (session('success') || session('error'))
        <div class="toast-container">
            <div class="toast show align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
                role="alert">
                <div class="d-flex">
                    <div class="toast-body">{{ session('success') ?? session('error') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    @yield('content')
    
  <footer class="gw-footer">

    {{-- Trust badges --}}
    <div class="gw-trust">
        <div class="container">
            <div class="gw-trust-row">
                <div class="gw-trust-item">
                    <div class="gw-trust-icon-wrap">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="gw-trust-text">
                        <h6 class="gw-trust-title">100% Handcrafted</h6>
                        <span class="gw-trust-sub">Premium Brass &amp; Silver Plated</span>
                    </div>
                </div>
                <div class="gw-trust-item">
                    <div class="gw-trust-icon-wrap">
                        <i class="bi bi-gem"></i>
                    </div>
                    <div class="gw-trust-text">
                        <h6 class="gw-trust-title">Authentic &amp; Vintage Designs</h6>
                        <span class="gw-trust-sub">Timeless Metal Handicrafts</span>
                    </div>
                </div>
                <div class="gw-trust-item">
                    <div class="gw-trust-icon-wrap">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div class="gw-trust-text">
                        <h6 class="gw-trust-title">Safe &amp; Secure Packaging</h6>
                        <span class="gw-trust-sub">Delivered with Care</span>
                    </div>
                </div>
                <div class="gw-trust-item">
                    <div class="gw-trust-icon-wrap">
                        <i class="bi bi-gift"></i>
                    </div>
                    <div class="gw-trust-text">
                        <h6 class="gw-trust-title">Perfect for Gifting</h6>
                        <span class="gw-trust-sub">Weddings, Corporate &amp; More</span>
                    </div>
                </div>
                <div class="gw-trust-item">
                    <div class="gw-trust-icon-wrap">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="gw-trust-text">
                        <h6 class="gw-trust-title">Quality You Can Trust</h6>
                        <span class="gw-trust-sub">Handmade with Excellence</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="gw-cols">

            {{-- About --}}
            <div class="gw-col gw-brand">
                <a href="{{ route('home') }}" class="gw-logo">
                    @if (setting('site_logo'))
                        <img src="{{ asset('public/storage/' . setting('site_logo')) }}" alt="{{ config('app.name') }}">
                    @else
                        <img src="{{ base_public_url('assets/img/kkt.png') }}" alt="{{ config('app.name') }}">
                    @endif
                </a>
                <p>{{ setting('site_tagline', 'Finesse By Design is a trusted manufacturer and exporter of premium brass, silver-plated, and luxury handcrafted tableware — delivering timeless elegance across India and worldwide.') }}</p>
            </div>

            {{-- Quick Links --}}
            <div class="gw-col">
                <h6>Quick Links</h6>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            {{-- Product Categories --}}
           <div class="gw-col">
                    <h6>Categories</h6>
                    @php
                        $categories = \App\Models\Category::orderBy('name')
                                        ->take(6)
                                        ->get();
                    @endphp

                    <ul>
                        @forelse($categories as $category)
                            <li>
                                <a href="{{ route('shop', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty
                            <li>No categories found.</li>
                        @endforelse
                    </ul>
                </div>

            {{-- Customer Support --}}
            <div class="gw-col">
                <h6>Useful Links</h6>
                <ul>
                    @if($footerPages && $footerPages->count())
                        @foreach($footerPages as $page)
                            <li><a href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            {{-- Contact --}}
            <div class="gw-col">
                <h6>Contact Us</h6>
                <ul class="gw-contact">
                    <li><i class="bi bi-geo-alt-fill"></i> {{ setting('site_address', 'Address') }}</li>
                    @if(setting('site_phone'))
                    <li><i class="bi bi-telephone-fill"></i> <a href="tel:{{ setting('site_phone') }}">{{ setting('site_phone') }}</a></li>
                    @endif
                    @if(setting('site_email'))
                    <li><i class="bi bi-envelope-fill"></i> <a href="mailto:{{ setting('site_email') }}">{{ setting('site_email') }}</a></li>
                    @endif
                </ul>
            </div>

        </div>

    </div>

    {{-- Bottom --}}
    <div class="gw-bottom">
        <div class="container">
            <div class="gw-bottom-inner">
                <div class="gw-copy">© {{ date('Y') }} {{ setting('site_name', 'Finesse By Design') }}. All Rights Reserved.</div>

                
        {{-- Social --}}
       
                <div class="gw-pay">
                    
            <div class="gw-social">
                <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
                <a href="#"><i class="bi bi-whatsapp"></i></a>
            </div>
        
                </div>
            </div>
        </div>
    </div>

</footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // CSRF setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Auto-dismiss toasts
        setTimeout(() => {
            document.querySelectorAll('.toast').forEach(t => new bootstrap.Toast(t, {
                autohide: true,
                delay: 3500
            }).hide());
        }, 3500);

        // AJAX Search
        let searchTimeout;
        $('#search-input').on('input', function() {
            const q = $(this).val().trim();
            clearTimeout(searchTimeout);
            if (q.length < 2) {
                $('#search-results-dropdown').addClass('d-none').empty();
                return;
            }
            searchTimeout = setTimeout(() => {
                $.get('{{ route('search.ajax') }}', {
                    q
                }, function(data) {
                    const $d = $('#search-results-dropdown');
                    if (!data.length) {
                        $d.addClass('d-none');
                        return;
                    }
                    let html = data.map(p => `
                <a href="${p.url}" class="search-item">
                    <img src="${p.image}" alt="${p.name}">
                    <div><div style="font-size:.88rem;font-weight:600;">${p.name}</div>
                    <div style="color:var(--kkt-primary);font-weight:700;">₹ ${Math.round(parseFloat(p.price)).toLocaleString('en-IN')}</div></div>
                </a>`).join('');
                    $d.html(html).removeClass('d-none');
                });
            }, 300);
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('form').length) $('#search-results-dropdown').addClass('d-none');
        });

        // Shared helper: keep the navbar cart badges (mobile + desktop) in sync
        // instantly, without needing a page refresh. Any add/remove/update flow
        // anywhere in the app should call this with the fresh count from the server.
        // Shared helper: keep the navbar cart badges (mobile + desktop) in sync with pop animation
        window.updateCartCount = function(count) {
            const countNum = parseInt(count) || 0;
            const mobileBadge = $('#mobile-cart-count');
            const desktopBadge = $('#desktop-cart-count');
            const cartIcons = $('#cart-icon, .sde-mobile-cart-btn i');

            mobileBadge.text(countNum);
            desktopBadge.text(countNum);

            if (countNum > 0) {
                desktopBadge.removeClass('is-empty').addClass('has-items');
                mobileBadge.removeClass('is-empty').addClass('has-items');
            } else {
                desktopBadge.addClass('is-empty').removeClass('has-items');
                mobileBadge.addClass('is-empty').removeClass('has-items');
            }

            // Animate bump/pop and wiggle
            desktopBadge.removeClass('sde-badge-bump');
            mobileBadge.removeClass('sde-badge-bump');
            cartIcons.removeClass('sde-icon-wiggle');

            void desktopBadge[0]?.offsetWidth; // force reflow

            desktopBadge.addClass('sde-badge-bump');
            mobileBadge.addClass('sde-badge-bump');
            cartIcons.addClass('sde-icon-wiggle');

            setTimeout(() => {
                desktopBadge.removeClass('sde-badge-bump');
                mobileBadge.removeClass('sde-badge-bump');
                cartIcons.removeClass('sde-icon-wiggle');
            }, 550);
        };

        // Shared helper for wishlist count
        window.updateWishlistCount = function(count) {
            const countNum = parseInt(count) || 0;
            const badge = $('#wishlist-count');
            const icon = $('#wishlist-icon');

            badge.text(countNum);
            if (countNum > 0) {
                badge.removeClass('is-empty').addClass('has-items');
            } else {
                badge.addClass('is-empty').removeClass('has-items');
            }

            badge.removeClass('sde-badge-bump');
            icon.removeClass('sde-icon-wiggle');
            void badge[0]?.offsetWidth;
            badge.addClass('sde-badge-bump');
            icon.addClass('sde-icon-wiggle');
            setTimeout(() => {
                badge.removeClass('sde-badge-bump');
                icon.removeClass('sde-icon-wiggle');
            }, 550);
        };

        // Add to Cart AJAX (product listing / category / wishlist cards).
        $(document).on('click', '.btn-add-to-cart:not(#main-add-to-cart)', function(e) {
            e.preventDefault();
            const btn = $(this);
            const productId = btn.attr('data-product-id');
            const variantId = btn.attr('data-variant-id') || null;
            const qty = parseInt($('#qty-input').val() || 1);

            $.post('{{ route('cart.add') }}', {
                    product_id: productId,
                    product_variant_id: variantId,
                    quantity: qty
                })
                 .done(res => {
                    if (res.success) {
                        window.updateCartCount(res.count);
                        showToast(res.message, 'success');
                    }
                })
                .fail(() => showToast('Failed to add product to cart', 'danger'));
        });

        // Wishlist toggle
        $(document).on('click', '.btn-wishlist', function(e) {
            e.preventDefault();
            @guest
                window.location.href = '{{ route('login') }}';
                return;
            @endguest
            const btn = $(this);
            $.post('{{ route('wishlist.toggle') }}', {
                product_id: btn.data('product-id')
            })
            .done(res => {
                if (res.success) {
                    btn.toggleClass('wishlisted', res.inWishlist);
                    btn.find('i').toggleClass('bi-heart', !res.inWishlist).toggleClass('bi-heart-fill', res.inWishlist);
                    if (res.count !== undefined) {
                        window.updateWishlistCount(res.count);
                    }
                    showToast(res.message, res.inWishlist ? 'success' : 'warning');
                }
            });
        });

        function showToast(msg, type = 'success') {
            const id = 'toast-' + Date.now();
            const isSuccess = type === 'success';
            const icon = isSuccess ? 'bi-bag-check-fill' : (type === 'danger' ? 'bi-exclamation-triangle-fill' : 'bi-heart-fill');
            const iconBg = isSuccess ? '#D9531E' : (type === 'danger' ? '#C62828' : '#8A5333');
            const isCart = isSuccess && (msg.toLowerCase().includes('cart') || msg.toLowerCase().includes('added'));
            const cartBtn = isCart ? `<a href="{{ route('cart.index') }}" class="btn btn-sm sde-toast-cart-btn ms-2">View Cart &rarr;</a>` : '';

            const html = `
                <div id="${id}" class="toast sde-custom-toast show align-items-center border-0 mb-2 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex align-items-center p-3">
                        <div class="sde-toast-icon" style="background: ${iconBg};">
                            <i class="bi ${icon}"></i>
                        </div>
                        <div class="sde-toast-body ms-3 flex-grow-1">
                            <div class="sde-toast-msg">${msg}</div>
                        </div>
                        ${cartBtn}
                        <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>`;
            let container = document.querySelector('.toast-container');
            if (!container) {
                container = document.createElement('div');
                container.className = 'toast-container position-fixed top-0 end-0 p-3';
                container.style.zIndex = '9999';
                document.body.appendChild(container);
            }
            container.insertAdjacentHTML('beforeend', html);
            setTimeout(() => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.remove('show');
                    setTimeout(() => el.remove(), 300);
                }
            }, 4000);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script>
        (function() {
            'use strict';
         const REELS = [
        {id:1, videoId:'uAmxdUDmJKw'},
        {id:2, videoId:'bIqAijsjH08'},
        {id:3, videoId:'Aw6QwM01kG8'},
        {id:4, videoId:'rIuwqzQO_xQ'},
        {id:5, videoId:'3P10tqraZsg'},
        { id: 6, videoId: 'lseFh9qG3g8'}
        ];

            /* ============================================================
               2. DOM REFS
            ============================================================ */
            const phoneScreen = document.querySelector('.rs-screen');
            const stripSlides = document.querySelectorAll('.rs-strip-slide');
            const stripCards = document.querySelectorAll('.rs-strip-card');

            /* Phone screen elements */
            const elMainVideo = document.getElementById('rsMainVideo');
            const elProdCat = document.querySelector('.rs-prod-cat');
            const elProdName = document.querySelector('.rs-prod-name');
            const elProdPrice = document.querySelector('.rs-prod-price');
            const elLikes = document.querySelectorAll('.rs-action-btn')[0]?.querySelector('p');
            const elComments = document.querySelectorAll('.rs-action-btn')[1]?.querySelector('p');

            /* ============================================================
               3. UPDATE PHONE with selected reel data
            ============================================================ */
            function updatePhone(index) {
                const reel = REELS[index];
                if (!reel) return;

                /* ---- Update placeholder / video ---- */
                if (elMainVideo) {
                    
                   const frame = document.getElementById('rsYoutubeFrame');
                        if(frame){

                           frame.src =
                            'https://www.youtube-nocookie.com/embed/' +
                            reel.videoId +
                            '?autoplay=1&mute=1&controls=0&playsinline=1';

                        }
                        
                }

                /* ---- Animate screen transition ---- */
                if (phoneScreen) {
                    phoneScreen.style.opacity = '0';
                    phoneScreen.style.transform = 'scale(0.97)';
                    setTimeout(function() {
                        phoneScreen.style.transition = 'opacity .35s ease, transform .35s ease';
                        phoneScreen.style.opacity = '1';
                        phoneScreen.style.transform = 'scale(1)';
                    }, 80);
                }
            }

            /* ============================================================
               4. SET ACTIVE CARD
            ============================================================ */
            function setActiveCard(index) {
                stripCards.forEach(function(card, i) {
                    if (i === index) {
                        card.classList.add('rs-active-card');
                    } else {
                        card.classList.remove('rs-active-card');
                    }
                });
                updatePhone(index);
            }

            /* ============================================================
               5. CLICK HANDLERS on strip cards
            ============================================================ */
            stripCards.forEach(function(card, i) {
                card.addEventListener('click', function() {
                    setActiveCard(i);
                    /* If swiper exists, slide to that index */
                    if (window._rsSwiper) {
                        window._rsSwiper.slideTo(i);
                    }
                });
            });

            /* ============================================================
               6. SWIPER — Vertical strip (auto-advances every 3s)
            ============================================================ */
            document.addEventListener('DOMContentLoaded', function() {

                /* Detect tablet/mobile for direction */
                const isMobile = window.innerWidth <= 900;

                window._rsSwiper = new Swiper('#rsStripSwiper', {
                    direction: isMobile ? 'horizontal' : 'vertical',
                    slidesPerView: isMobile ? 1.4 : 5,
                    spaceBetween: 16,
                    loop: !isMobile,
                    speed: isMobile ? 600 : 900,
                    grabCursor: true,
                    freeMode: isMobile,
                    centeredSlides: false,
                    autoplay: isMobile ? false : {
                        delay: 2000,
                        disableOnInteraction: false
                    },
                    mousewheel: false,
                    on: {
                        slideChange: function () {
                            const idx = this.realIndex % REELS.length;
                            setActiveCard(idx);
                        }
                    }

                });

                /* Initial state */
                setActiveCard(0);

                /* ---- Pause autoplay when user hovers the phone ---- */
                const phoneEl = document.getElementById('rsPhone');
                if (phoneEl && window._rsSwiper) {
                    phoneEl.addEventListener('mouseenter', function() {
                        window._rsSwiper.autoplay.stop();
                    });
                    phoneEl.addEventListener('mouseleave', function() {
                        window._rsSwiper.autoplay.start();
                    });
                }
            });

            /* ============================================================
               7. RESIZE HANDLER — re-init swiper direction on breakpoint
            ============================================================ */
            let _resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(_resizeTimer);
                _resizeTimer = setTimeout(function() {
                    if (window._rsSwiper) {
                        window._rsSwiper.destroy(true, true);
                    }
                    const isMob = window.innerWidth <= 900;
                    window._rsSwiper = new Swiper('#rsStripSwiper', {
                        direction: isMob ? 'horizontal' : 'vertical',
                      slidesPerView: isMob ? 1.4 : 5,
                       slidesPerView: isMob ? 1.4 : 5,
                            spaceBetween: 16,
                            loop: !isMob,
                            freeMode: isMob,
                            speed: isMob ? 600 : 900,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true,
                        },
                        on: {
                            slideChange: function() {
                                const idx = this.realIndex % REELS.length;
                                setActiveCard(idx);
                            }
                        }
                    });
                }, 250);
            });

        })();

    {{-- Quick Quote Modal --}}
    <div class="modal fade" id="quickQuoteModal" tabindex="-1" aria-labelledby="quickQuoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content sde-modal-content">
                <div class="modal-header sde-modal-header">
                    <div>
                        <h5 class="modal-title" id="quickQuoteModalLabel">Get a Quick Quote</h5>
                        <p class="modal-subtitle mb-0">Commercial Coffee Machines &amp; Premix Solutions</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="sdeQuickQuoteForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label sde-label">Your Name *</label>
                            <input type="text" name="name" id="quoteName" class="form-control sde-input" placeholder="e.g. Rahul Sharma" required>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label sde-label">Phone Number *</label>
                                <input type="tel" name="phone" id="quotePhone" class="form-control sde-input" placeholder="+91 99999 99999" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label sde-label">Email Address *</label>
                                <input type="email" name="email" id="quoteEmail" class="form-control sde-input" placeholder="name@company.com" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label sde-label">Machine / Premix Requirement</label>
                            <select name="subject" class="form-select sde-input" id="quoteProductSelect">
                                <option value="Coffee Vending Machine Enquiry">Coffee Vending Machine</option>
                                <option value="Tea & Coffee Machine Enquiry">Tea &amp; Coffee Vending Machine</option>
                                <option value="Atlantis Vending Machine Enquiry">Atlantis Vending Machine</option>
                                <option value="Coffee Premixes Bulk Order">Coffee Premixes (Nestle / Nescafe)</option>
                                <option value="Water Dispenser Commercial Quote">Water Dispenser</option>
                                <option value="Coffee Machine Rental Enquiry">Coffee Machine Rental</option>
                                <option value="Office Combo Package Quote">Office Combos</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label sde-label">Message / Details</label>
                            <textarea name="message" id="quoteMessage" class="form-control sde-input" rows="3" placeholder="Tell us your requirement (e.g. office size, estimated daily cups, rental duration)..." required></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn sde-btn-primary flex-grow-1">
                                <i class="bi bi-send me-1"></i> Send Request
                            </button>
                            <a href="javascript:void(0)" id="quoteWhatsAppBtn" class="btn sde-btn-whatsapp">
                                <i class="bi bi-whatsapp"></i> Chat Now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile Offcanvas Drawer Menu --}}
    <div class="offcanvas offcanvas-start sde-mobile-drawer" tabindex="-1" id="sdeMobileMenu" aria-labelledby="sdeMobileMenuLabel">
        <div class="offcanvas-header sde-drawer-header">
            <a href="{{ route('home') }}" class="sde-brand-logo">
                @if (setting('site_logo'))
                    <img src="{{ asset('public/storage/' . setting('site_logo')) }}" alt="{{ config('app.name') }}" style="height:44px; filter: brightness(0) invert(1);">
                @endif
                <div class="sde-brand-text">
                    <span class="sde-brand-name text-white" style="font-size:16px; letter-spacing:0.5px;">S D ENTERPRISES</span>
                    <span class="sde-brand-tagline text-white-50" style="font-size:5.2px; margin-top:2px;">
                        @php
                            $drawerWords = preg_split('/\s+/', trim(setting('site_tagline', 'BEVERAGE SOLUTIONS FOR A BETTER TOMORROW')));
                        @endphp
                        @foreach($drawerWords as $word)
                            <span>{{ $word }}</span>
                        @endforeach
                    </span>
                </div>
            </a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body sde-drawer-body">
            <div class="mb-3">
                <a href="https://wa.me/919911815542?text={{ urlencode('Hello S D Enterprises, I would like to enquire about beverage solutions.') }}" target="_blank" class="btn sde-quote-btn w-100 justify-content-center">
                    <i class="bi bi-whatsapp"></i>
                    <span>Enquire Now</span>
                </a>
            </div>

            <ul class="sde-mob-menu">
                <li>
                    <a href="{{ route('home') }}" class="sde-mob-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span><i class="bi bi-house-door me-2"></i> Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop') }}" class="sde-mob-link {{ request()->routeIs('shop') ? 'active' : '' }}">
                        <span><i class="bi bi-shop me-2"></i> All Products</span>
                    </a>
                </li>

                @foreach ($navCategories as $cat)
                    <li>
                        <div class="sde-mob-cat-accordion">
                            <a href="{{ route('shop.category', $cat->slug) }}" class="sde-mob-link">
                                <span>{{ $cat->name }}</span>
                                @if($cat->subcategories->count())
                                    <button type="button" class="btn btn-sm p-0 text-muted ms-auto" data-bs-toggle="collapse" data-bs-target="#mob-cat-{{ $cat->id }}" aria-expanded="false">
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                @endif
                            </a>
                            @if($cat->subcategories->count())
                                <div class="collapse" id="mob-cat-{{ $cat->id }}">
                                    <ul class="sde-mob-subcat-list">
                                        @foreach($cat->subcategories as $sub)
                                            <li>
                                                <a href="{{ route('shop.subcategory', ['categorySlug' => $cat->slug, 'subcategorySlug' => $sub->slug]) }}" class="sde-mob-subcat-link">
                                                    &bull; {{ $sub->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <a href="{{ route('shop.category', $cat->slug) }}" class="sde-mob-subcat-link fw-bold">
                                                &rarr; View All {{ $cat->name }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach

                <li>
                    <a href="{{ route('about') }}" class="sde-mob-link">
                        <span><i class="bi bi-info-circle me-2"></i> About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="sde-mob-link">
                        <span><i class="bi bi-journal-text me-2"></i> Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="sde-mob-link">
                        <span><i class="bi bi-envelope me-2"></i> Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop', ['on_sale' => 1]) }}" class="sde-mob-link text-danger">
                        <span><i class="bi bi-percent me-2"></i> Offers &amp; Deals</span>
                    </a>
                </li>
            </ul>

            <div class="mt-4 pt-3 border-top">
                <div class="d-flex flex-column gap-2 font-13 text-muted">
                    <div><i class="bi bi-telephone-fill me-2 text-primary"></i> <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('site_phone', '+919911815542')) }}" class="text-decoration-none text-dark">{{ setting('site_phone', '+91 99118 15542') }}</a></div>
                    <div><i class="bi bi-envelope-fill me-2 text-primary"></i> <a href="mailto:{{ setting('site_email', 'thahriani.sumit@gmail.com') }}" class="text-decoration-none text-dark">{{ setting('site_email', 'thahriani.sumit@gmail.com') }}</a></div>
                    <div><i class="bi bi-geo-alt-fill me-2 text-primary"></i> {{ setting('site_address', 'Rohini, New Delhi - 110085') }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- SDE INTERACTIVE SCRIPTS: SEARCH CATEGORY, MEGA MENU, QUOTE --}}
    <script>
        (function() {
            // Category selector inside search bar
            $(document).on('click', '.sde-cat-opt', function(e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var name = $(this).data('name');
                $('#sdeSelectedCategoryName').text(name);
                $('#sdeSelectedCategoryInput').val(slug);
                $('.sde-cat-opt').removeClass('active');
                $(this).addClass('active');
            });

            // Quick Quote WhatsApp Button
            $('#quoteWhatsAppBtn').on('click', function(e) {
                e.preventDefault();
                var name = $('#quoteName').val() || 'Customer';
                var phone = $('#quotePhone').val() || '';
                var prod = $('#quoteProductSelect').val() || 'Beverage Solution';
                var msg = $('#quoteMessage').val() || '';
                var queryText = 'Hello S D Enterprises,\nMy Name: ' + name + (phone ? '\nPhone: ' + phone : '') + '\nRequirement: ' + prod + (msg ? '\nDetails: ' + msg : '');
                window.open('https://wa.me/919911815542?text=' + encodeURIComponent(queryText), '_blank');
            });

            // Mega menu category panel switch
            function switchSdeMegaCategory(item) {
                if (!item) return;
                var targetId = item.getAttribute('data-target');
                if (!targetId) return;

                document.querySelectorAll('.sde-mega-cat-item').forEach(function(el) {
                    el.classList.remove('active');
                });
                item.classList.add('active');

                document.querySelectorAll('.sde-mega-subcat-panel').forEach(function(panel) {
                    panel.classList.remove('active');
                });
                var targetPanel = document.getElementById(targetId);
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            }

            // Desktop hover on mega category item
            $(document).on('mouseenter mouseover', '.sde-mega-cat-item', function() {
                if (window.innerWidth >= 992) {
                    switchSdeMegaCategory(this);
                }
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>
