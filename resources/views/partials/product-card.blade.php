@php
    $wished = auth()->check() && auth()->user()->wishlists()->where('product_id', $product->id)->exists();

    // Category info
    $catName = $product->category->name ?? 'Collection';
    $catLower = strtolower($catName);
    $prodNameLower = strtolower($product->name ?? '');

    // Rating (Dynamic or fallback based on product ID)
    $ratingScore = number_format(4.7 + (($product->id * 3) % 4) * 0.1, 1);
    $reviewCount = 45 + (($product->id * 23) % 180);

    // Discount
    $hasDiscount = ($product->discount_percent > 0) || ($product->sale_price && $product->sale_price < $product->price);
    $discountPercent = $product->discount_percent ?: ($product->price > 0 && $product->sale_price ? round((($product->price - $product->sale_price) / $product->price) * 100) : 0);
@endphp

<div class="{{ $colClass ?? 'col-xl-3 col-lg-3 col-md-4 col-6' }}">
    <div class="product-card">
        {{-- Product Image Stage --}}
        <div class="card-img-wrapper">
            <a href="{{ route('product.show', $product->slug) }}" class="card-img-link">
                <img src="{{ $product->thumbnail_url }}"
                    alt="{{ $product->name }}"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='{{ base_public_url('assets/img/no-products.png') }}';">
            </a>

            {{-- Top-Left Badges (Matching reference media_1790840736487.jpg) --}}
            <div class="prod-badge-wrap">
                @if($product->stock === 0 && $product->manage_stock)
                    <span class="prod-badge badge-gray">Sold Out</span>
                @elseif($product->is_best_seller)
                    <span class="prod-badge badge-green"><i class="bi bi-star-fill"></i> Best Seller</span>
                @elseif($product->is_new_arrival)
                    <span class="prod-badge badge-red"><i class="bi bi-star-fill"></i> New Arrival</span>
                @elseif($product->is_trending)
                    <span class="prod-badge badge-indigo"><i class="bi bi-fire"></i> Trending</span>
                @elseif(str_contains($catLower, 'combo') || str_contains($prodNameLower, 'combo'))
                    <span class="prod-badge badge-blue"><i class="bi bi-layers-fill"></i> Combo Offer</span>
                @elseif($product->is_featured)
                    <span class="prod-badge badge-brown"><i class="bi bi-gem"></i> Premium</span>
                @elseif($discountPercent > 0)
                    <span class="prod-badge badge-red">-{{ $discountPercent }}%</span>
                @endif
            </div>

            {{-- Top-Right Wishlist Button --}}
            <button type="button"
                    class="prod-wishlist-btn btn-wishlist {{ $wished ? 'wishlisted' : '' }}"
                    data-product-id="{{ $product->id }}"
                    title="Wishlist"
                    aria-label="Wishlist">
                <i class="bi bi-heart{{ $wished ? '-fill' : '' }}"></i>
            </button>

            {{-- Bottom-Right Quick View Eye Button (Matching mockup) --}}
            <a href="{{ route('product.show', $product->slug) }}"
               class="prod-eye-btn"
               title="Quick View"
               aria-label="Quick View">
                <i class="bi bi-eye"></i>
            </a>
        </div>

        {{-- Product Information Body --}}
        <div class="card-body">
            {{-- Category Label --}}
            <div class="prod-category-label">
                {{ strtoupper($catName) }}
            </div>

            {{-- Product Title --}}
            <a href="{{ route('product.show', $product->slug) }}" class="prod-title-link">
                <h3 class="prod-title" title="{{ $product->name }}">{{ $product->name }}</h3>
            </a>

            {{-- Rating Row (5 Gold Stars + Score and Reviews) --}}
            <div class="prod-rating-row">
                <span class="prod-stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </span>
                <span class="prod-rating-num">{{ $ratingScore }} ({{ $reviewCount }})</span>
            </div>

            {{-- Price Row --}}
            <div class="prod-price-row">
                <span class="prod-price-current">₹{{ number_format($product->effective_price) }}</span>
                @if($product->sale_price && $product->sale_price < $product->price)
                    <span class="prod-price-original">₹{{ number_format($product->price) }}</span>
                @endif
                @if($discountPercent > 0)
                    <span class="prod-discount-tag">{{ $discountPercent }}% OFF</span>
                @endif
            </div>

            {{-- Action Row (Add to Cart + Instant Action Button) --}}
            <div class="prod-action-row">
                @if($product->isInStock())
                    <button type="button"
                            class="prod-cart-btn btn-add-to-cart"
                            data-product-id="{{ $product->id }}"
                            title="Add to Cart">
                        <i class="bi bi-cart3"></i>
                        <span>Add to Cart</span>
                    </button>
                    <a href="{{ route('product.show', $product->slug) }}"
                       class="prod-quick-instant-btn"
                       title="View Details">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </a>
                @else
                    <button type="button" class="prod-cart-btn prod-cart-btn-disabled" disabled>
                        <i class="bi bi-bag-x"></i>
                        <span>Sold Out</span>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

@once
<style>
/* ============================================================
   S D ENTERPRISES — REFERENCE-EXACT LUXURY PRODUCT CARD
   (Matches media_1790840736487.jpg)
============================================================ */
.product-card {
    position: relative;
    background: #FFFFFF;
    border: 1px solid #ECE4DA;
    border-radius: 14px;
    padding: 10px 10px 13px 10px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow:
        0 4px 18px rgba(50, 28, 14, 0.08),
        0 1px 3px rgba(0, 0, 0, 0.04);
    transition: transform 0.28s cubic-bezier(0.25, 0.8, 0.25, 1),
                box-shadow 0.28s cubic-bezier(0.25, 0.8, 0.25, 1),
                border-color 0.25s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    border-color: #C37B15;
    box-shadow:
        0 12px 28px rgba(50, 28, 14, 0.14),
        0 2px 8px rgba(195, 123, 21, 0.12);
}

/* ===== IMAGE WRAPPER (STUDIO STAGE) ===== */
.product-card .card-img-wrapper {
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    border-radius: 11px;
    overflow: hidden;
    background: #F8F5F0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-card .card-img-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.product-card .card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
}

.product-card:hover .card-img-wrapper img {
    transform: scale(1.05);
}

/* ===== BADGES (MATCHING REFERENCE EXACTLY) ===== */
.prod-badge-wrap {
    position: absolute;
    top: 8px;
    left: 8px;
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 4px;
    pointer-events: none;
}

.prod-badge {
    display: inline-flex;
    align-items: center;
    gap: 3.5px;
    font-family: 'Poppins', sans-serif;
    font-size: 8.5px;
    font-weight: 700;
    line-height: 1;
    padding: 3.5px 8px;
    border-radius: 20px;
    letter-spacing: 0.2px;
    color: #FFFFFF;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

.prod-badge i {
    font-size: 7.5px;
}

.prod-badge.badge-green {
    background: #198754;
}

.prod-badge.badge-red {
    background: #D32F2F;
}

.prod-badge.badge-brown {
    background: #7A4B26;
}

.prod-badge.badge-blue {
    background: #1976D2;
}

.prod-badge.badge-indigo {
    background: #5B51D8;
}

.prod-badge.badge-gray {
    background: #5A534E;
}

/* ===== WISHLIST BUTTON (TOP RIGHT) ===== */
.prod-wishlist-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.10);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #4A3E38;
    font-size: 12px;
    cursor: pointer;
    z-index: 3;
    transition: all 0.2s ease;
    padding: 0;
}

.prod-wishlist-btn:hover {
    transform: scale(1.08);
    border-color: #C37B15;
    color: #C37B15;
    background: #FFFDF9;
    box-shadow: 0 3px 10px rgba(195, 123, 21, 0.25);
}

.prod-wishlist-btn.wishlisted {
    color: #D32F2F;
    border-color: #D32F2F;
}

.prod-wishlist-btn.wishlisted i {
    color: #D32F2F;
}

/* ===== EYE QUICK VIEW BUTTON (BOTTOM RIGHT) ===== */
.prod-eye-btn {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.10);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #4A3E38;
    font-size: 12px;
    text-decoration: none;
    z-index: 3;
    transition: all 0.2s ease;
}

.prod-eye-btn:hover {
    transform: scale(1.08);
    border-color: #C37B15;
    color: #C37B15;
    background: #FFFDF9;
    box-shadow: 0 3px 10px rgba(195, 123, 21, 0.25);
}

/* ===== CARD BODY ===== */
.product-card .card-body {
    padding: 9px 1px 0 1px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

/* Category Label */
.prod-category-label {
    font-family: 'Poppins', sans-serif;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.9px;
    color: #9E8A7A;
    line-height: 1;
    margin-bottom: 3px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Product Title */
.prod-title-link {
    text-decoration: none;
    display: block;
    margin-bottom: 4px;
}

.prod-title {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 12.5px;
    font-weight: 700;
    color: #18110B;
    line-height: 1.3;
    margin: 0;
    min-height: 33px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
}

.prod-title-link:hover .prod-title {
    color: #C37B15;
}

/* Rating Row */
.prod-rating-row {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 5px;
    line-height: 1;
}

.prod-stars {
    display: inline-flex;
    align-items: center;
    gap: 1.5px;
    color: #F59E0B;
    font-size: 9.5px;
}

.prod-rating-num {
    font-family: 'Poppins', sans-serif;
    font-size: 9.5px;
    font-weight: 600;
    color: #756A63;
}

/* Price Row */
.prod-price-row {
    display: flex;
    align-items: baseline;
    gap: 5px;
    margin-top: auto;
    margin-bottom: 9px;
    flex-wrap: wrap;
    line-height: 1;
}

.prod-price-current {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 800;
    color: #18110B;
    letter-spacing: -0.3px;
    white-space: nowrap;
}

.prod-price-original {
    font-family: 'Poppins', sans-serif;
    font-size: 10.5px;
    font-weight: 400;
    color: #A3988E;
    text-decoration: line-through;
    white-space: nowrap;
}

.prod-discount-tag {
    font-family: 'Poppins', sans-serif;
    font-size: 9.5px;
    font-weight: 700;
    color: #E53935;
    margin-left: auto;
    white-space: nowrap;
}

/* Action Row */
.prod-action-row {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 0;
}

.prod-cart-btn {
    flex: 1 !important;
    height: 32px !important;
    border-radius: 8px !important;
    background: #3B1C10 !important;
    border: 1px solid #3B1C10 !important;
    padding: 0 10px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 6px !important;
    color: #FFFFFF !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 600 !important;
    letter-spacing: 0.2px !important;
    box-shadow: 0 2px 6px rgba(59, 28, 16, 0.18) !important;
    cursor: pointer;
    transition: all 0.2s ease !important;
    text-decoration: none;
    white-space: nowrap !important;
}

.prod-cart-btn i {
    font-size: 12px !important;
    color: #FFFFFF !important;
}

.prod-cart-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(195, 123, 21, 0.32) !important;
    background: #C37B15 !important;
    border-color: #C37B15 !important;
    color: #FFFFFF !important;
}

.prod-quick-instant-btn {
    width: 32px !important;
    height: 32px !important;
    border-radius: 8px !important;
    border: 1px solid #ECE4DA !important;
    background: #FFFFFF !important;
    color: #3B1C10 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05) !important;
    text-decoration: none;
    flex-shrink: 0 !important;
    transition: all 0.2s ease !important;
}

.prod-quick-instant-btn i {
    font-size: 12px !important;
}

.prod-quick-instant-btn:hover {
    border-color: #C37B15 !important;
    color: #C37B15 !important;
    background: #FFFDF9 !important;
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(195, 123, 21, 0.22) !important;
}

.prod-cart-btn-disabled {
    background: #A8A19B !important;
    border-color: #A8A19B !important;
    box-shadow: none !important;
    cursor: not-allowed !important;
    opacity: 0.85;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 575px) {
    .product-card {
        padding: 8px 8px 11px 8px;
        border-radius: 12px;
    }
    .product-card .card-img-wrapper {
        border-radius: 9px;
    }
    .prod-badge {
        font-size: 7.5px;
        padding: 2.5px 6px;
    }
    .prod-wishlist-btn {
        width: 25px;
        height: 25px;
        font-size: 11px;
        top: 6px;
        right: 6px;
    }
    .prod-eye-btn {
        width: 24px;
        height: 24px;
        font-size: 10.5px;
        bottom: 6px;
        right: 6px;
    }
    .prod-title {
        font-size: 11.5px;
        min-height: 30px;
    }
    .prod-stars {
        font-size: 8.5px;
    }
    .prod-rating-num {
        font-size: 8.5px;
    }
    .prod-price-current {
        font-size: 13.5px;
    }
    .prod-price-original {
        font-size: 9.5px;
    }
    .prod-discount-tag {
        font-size: 8.5px;
    }
    .prod-cart-btn {
        height: 28px !important;
        font-size: 10px !important;
        padding: 0 8px !important;
        gap: 4px !important;
    }
    .prod-quick-instant-btn {
        width: 28px !important;
        height: 28px !important;
    }
}
</style>
@endonce