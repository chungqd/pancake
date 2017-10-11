@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm - {{ $typeProduct->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                    @foreach ($types as $type)
                        <li><a href="{{ route('product-type', $type->id) }}">{{ $type->name }}</a></li>
                    @endforeach
                        
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{ $typeProduct->name }}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ count($productByTypes) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($productByTypes as $productByType)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($productByType->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{ route('detail-product', $productByType->id) }}"><img height="250" src="image/product/{{ $productByType->image }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $productByType->name }}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ $productByType->promotion_price == 0 ? '' : number_format($productByType->unit_price).' VNĐ'}}</span>
                                            <span class="flash-sale">{{ $productByType->promotion_price == 0 ? number_format($productByType->unit_price) :  number_format($productByType->promotion_price) }} VNĐ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('detail-product', $productByType->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {!! $productByTypes->links() !!}
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            {{-- <p class="pull-left">438 styles found</p> --}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($productDifTypes as $productDifType)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($productDifType->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{ route('detail-product', $productDifType->id) }}"><img height="250" src="image/product/{{ $productDifType->image }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $productDifType->name }}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ $productDifType->promotion_price == 0 ? '' : number_format($productDifType->unit_price).' VNĐ'}}</span>
                                            <span class="flash-sale">{{ $productDifType->promotion_price == 0 ? number_format($productDifType->unit_price) :  number_format($productDifType->promotion_price) }} VNĐ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('detail-product', $productDifType->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {!! $productDifTypes->links() !!}
                        </div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection