@extends('layout.masterHome')
@section('konten-first')

<style>
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        cursor: pointer;
        font-size: 1.5rem;
        color: #ddd;
    }

    .star-rating :checked~label,
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #7fad39;
    }
    
</style>

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="#">{{ $category->kategori }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('template') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $product->nama_barang }}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="#">{{ $product->kategori }}</a>
                        <span>{{ $product->nama_barang }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{ file_exists(public_path('gambar_barang/' . $product->gambar_barang))
    ? asset('gambar_barang/' . $product->gambar_barang)
    : asset('template/' . $product->gambar_barang) }}" alt="{{ $product->nama_barang }}">
                    </div>
                    {{-- <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{ asset('template') }}/img/product/details/product-details-2.jpg"
                            src="{{ asset('template') }}/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg"
                            src="{{ asset('template') }}/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg"
                            src="{{ asset('template') }}/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg"
                            src="{{ asset('template') }}/img/product/details/thumb-4.jpg" alt="">
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->nama_barang }}</h3>
                    <div class="product__details__rating">
                        @php
$averageRating = $reviews->avg('star');
$fullStars = floor($averageRating);
$halfStar = $averageRating - $fullStars >= 0.5;
                        @endphp

                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $fullStars)
                                <i class="fa fa-star"></i>
                            @elseif($halfStar && $i == $fullStars + 1)
                                <i class="fa fa-star-half-o"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                            @endif
                        @endfor
                        <span>({{ $reviews->total() }} reviews)</span>
                    </div>
                    <div class="product__details__price">
                        @if($product->discount_price || $product->percent_price)
                            <div class="mb-2">
                                <span class="badge bg-danger text-white rounded-pill px-3">Sale</span>
                            </div>
                            <div class="d-flex align-items-baseline gap-2">
                                <del class="text-muted mr-2">
                                    Rp {{ number_format($product->main_harga_jual, 0, ',', '.') }}
                                </del>
                                <span class="text-danger ms-2 fw-bold fs-4">
                                    Rp {{ number_format($product->final_price, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="mt-2">
                                <small class="text-danger">
                                    <i class="fa fa-clock-o me-1"></i>
                                    Offer ends {{ \Carbon\Carbon::parse($product->end_periode)->format('d M Y') }}
                                </small>
                            </div>
                        @else
                            <span class="fs-4">
                                Rp {{ number_format($product->main_harga_jual, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>



                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                        vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                        quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="stock-info mt-2">
                                <span class="text-secondary">
                                    Stock: {{ $product->main_stok }}
                                </span>
                            </div>
                            <div class="pro-qty">
                                <input type="number" value="1" min="1" max="{{ $product->main_stok }}">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>
                                @if($product->main_stok > 0)
                                    In Stock
                                @else
                                    Out of Stock
                                @endif
                            </span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>({{ $reviews->total() }})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">

                                <!-- Add Review Form -->
                                <div class="mb-4 p-4 bg-light rounded">
                                    <h5 class="mb-3">Write a Review</h5>
                                    {{-- <div class="d-flex">
                                        <label class="form-label">Product:</label>
                                        <span class="text-muted ml-1">{{ $product->nama_barang }}</span>
                                    </div> --}}
                                    <form id="reviewForm" action="{{ route('store-review') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id_barang }}">

                                        <div class="mb-3">
                                            <label class="form-label">Your Name</label>
                                            <input type="text" class="form-control" name="username" placeholder="Enter your name" required></input>
                                        </div>
                                        <div class="text-danger mt-2" id="name-error">
                                            Please enter your name
                                        </div>

                                        {{-- <div class="mb-3"> --}}
                                            <label class="form-label">Rating</label>
                                            <div class="star-rating">
                                                @for($i = 5; $i >= 1; $i--)
                                                    <input type="radio" id="star{{ $i }}" name="star" value="{{ $i }}">
                                                    <label for="star{{ $i }}"><i class="fa fa-star"></i></label>
                                                @endfor
                                            </div>
                                            <div class="text-danger mt-2" id="star-error">
                                                Please give a rating before submitting
                                            </div>
                                            {{--
                                        </div> --}}

                                        <div class="mb-3">
                                            <label class="form-label">Your Review</label>
                                            <textarea class="form-control" name="comment" rows="3" required></textarea>
                                        </div>

                                        <button type="submit" class="site-btn">Submit Review</button>
                                    </form>
                                </div>

                                <!-- Existing Reviews -->
                                <div class="reviews-list" id="reviews-container">
                                    @if($reviews->count() > 0)
                                        @foreach($reviews as $review)
                                            <div class="review-item border-bottom pb-3 mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <strong>{{ $review->created_by }}</strong>
                                                    <div class="stars">
                                                        @for($i = 0; $i < $review->star; $i++)
                                                            <i class="fa fa-star text-warning"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p class="mb-1">{{ $review->comment }}</p>
                                                <small
                                                    class="text-muted">{{ \Carbon\Carbon::parse($review->created_date)->diffForHumans() }}</small>
                                            </div>
                                        @endforeach

                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $reviews->links('pagination::bootstrap-4', ['class' => 'pagination-success']) }}
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <p class="text-muted">No reviews yet. Be the first to review this product!</p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProducts as $related)
                 <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ file_exists(public_path('gambar_barang/' . $related->gambar_barang))
        ? asset('gambar_barang/' . $related->gambar_barang)
        : asset('template/' . $related->gambar_barang) }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a
                                    href="{{ route('details-product', $related->id_barang) }}">{{ $related->nama_barang }}</a>
                            </h6>
                            <h5>Rp {{ number_format($related->main_harga_jual, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Related Product Section End -->

<!-- Login Required Modal -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please login first to submit your review.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#star-error').hide();
        $('#name-error').hide();

         $('#reviewForm').on('submit', function (e) {
            e.preventDefault();

            if ($('input[name="username"]').val() && $('input[name="star"]:checked').val()) {
                this.submit(); // Submit the form directly
            }

            if (!$('input[name="username"]').val()) {
                $('#name-error').show();
            }
            if (!$('input[name="star"]:checked').val()) {
                $('#star-error').show();
            }
        });

        $('input[name="username"]').on('input', function () {
            $('#name-error').hide();
        });
        $('input[name="star"]').on('change', function () {
            $('#star-error').hide();
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetchReviews(page);
        });

        function fetchReviews(page) {
            $.ajax({
                url: window.location.pathname + '?page=' + page,
                success: function (response) {
                    $('#reviews-container').html($(response).find('#reviews-container').html());
                }
            })
        }
    })
</script>


@endsection

