    <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="pull-left auto-width-left">
                    <ul class="top-menu menu-beta l-inline">
                        <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                        <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                    </ul>
                </div>
                <div class="pull-right auto-width-right">
                    <ul class="top-details menu-beta l-inline">
                        @if(Auth::check())
                            <li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
                        @endif
                        <li><a href="{{ route('signup') }}">Đăng kí</a></li>
                        @if(Auth::check())
                            <li><a href="{{ route('logout') }}">Đăng xuat</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-top -->
        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <div class="space10">&nbsp;</div>
                    <div class="beta-comp">
                        <form role="search" method="get" id="searchform" action="/">
                            <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                        </form>
                    </div>

                    <div class="beta-comp">
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{ $totalQty or 'Trong' }}) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                            @if (Session::has('cart'))
                                @foreach ($product_cart as $productCart)
                                    <div class="cart-item">
                                        <a class="cart-item-edit" href="#"><i class="fa fa-pencil"></i></a>
                                        <a class="cart-item-delete" href="{{ route('del-cart', $productCart['item']['id']) }}"><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="image/product/{{ $productCart['item']['image'] }}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{ $productCart['item']['name'] }}</span>
                                                <span class="cart-item-amount">{{ $productCart['qty'] }}*<span>{{ $productCart['item']['promotion_price'] ? number_format($productCart['item']['promotion_price']) : number_format($productCart['item']['unit_price'])}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">
                                    @if (Session::has('cart'))
                                        {{ Session('cart')->totalPrice }}
                                    @endif
                                    </span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-body -->
        <div class="header-bottom" style="background-color: #0277b8;">
            <div class="container">
                <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="#">Loại sản phẩm</a>
                            <ul class="sub-menu">
                                @foreach ($typeProduct as $tyPro)
                                <li><a href="{{ route('product-type', $tyPro->id) }}">{{ $tyPro->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="about.html">Giới thiệu</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->