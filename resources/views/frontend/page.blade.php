@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title)
@section('meta_description', $page->meta_description ?? '')
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')

{{-- Breadcrumb --}}
<div class="breadcrumb-kkt">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill me-1"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active text-truncate" style="max-width: min(480px, 50vw);" aria-current="page">
                    {{ $page->title }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<section class="sde-policy-page-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">

                {{-- Policy Navigation Tabs (Quick Switcher) --}}
                @php
                    $isPolicyPage = in_array($page->slug, [
                        'privacy-policy',
                        'terms-and-conditions',
                        'terms-conditions',
                        'shipping-policy',
                        'return-refund-policy',
                        'refund-policy'
                    ]);
                @endphp

                @if($isPolicyPage)
                    <div class="sde-policy-nav-wrap mb-4">
                        <div class="sde-policy-nav-pills">
                            <a href="{{ route('privacy') }}" class="sde-policy-pill {{ $page->slug === 'privacy-policy' ? 'active' : '' }}">
                                <i class="bi bi-shield-lock me-1"></i> Privacy Policy
                            </a>
                            <a href="{{ route('terms') }}" class="sde-policy-pill {{ in_array($page->slug, ['terms-and-conditions', 'terms-conditions']) ? 'active' : '' }}">
                                <i class="bi bi-file-earmark-text me-1"></i> Terms & Conditions
                            </a>
                            <a href="{{ route('shipping') }}" class="sde-policy-pill {{ $page->slug === 'shipping-policy' ? 'active' : '' }}">
                                <i class="bi bi-truck me-1"></i> Shipping Policy
                            </a>
                            <a href="{{ route('refund') }}" class="sde-policy-pill {{ in_array($page->slug, ['return-refund-policy', 'refund-policy']) ? 'active' : '' }}">
                                <i class="bi bi-arrow-repeat me-1"></i> Return & Refund
                            </a>
                        </div>
                    </div>
                @endif

                {{-- Main White Card Container --}}
                <div class="sde-policy-card">

                    {{-- Card Header --}}
                    <div class="sde-policy-card-header">
                        <span class="sde-policy-badge">
                            <i class="bi bi-shield-check me-1"></i> Legal & Customer Protection
                        </span>
                        <h1 class="sde-policy-title">{{ $page->title }}</h1>
                        <div class="sde-policy-meta">
                            <span><i class="bi bi-building me-1 sde-theme-icon"></i> S D Enterprises</span>
                            <span><i class="bi bi-geo-alt-fill me-1 sde-theme-icon"></i> New Delhi, India</span>
                            <span><i class="bi bi-calendar-check me-1 sde-theme-icon"></i> Updated: {{ $page->updated_at ? $page->updated_at->format('M Y') : 'October 2026' }}</span>
                        </div>
                    </div>

                    {{-- Body Content --}}
                    <div class="sde-policy-body">
                        {!! $page->content !!}
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

@endsection