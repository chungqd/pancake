@extends('master')
@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
                    <div class="fullwidthbanner">
                        <div class="bannercontainer" >
                        <div class="banner" >
                                <ul>
                                    <!-- THE FIRST SLIDE -->
                                    @foreach ($slide as $element)
                                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{ $element->image }}" data-src="image/slide/{{ $element->image }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{ $element->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                                    </div>
                                                </div>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="tp-bannertimer"></div>
                    </div>
                </div>
                <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($newProducts) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                            @foreach ($newProducts as $newProduct)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                    @if ($newProduct->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                        <div class="single-item-header">
                                            <a href="{{ route('detail-product', $newProduct->id) }}"><img width="250" height="180" src="image/product/{{ $newProduct->image }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $newProduct->name }}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{ $newProduct->promotion_price == 0 ? '' : number_format($newProduct->unit_price).' VNĐ'}}</span>
                                                <span class="flash-sale">{{ $newProduct->promotion_price == 0 ? number_format($newProduct->unit_price) :  number_format($newProduct->promotion_price) }} VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('detail-product', $newProduct->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="row">
                                {!! $newProducts->links() !!}
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($productSale) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($productSale as $prs)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if ($prs->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif

                                        <div class="single-item-header">
                                            <a href="{{ route('detail-product', $prs->id) }}"><img height="250" src="image/product/{{ $prs->image }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $prs->name }}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{ $prs->promotion_price == 0 ? '' : number_format($prs->unit_price).' VNĐ'}}</span>
                                                <span class="flash-sale">{{ $prs->promotion_price == 0 ? number_format($prs->unit_price) :  number_format($prs->promotion_price) }} VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('detail-product', $prs->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {!! $productSale->links() !!}
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection