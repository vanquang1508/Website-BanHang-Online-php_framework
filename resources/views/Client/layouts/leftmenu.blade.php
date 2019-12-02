<header>
    <div class="logo">
        <a href="{{url("home")}}" class="selected" ><h3>Shop <i class="fas fa-meteor fa-2x"></i></h3></a>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="{{url("home")}}" class="selected"  data-toggle="tooltip" data-placement="right" title="Trang chủ">Trang chủ</a></li>
            <li>
                    <a class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Thể loại
                    </a>
                    <div class="dropdown-menu">
                        @foreach($dataCategory as $key => $data)
                            <a href="category/{{$data->id}}" class="ml-2"><i class="fas fa-caret-right"></i> {!! $data->name !!}</a>
                            <br/>
                        @endforeach
                    </div>
            </li>
            <li>
                <a class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nhà sản xuất
                </a>
                <div class="dropdown-menu mr-4">
                    @foreach($dataBrand as $key => $data)
                        <a href="brand/{{$data->id}}" class="ml-2"><i class="fas fa-caret-right"></i> {!! $data->name !!}</a>
                        <br/>
                    @endforeach
                </div>
            </li>
            <li><a href={{url("cart/show")}}><i class="fa fa-shopping-cart"></i>({{Cart::count()}})</a></li>
            @if(Auth::user())
                <li>
                    <a class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->email}} <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <div class="dropdown-menu mr-4">
                        <a href={{route('customerInfo.show',Auth::user()->id)}} class="ml-2"><i class="fas fa-caret-right"></i> Thông tin tài khoản</a></br>
                        <a href={{url("dang-xuat")}} class="ml-2"><i class="fas fa-caret-right"></i> Đăng xuất</a>
                    </div>

                </li>
            @else
                <li><a href={{url("dang-nhap")}}>Đăng nhập <i class="fas fa-sign-in-alt"></i></a></li>
                <li><a href={{url("user/create")}}>Đăng Ký <i class="fas fa-user-plus"></i></a></li>
            @endif


        </ul>
    </nav><!-- end navigation menu -->
    <div class="footer ">
        <div class="rights">
            <p>Copyright © 2019</p>
        </div><!-- end rights -->
    </div ><!-- end footer -->
</header><!-- end header -->
