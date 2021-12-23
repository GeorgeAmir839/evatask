<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                    <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ trans('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{trans('Dashboard')}}</span>
                    </a>
                </li>x

                <!-- POS Addon-->
                @if (\App\Models\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Models\Addon::where('unique_identifier', 'pos_system')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-tasks aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('POS System')}}</span>
                            @if (env("DEMO_MODE") == "On")
                            <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{route('poin-of-sales.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create'])}}">
                                    <span class="aiz-side-nav-text">{{trans('POS Manager')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('poin-of-sales.activation')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('POS Configuration')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                @endif

                <!-- Product -->
                @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('Products')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{route('products.create')}}">
                                    <span class="aiz-side-nav-text">{{trans('Add New product')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('All Products') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('products.admin')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit']) }}" >
                                    <span class="aiz-side-nav-text">{{ trans('In House Products') }}</span>
                                </a>
                            </li>
                            @if(get_setting('vendor_system_activation') == 1)
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('products.seller')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                        <span class="aiz-side-nav-text">{{ trans('Seller Products') }}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="aiz-side-nav-item">
                                <a href="{{route('digitalproducts.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ trans('Digital Products') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('product_bulk_upload.index') }}" class="aiz-side-nav-link" >
                                    <span class="aiz-side-nav-text">{{ trans('Bulk Import') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('product_bulk_export.index')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Bulk Export')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Categories')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('brands.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}" >
                                    <span class="aiz-side-nav-text">{{trans('Brands')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('tags.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['tags.index', 'tags.create', 'tags.edit'])}}" >
                                    <span class="aiz-side-nav-text">{{trans('Tags')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('units.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['units.index', 'units.create', 'units.edit'])}}" >
                                    <span class="aiz-side-nav-text">{{trans('Units')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('attributes.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Attribute')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('reviews.index')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Product Reviews')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Sale -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{trans('Sales')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('all_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show'])}}">
                                    <span class="aiz-side-nav-text">{{trans('All Orders')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('inhouse_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['inhouse_orders.index', 'inhouse_orders.show'])}}" >
                                    <span class="aiz-side-nav-text">{{trans('Inhouse orders')}}</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                          <li class="aiz-side-nav-item">
                            <a href="{{ route('seller_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_orders.index', 'seller_orders.show'])}}">
                                <span class="aiz-side-nav-text">{{trans('Sellers Orders')}}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('pick_up_point.order_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Pick-up Point Orders')}}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- Deliver Boy Addon-->
                @if (\App\Models\Addon::where('unique_identifier', 'delivery_boy')->first() != null && \App\Models\Addon::where('unique_identifier', 'delivery_boy')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-truck aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('Delivery Boy')}}</span>
                            @if (env("DEMO_MODE") == "On")
                            <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{route('delivery-boys.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                                    <span class="aiz-side-nav-text">{{trans('All Delivery Boy')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('delivery-boys.create')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Add Delivery Boy')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('delivery-boy.cancel-request')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boy.cancel-request'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Cancel Request')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('delivery-boy-configuration')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Configuration')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                @endif

                <!-- Refund addon -->
                @if (\App\Models\Addon::where('unique_identifier', 'refund_request')->first() != null && \App\Models\Addon::where('unique_identifier', 'refund_request')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                          <a href="#" class="aiz-side-nav-link">
                              <i class="las la-backward aiz-side-nav-icon"></i>
                              <span class="aiz-side-nav-text">{{ trans('Refunds') }}</span>
                              @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                              <span class="aiz-side-nav-arrow"></span>
                          </a>
                          <ul class="aiz-side-nav-list level-2">
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('refund_requests_all')}}" class="aiz-side-nav-link {{ areActiveRoutes(['refund_requests_all', 'reason_show'])}}">
                                      <span class="aiz-side-nav-text">{{trans('Refund Requests')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('paid_refund')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Approved Refunds')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('rejected_refund')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('rejected Refunds')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('refund_time_config')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Refund Configuration')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                    @endif
                @endif


                <!-- Customers -->
                @if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ trans('Customers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Customer list') }}</span>
                                </a>
                            </li>
                            @if(get_setting('classified_product') == 1)
                            <li class="aiz-side-nav-item">
                                <a href="{{route('classified_products')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Classified Products')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('customer_packages.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['customer_packages.index', 'customer_packages.create', 'customer_packages.edit'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('Classified Packages') }}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Sellers -->
                @if((Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) && get_setting('vendor_system_activation') == 1)
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ trans('Sellers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                @php
                                    $sellers = \App\Models\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                                @endphp
                                <a href="{{ route('sellers.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal','sellers.show_verification_request'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('All Seller') }}</span>
                                    @if($sellers > 0)<span class="badge badge-info">{{ $sellers }}</span> @endif
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('sellers.payment_histories') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Payouts') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Payout Requests') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Payout Requests') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                            <a href="{{ route('sellers.create') }}" class="aiz-side-nav-link">
                                <span>{{trans('Add New Seller')}}</span>
                            </a>
                            </li>
                            {{-- <li class="aiz-side-nav-item">
                                <a href="{{ route('business_settings.vendor_commission') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Seller Commission') }}</span>
                                </a>
                            </li> --}}

                            @if (\App\Models\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Models\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller_packages.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_packages.index', 'seller_packages.create', 'seller_packages.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ trans('Seller Packages') }}</span>
                                      @if (env("DEMO_MODE") == "On")
                                        <span class="badge badge-inline badge-danger">Addon</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            {{-- <li class="aiz-side-nav-item">
                                <a href="{{ route('seller_verification_form.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Seller Verification Form') }}</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif

                {{-- start @gorge --}}
                @if(Auth::user()->user_type == 'admin' && get_setting('vendor_system_activation') == 1)
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ trans('Shops') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            @php
                                $shops = \App\Models\Shop::count();
                            @endphp
                            <a href="{{ route('shops.all') }}" class="aiz-side-nav-link {{ areActiveRoutes(['shops.index', 'shops.edit'])}}">
                                <span class="aiz-side-nav-text">{{ trans('All Shops') }}</span>
                                {{-- @if($shops > 0)<span class="badge badge-info">{{ $shops }}</span> @endif --}}
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                {{-- end @gorge --}}
              {{-- store --}}

                @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ trans('Uploaded Files') }}</span>
                    </a>
                </li>
                @endif
                <!-- Reports -->
                @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ trans('Reports') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('in_house_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('In House Product Sale') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('seller_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('Seller Products Sale') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('stock_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('Products Stock') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wish_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wish_report.index'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('Products wishlist') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('user_search_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('User Searches') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Commission History') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wallet-history.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Wallet Recharge History') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
                <!--Blog System-->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-bullhorn aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ trans('Blog System') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('blog.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                                <span class="aiz-side-nav-text">{{ trans('All Posts') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('blog-category.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                                <span class="aiz-side-nav-text">{{ trans('Categories') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- marketing -->
                @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ trans('Marketing') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('flash_deals.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ trans('Flash deals') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('newsletters.index')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ trans('Newsletters') }}</span>
                                    </a>
                                </li>
                                @if (\App\Models\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Models\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                    <li class="aiz-side-nav-item">
                                        <a href="{{route('sms.index')}}" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">{{ trans('Bulk SMS') }}</span>
                                            @if (env("DEMO_MODE") == "On")
                                            <span class="badge badge-inline badge-danger">Addon</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ trans('Subscribers') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('coupon.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                                    <span class="aiz-side-nav-text">{{ trans('Coupon') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Support -->
                @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                  <li class="aiz-side-nav-item">
                      <a href="#" class="aiz-side-nav-link">
                          <i class="las la-link aiz-side-nav-icon"></i>
                          <span class="aiz-side-nav-text">{{trans('Support')}}</span>
                          <span class="aiz-side-nav-arrow"></span>
                      </a>
                      <ul class="aiz-side-nav-list level-2">
                          @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                              @php
                                  $support_ticket = DB::table('tickets')
                                              ->where('viewed', 0)
                                              ->select('id')
                                              ->count();
                              @endphp
                              <li class="aiz-side-nav-item">
                                  <a href="{{ route('support_ticket.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])}}">
                                      <span class="aiz-side-nav-text">{{trans('Ticket')}}</span>
                                      @if($support_ticket > 0)<span class="badge badge-info">{{ $support_ticket }}</span>@endif
                                  </a>
                              </li>
                          @endif

                          @php
                              $conversation = \App\Models\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                          @endphp
                          @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                              <li class="aiz-side-nav-item">
                                  <a href="{{ route('conversations.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])}}">
                                      <span class="aiz-side-nav-text">{{trans('Product Queries')}}</span>
                                      @if (count($conversation) > 0)
                                          <span class="badge badge-info">{{ count($conversation) }}</span>
                                      @endif
                                  </a>
                              </li>
                          @endif
                      </ul>
                  </li>
                @endif

                <!-- Affiliate Addon -->
                @if (\App\Models\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Models\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                          <a href="#" class="aiz-side-nav-link">
                              <i class="las la-link aiz-side-nav-icon"></i>
                              <span class="aiz-side-nav-text">{{trans('Affiliate System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                              <span class="aiz-side-nav-arrow"></span>
                          </a>
                          <ul class="aiz-side-nav-list level-2">
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('affiliate.configs')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Affiliate Registration Form')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('affiliate.index')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Affiliate Configurations')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('affiliate.users')}}" class="aiz-side-nav-link {{ areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])}}">
                                      <span class="aiz-side-nav-text">{{trans('Affiliate Users')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('refferals.users')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Referral Users')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('affiliate.withdraw_requests')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Affiliate Withdraw Requests')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{route('affiliate.logs.admin')}}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Affiliate Logs')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                    @endif
                @endif

                <!-- Offline Payment Addon-->
                @if (\App\Models\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Models\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                          <a href="#" class="aiz-side-nav-link">
                              <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                              <span class="aiz-side-nav-text">{{trans('Offline Payment System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                              <span class="aiz-side-nav-arrow"></span>
                          </a>
                          <ul class="aiz-side-nav-list level-2">
                              <li class="aiz-side-nav-item">
                                  <a href="{{ route('manual_payment_methods.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])}}">
                                      <span class="aiz-side-nav-text">{{trans('Manual Payment Methods')}}</span>
                                  </a>
                              </li>
                              <li class="aiz-side-nav-item">
                                  <a href="{{ route('offline_wallet_recharge_request.index') }}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Offline Wallet Recharge')}}</span>
                                  </a>
                              </li>
                              @if(get_setting('classified_product') == 1)
                                  <li class="aiz-side-nav-item">
                                      <a href="{{ route('offline_customer_package_payment_request.index') }}" class="aiz-side-nav-link">
                                          <span class="aiz-side-nav-text">{{trans('Offline Customer Package Payments')}}</span>
                                      </a>
                                  </li>
                              @endif
                              @if (\App\Models\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Models\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                                  <li class="aiz-side-nav-item">
                                      <a href="{{ route('offline_seller_package_payment_request.index') }}" class="aiz-side-nav-link">
                                          <span class="aiz-side-nav-text">{{trans('Offline Seller Package Payments')}}</span>
                                            @if (env("DEMO_MODE") == "On")
                                            <span class="badge badge-inline badge-danger">Addon</span>
                                            @endif
                                      </a>
                                  </li>
                              @endif
                          </ul>
                      </li>
                    @endif
                @endif

                <!-- Paytm Addon -->
                @if (\App\Models\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Models\Addon::where('unique_identifier', 'paytm')->first()->activated)
                    @if(Auth::user()->user_type == 'admin' || in_array('17', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                          <a href="#" class="aiz-side-nav-link">
                              <i class="las la-mobile-alt aiz-side-nav-icon"></i>
                              <span class="aiz-side-nav-text">{{trans('Paytm Payment Gateway')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                              <span class="aiz-side-nav-arrow"></span>
                          </a>
                          <ul class="aiz-side-nav-list level-2">
                              <li class="aiz-side-nav-item">
                                  <a href="{{ route('paytm.index') }}" class="aiz-side-nav-link">
                                      <span class="aiz-side-nav-text">{{trans('Set Paytm Credentials')}}</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                    @endif
                @endif

                <!-- Club Point Addon-->
                @if (\App\Models\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Models\Addon::where('unique_identifier', 'club_point')->first()->activated)
                  @if(Auth::user()->user_type == 'admin' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="lab la-btc aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('Club Point System')}}</span>
                            @if (env("DEMO_MODE") == "On")
                            <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('club_points.configs') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Club Point Configurations')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('set_product_points')}}" class="aiz-side-nav-link {{ areActiveRoutes(['set_product_points', 'product_club_point.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Set Product Point')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('club_points.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['club_points.index', 'club_point.details'])}}">
                                    <span class="aiz-side-nav-text">{{trans('User Points')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                  @endif
                @endif

                <!--OTP addon -->
                @if (\App\Models\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Models\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                  @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-phone aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('OTP System')}}</span>
                            @if (env("DEMO_MODE") == "On")
                            <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('otp.configconfiguration') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('OTP Configurations')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('otp_credentials.index')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Set OTP Credentials')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                  @endif
                @endif

                @if(\App\Models\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Models\Addon::where('unique_identifier', 'african_pg')->first()->activated)
                  @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
                      <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-phone aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('African Payment Gateway Addon')}}</span>
                            @if (env("DEMO_MODE") == "On")
                            <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('african.configuration') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('African PG Configurations')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('african_credentials.index')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{trans('Set African PG Credentials')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                  @endif
                @endif

                <!-- Website Setup -->
                @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                  <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{trans('Website Setup')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Header')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.footer') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Footer')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                <span class="aiz-side-nav-text">{{trans('Pages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Appearance')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Setup & Configurations -->
                @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
                  <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{trans('Setup & Configurations')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('general_setting.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('General Settings')}}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{route('activation.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Features activation')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('languages.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit'])}}">
                                <span class="aiz-side-nav-text">{{trans('Languages')}}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{route('currency.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Currencies')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('tax.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['tax.index', 'tax.create', 'tax.store', 'tax.show', 'tax.edit'])}}">
                                <span class="aiz-side-nav-text">{{trans('Vat & TAX')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('pick_up_points.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_points.index','pick_up_points.create','pick_up_points.edit'])}}">
                                <span class="aiz-side-nav-text">{{trans('Pickup point')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('SMTP Settings')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('payment_method.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Payment Methods')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('file_system.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('File System Configuration')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('social_login.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Social media Logins')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('google_analytics.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Analytics Tools')}}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Facebook')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('facebook_chat.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{trans('Facebook Chat')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('facebook-comment') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{trans('Facebook Comment')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('google_recaptcha.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Google reCAPTCHA')}}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="javascript:void(0);" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Shipping')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                {{-- start @Ali Zain --}}
                                <li class="aiz-side-nav-item">
                                    @php
                                        $shipping_methods = \App\Models\ShippingMethod::count();
                                    @endphp
                                    <a href="{{ route('shipping.all') }}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping.index', 'shipping.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ trans('All Shipping Methods') }}</span>
                                    </a>
                                </li>
                                {{-- end @Ali Zain --}}

                                <li class="aiz-side-nav-item">
                                    <a href="{{route('shipping_configuration.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                        <span class="aiz-side-nav-text">{{trans('Shipping Configuration')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('countries.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['countries.index','countries.edit','countries.update'])}}">
                                        <span class="aiz-side-nav-text">{{trans('Shipping Countries')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('cities.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['cities.index','cities.edit','cities.update'])}}">
                                        <span class="aiz-side-nav-text">{{trans('Shipping Cities')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('firebase.edit') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Firebase Configuration')}}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif


                <!-- Staffs -->
                @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('Users and Roles')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('All staffs')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Staff permissions')}}</span>
                                </a>
                            </li>
                            <hr style="width: 100px;">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('users.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['users.index', 'users.create', 'users.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Users')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('user-roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['user-roles.index', 'user-roles.create', 'user-roles.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Roles')}}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{route('permissions.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['permissions.index', 'permissions.create', 'permissions.edit'])}}">
                                    <span class="aiz-side-nav-text">{{trans('Permissions')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Log viwer --}}
                @if(Auth::user()->user_type == 'admin')
                <li class="aiz-side-nav-item">
                    <a href="{{ url('log-viewer') }}" class="aiz-side-nav-link">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ trans('Log Viewer') }}</span>
                    </a>
                </li>
                @endif
                {{-- @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-tie aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{trans('System')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('system_update') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Update')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('system_server')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{trans('Server status')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif --}}

                <!-- Addon Manager -->
                {{-- @if(Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{route('addons.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['addons.index', 'addons.create'])}}">
                            <i class="las la-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{trans('Addon Manager')}}</span>
                        </a>
                    </li>
                @endif --}}
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
