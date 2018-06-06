<section class="awe-section-2">
    <section class="organic-all sec-space-bottom">
        <div class="pattern">
            <img alt="Sản phẩm" src="./assets/white-pattern.png">
        </div>
        <div class="container">
            <div class="organic-wrap">
                <img alt="Sản phẩm" class="logo-img" src="/assets/official_logo.png">
                <div class="tabs-box">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <ul class="shelf-list owl-carousel owl-theme" id="shelf-list">
                        @foreach($products as $product)
                            <li class="item simpleCart_shelfItem">
                                <div class="product-box">
                                    <div class="product-media">
                                        <a href="#"
                                           title="{{ $product->trans->name }}">
                                            <img class="prod-img item_thumb" src="{{ $product->cover_image }}"
                                                 alt="{{ $product->trans->name }}">
                                        </a>
                                        <img class="shape" alt="Shap" src="./assets/shap-small-gray.png">
                                        @if($product->sale)
                                            <span class="prod-tag tag-1">-{{$product->sale}}% </span>
                                        @endif
                                    </div>
                                    <div class="product-caption">
                                        <h3 class="product-title">
                                            <a href="https://naturix-blogger.blogspot.com/2017/08/dau-duong-da-phytoceuticals-argan.html"
                                               title="Dầu dưỡng da Phytoceuticals Argan">
                                                <span class="light-font item_name">{{ $product->trans->name }}</span>
                                            </a>
                                        </h3>
                                        <div class="price">
                                            @if($product->trans->price)
                                                @if($product->sale)
                                                    <strong class="clr-txt item_price">{{ sale_price($product->trans->price, $product->sale) }}</strong>
                                                    <del class="light-font">{{ $product->trans->price }}</del>
                                                @else
                                                    <strong class="clr-txt item_price">{{ $product->trans->price }}</strong>
                                                @endif
                                            @else
                                                <strong class="clr-txt item_price">{{ trans('string.contact_us') }}</strong>
                                            @endif
                                        </div>
                                        <div class="prod-icons ababababa">
                                            <div class="variants form-nut-grid">
                                                <a href="tel:+841234567890"
                                                   class="fa fa-phone add_to_cart item_add"
                                                   title="Chọn sản phẩm"
                                                   id="s16"></a>
                                                <a href="#"
                                                   data-handle="muoi-sua-non"
                                                   class="fa fa-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <a class="btn theme-btn-sm-2" href="#" title="Xem thêm">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
