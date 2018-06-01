@extends('layout.master')
@section('content')
    <section class="breadcrumb-bg">
        <div class="theme-container container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="site-breadcumb white-clr">
                        <ul class="breadcrumb breadcrumb-menubar">
                            <li class="home">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li>
                                <strong>
                                    <span itemprop="title">san-pham</span>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="label_wb ptb-50">
        <div class="container">
            <div class="row">
                <section class="pt-15 right-content col-md-9 col-md-push-3">
                    <div class="blog-heading">
                        <h1 class="title-2">Tin-tuc</h1>
                    </div>
                    <div class="divider-full-1"></div>
                    <style type="text/css">
                        #page-rc-tooltip {
                            margin-top: 20px;
                            text-align: center;
                            clear: both
                        }

                        #page-rc-tooltip .currentpage,
                        #page-rc-tooltip .pagelink {
                            border-radius: 5em;
                            color: #666666;
                            display: inline-block;
                            font-size: 16px;
                            font-weight: 500;
                            height: 30px;
                            line-height: 30px;
                            margin: auto 3px;
                            width: 30px;
                            text-align: center;
                        }

                        #page-rc-tooltip .currentpage,
                        #page-rc-tooltip .pagelink:hover {
                            background-color: #92d2a7;
                            color: #fff;
                        }
                    </style>
                    <div class="clear"></div>
                    <div class="row ptb-15">
                        <div class="col-sm-6">
                            <a href="#" class="">
                                <picture>
                                    <img src="./assets/2-1488871414878.jpg" alt="Các nàng muốn tóc đẹp hơn hãy thử 3 công thức dưỡng tóc từ hoa tuyệt hay này nhé!"
                                         class="img-responsive center-block">
                                </picture>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="blog-caption">
                                <h4 class="sub-title-1"> Ngày đăng: 16/08/2017 </h4>
                                <h2 class="title-2">
                                    <a href="#">Các nàng muốn tóc đẹp hơn hãy thử 3 công thức dưỡng tóc từ hoa tuyệt hay này nhé!</a>
                                </h2>
                                <span class="divider-1 crl-bg"></span>
                                <div class="ptb-10">
                                    <p> Đúng vậy, hoa không chỉ để ngắm, để ngửi mà còn có thể dùng để dưỡng tóc cực kỳ hiệu
                                        quả nữa đấy.Hẳn các cô nàng mê DIY đều đã thuộc nằm lòng hàng chục công thức
                                        dưỡng...
                                    </p>
                                </div>
                                <a href="#" class="clr-txt">
                                    <strong> Chi tiết
                                        <i class="fa fa-long-arrow-right"></i>
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row ptb-15">
                        <div class="col-sm-6">
                            <a href="#" class="">
                                <picture>
                                    <img src="./assets/8b-1486456380027.jpg" alt="Chán tóc xoăn nhẹ nhàng, con gái Hàn rủ nhau làm tóc xoăn xù mì hoài cổ giống Sulli"
                                         class="img-responsive center-block">
                                </picture>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="blog-caption">
                                <h4 class="sub-title-1"> Ngày đăng: 16/08/2017 </h4>
                                <h2 class="title-2">
                                    <a href="#">Chán tóc xoăn nhẹ nhàng, con gái Hàn rủ nhau làm tóc xoăn xù mì hoài cổ giống Sulli</a>
                                </h2>
                                <span class="divider-1 crl-bg"></span>
                                <div class="ptb-10">
                                    <p> Kiểu tóc xoăn xù mì lỗi thời ngày nào nay lại trở thành xu hướng hot tại Hàn nhờ
                                        sự lăng xê mạnh mẽ của cô nàng Sulli. Trong thời gian vừa qua, hẳn cô nàng yêu
                                        làm...
                                    </p>
                                </div>
                                <a href="#" class="clr-txt">
                                    <strong> Chi tiết
                                        <i class="fa fa-long-arrow-right"></i>
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>

                </section>
                <aside class="pt-15 left left-content col-md-3 col-md-pull-9">
                    <!-- Danh mục sản phẩm -->
                    <div class="widget-wrap">
                        <h2 class="widget-title">
                            <span class="light-font">Danh mục</span>
                            <strong>tin</strong>
                        </h2>
                        <div class="divider-full-1"></div>
                        <ul class="cate-widget">
                            <li>
                                <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                <a href="#">Trang chủ</a>
                            </li>
                            <li>
                                <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                <a href="#">Cửa hàng</a>
                                <ul class="cate-widget">
                                    <li>
                                        <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                        <a href="#">Trang điểm mặt</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                        <a href="#">Trang điểm mắt</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                        <a href="#">Dược mỹ phẩm</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                        <a href="#">Chăm sóc tóc</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                        <a href="#">Chăm sóc da mặt</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                <a href="#">Làm đẹp</a>
                            </li>
                            <li>
                                <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                <a href="#">Giới thiệu</a>
                            </li>
                            <li>
                                <i class="fa fa-arrow-circle-o-right clr-txt"></i>
                                <a href="#">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <!--/End danh mục sản phẩm -->
                    <!-- Sản phẩm bán chạy-->
                    <div class="widget-wrap widget-best-sell">
                        <h2 class="widget-title">
                            <span class="light-font">Sản phẩm</span>
                            <strong>Bán chạy</strong>
                        </h2>
                        <div class="divider-full-1"></div>
                        <div class="widget-post pt-15">
                            <script language="JavaScript"> //<![CDATA[
                              document.write("<script src=\"/feeds/posts/default/-/san-pham?max-results=" + 5 + "&orderby=published&alt=json-in-script&callback=labelproduct03\"><\/script>");      //]]>
                            </script>
                            <script src="./assets/san-pham"></script>
                            <div class="random-prod">
                                <div class="random-img">
                                    <picture>
                                        <img src="./assets/12.jpg" alt="Dầu dưỡng da Phytoceuticals Argan">
                                    </picture>
                                </div>
                                <div class="random-text">
                                    <h3 class="title-1 no-margin">
                                        <a href="#" title="Dầu dưỡng da Phytoceuticals Argan">Dầu dưỡng da Phytoc</a>
                                    </h3>
                                    <span class="divider"></span>
                                    <div class="price">
                                        <strong class="clr-txt">169,000đ </strong>
                                        <del class="light-font">196,000đ</del>
                                    </div>
                                </div>
                            </div>
                            <div class="random-prod">
                                <div class="random-img">
                                    <picture>
                                        <img src="./assets/3.jpg" alt="Đông trùng hạ thảo Aloha">
                                    </picture>
                                </div>
                                <div class="random-text">
                                    <h3 class="title-1 no-margin">
                                        <a href="#" title="Đông trùng hạ thảo Aloha">Đông trùng hạ thảo </a>
                                    </h3>
                                    <span class="divider"></span>
                                    <div class="price">
                                        <strong class="clr-txt">180,000đ </strong>
                                        <del class="light-font">245,000đ</del>
                                    </div>
                                </div>
                            </div>
                            <div class="random-prod">
                                <div class="random-img">
                                    <picture>
                                        <img src="./assets/1.jpg" alt="Kem trắng da Murad White Brilliance">
                                    </picture>
                                </div>
                                <div class="random-text">
                                    <h3 class="title-1 no-margin">
                                        <a href="#" title="Kem trắng da Murad White Brilliance">Kem trắng da Murad </a>
                                    </h3>
                                    <span class="divider"></span>
                                    <div class="price">
                                        <strong class="clr-txt">180,000đ </strong>
                                        <del class="light-font">245,000đ</del>
                                    </div>
                                </div>
                            </div>
                            <div class="random-prod">
                                <div class="random-img">
                                    <picture>
                                        <img src="./assets/anh01.png" alt="Kém tẩy tế bào chết">
                                    </picture>
                                </div>
                                <div class="random-text">
                                    <h3 class="title-1 no-margin">
                                        <a href="#" title="Kém tẩy tế bào chết">Kém tẩy tế bào chết</a>
                                    </h3>
                                    <span class="divider"></span>
                                    <div class="price">
                                        <strong class="clr-txt">350,000đ </strong>
                                        <del class="light-font">550,000đ</del>
                                    </div>
                                </div>
                            </div>
                            <div class="random-prod">
                                <div class="random-img">
                                    <picture>
                                        <img src="./assets/anh07.png" alt="Tinh dầu oải hương">
                                    </picture>
                                </div>
                                <div class="random-text">
                                    <h3 class="title-1 no-margin">
                                        <a href="#" title="Tinh dầu oải hương">Tinh dầu oải hương</a>
                                    </h3>
                                    <span class="divider"></span>
                                    <div class="price">
                                        <strong class="clr-txt">350,000đ </strong>
                                        <del class="light-font">550,000đ</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sản phẩm bán chạy-->
                </aside>
            </div>
        </div>
    </section>
    <section class="product account-page ptb-50 main_azatemplate" itemtype="http://schema.org/Product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 details-product">
                    <div class="main section" id="main" name="Hotline : 0967849934">
                        <div class="widget Blog" data-version="1" id="Blog1">
                            <div class="blog-posts hfeed">
                                <div id="Theme-breadcrumbs">
                                    <div class="breadcrumbs">
                                            <span>
                                                <a href="#" itemprop="url">
                                                    <span itemprop="title">
                                                        <i class="fa fa-home"></i> Trang Chủ</span>
                                                </a>
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        <span>Tin-tuc</span>
                                    </div>
                                </div>
                                <!--Can't find substitution for tag [defaultAdStart]-->

                                <div class="date-outer">


                                    <div class="date-posts">

                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 simpleCart_shelfItem block_item span3 simpleCart_shelfItem">
                                            <div class="post">
                                                <meta content="#"
                                                      itemprop="image_url">
                                                <meta content="7034643990526394101" itemprop="blogId">
                                                <meta content="4229641214936647661" itemprop="postId">
                                                <a name="4229641214936647661"></a>
                                                <div id="summary4229641214936647661"></div>
                                                <div class="Clear"></div>
                                                <script type="text/javascript">
                                                  homepage("summary4229641214936647661", "Các nàng muốn tóc đẹp hơn hãy thử 3 công thức dưỡng tóc từ hoa tuyệt hay này nhé!", "#");
                                                </script>
                                                <section class="upsell-pro">
                                                    <div class="container">
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 simpleCart_shelfItem block_item span3 simpleCart_shelfItem">
                                            <div class="post">
                                                <meta content="#"
                                                      itemprop="image_url">
                                                <meta content="7034643990526394101" itemprop="blogId">
                                                <meta content="7701018216209567486" itemprop="postId">
                                                <a name="7701018216209567486"></a>
                                                <div id="summary7701018216209567486"></div>
                                                <div class="Clear"></div>
                                                <script type="text/javascript">
                                                  homepage("summary7701018216209567486", "Chán tóc xoăn nhẹ nhàng, con gái Hàn rủ nhau làm tóc xoăn xù mì hoài cổ giống Sulli", "#");
                                                </script>
                                                <section class="upsell-pro">
                                                    <div class="container">
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--Can't find substitution for tag [adEnd]-->
                            </div>
                            <div class="blog-pager" id="blog-pager">
                            </div>
                            <div class="clear"></div>
                            <script type="text/javascript">window.___gcfg = { 'lang': 'vi' };</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection