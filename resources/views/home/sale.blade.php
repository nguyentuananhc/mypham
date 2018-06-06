<section class="awe-section-5">
    <section class="deals sec-space light-bg">
        <img alt="Giảm giá trong ngày" class="right-bg-img" src="./assets/promotion_image_1.png">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-right">
                    <h4 class="sub-title">Giảm giá trong ngày</h4>
                    <h2 class="section-title">
                        <span class="light-font">mỹ phẩm </span>
                        <span class="light-font">giảm </span>
                        <strong>50% </strong>
                    </h2>
                </div>
                <div class="col-sm-2 text-center no-padding">
                    <img alt="Giảm giá trong ngày" src="./assets/potato.png">
                </div>
                <div class="col-sm-5">
                    <p>Chúng tôi tự tin khẳng đinh rằng sản phẩm từ cửa hàng chúng tôi luôn đảm bảo về chất lượng và
                        giá cả.
                    </p>
                </div>
            </div>

            <div class="row">
                <ul class="deal-slider owl-carousel owl-theme dots-2" style="opacity: 1; display: block;">
                    @foreach($products as $product)
                        <li class="item item-carousel simpleCart_shelfItem">
                            <div class="deal-item">
                                <div class="deal-content">
                                    <div class="text-right">
                                        @if($product->sale)
                                            <span class="prod-tag tag-1">-{{ $product->sale }}% </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="deal-img">
                                                <a href="#"
                                                   title="{{ $product->trans->name }}">
                                                    <img alt="{{ $product->trans->name }}"
                                                         src="{{ $product->cover_image }}"
                                                         class="img-responsive center-block item_thumb">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="deal-text">
                                                <h2 class="fsz-20 pb-5">
                                                    <a class="item_name"
                                                       href="#"
                                                       title="{ $product->trans->name }}">{{ $product->trans->name }}</a>
                                                </h2>
                                                <p>{{ $product->trans->name }}
                                                </p>
                                                <div class="price pt-10">
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
                                                <div class="group-button pt-10">
                                                    <div class="variants form-nut-grid">
                                                        <a href="tel:+841234567890"
                                                           class="fa fa-phone add_to_cart item_add"
                                                           title="Call"
                                                           id="s80"></a>
                                                        <a href="https://naturix-blogger.blogspot.com/2017/08/dau-duong-da-phytoceuticals-argan.html"
                                                           class="fa fa-link" title="Xem nhanh"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
</section>
