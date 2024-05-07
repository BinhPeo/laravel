<!--sidebar start-->

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{route('admin.home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.danh-muc.index')}}">Danh Mục</a></li>
						<li><a href="{{route('admin.danh-muc.create')}}">Thêm Danh Mục</a></li>
                        
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.san-pham.index')}}"> Sản Phẩm</a></li>
                        <li><a href="{{route('admin.san-pham.create')}}">Thêm Sản Phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa-solid fa-ticket" style="color: #FFD43B;"></i>
                        <span>Voucher</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.voucher.index')}}"> Voucher</a></li>
                        <li><a href="{{route('admin.voucher.create')}}">Thêm voucher</a></li>
                    </ul>
                </li>
                <li>
                    <a href="taikhoan.html">
                        <i class="fa-solid fa-users" style="color: #FFD43B;"></i>
                        <span>Tài khoản </span>
                    </a>
                </li>
               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
