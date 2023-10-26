<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="">
              <h2 class="brand-text">Cool-Organic</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('admin.home')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> Trang chủ</span></a>
          </li>
          <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Quản lý &amp; xắp sếp</span><i data-feather="more-horizontal"></i>
          </li>

          <li class=" nav-item {{ request()->is('admin/category') ||  request()->is('admin/category/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Danh mục</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/category') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.category')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý danh mục</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/category/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createCategory')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm danh mục </span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/banner') ||  request()->is('admin/banner/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Banner</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/banner') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.Banner')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý banner</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/banner/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('banner.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm banner </span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/products/list') ||  request()->is('admin/product/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Sản phẩm</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/product/list') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.showProductList')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý sản phẩm</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/product/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.getCreateProduct')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm sản phẩm </span></a>
              </li>
            </ul>
          </li>
        
          <li class=" nav-item {{ request()->is('admin/blog') ||  request()->is('admin/blog/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Blog</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/blog') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('blog.list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="License">Danh sách blog</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/blog/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('blog.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="API Key">Thêm blog</span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/trademark') ||  request()->is('admin/trademark/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Thương hiệu</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/trademark') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.Trademark')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý thương hiệu</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/trademark/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('trademark.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm thương hiệu</span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/introduce/update')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Giới thiệu</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/introduce/update') ? 'bg-primary shadow-lg shadow-primary/30 rounded' : '' }}" 
                href="{{route('get.intro')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Chỉnh sửa thông tin</span></a>
              </li>
            </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/order/get') ? 'has-sub open' : '' }}">
            <a class="d-flex align-items-center" href="#"><i
                      data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Đơn
                      hàng</span></a>
              <ul class="menu-content">
                  <li><a class="d-flex align-items-center {{ request()->is('admin/order/get') ? 'bg-primary shadow-lg shadow-primary/30 rounded' : '' }}" 
                    href="{{ route('showListOrder') }}"><i
                              data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh
                              sách</span></a>
                  </li>
              </ul>
          </li>

          <li class=" nav-item {{ request()->is('admin/register_news/get') ? 'has-sub open' : '' }}">
            <a class="d-flex align-items-center" href="#"><i
                      data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">
                        Email nhận tin</span></a>
              <ul class="menu-content">
                  <li><a class="d-flex align-items-center {{ request()->is('admin/register_news/get') ? 'bg-primary shadow-lg shadow-primary/30 rounded' : '' }}" 
                    href="{{ route('showEmail') }}"><i
                              data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                              Danh sách</span></a>
                  </li>
              </ul>
          </li>

          {{-- 
          
          <li class=" nav-item {{ request()->is('admin/order')   ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Đơn hàng</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/order') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('showListOrder')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh sách</span></a>
              </li>
            </ul>
          </li>
          
          <li class=" nav-item {{ request()->is('admin/policy') ||  request()->is('admin/policy/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Chính sách</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/policy') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('policy.list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="License">Danh sách chính sách</span></a>
              </li>
              <li><a class="d-flex align-items-center  {{ request()->is('admin/policy/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('policy.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="API Key">Thêm chính sách</span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item {{ request()->is('admin/instagram') ||  request()->is('admin/instagram/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Hình ảnh instagram</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/instagram') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.instagram')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý hình ảnh</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/instagram/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createinstagram')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm hình ảnh </span></a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class=" nav-item {{ request()->is('admin/introduce') ||  request()->is('admin/introduce/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Giới thiệu</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/introduce') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('Introduce.list')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="License">Danh sách </span></a>
              </li>
              <li><a class="d-flex align-items-center  {{ request()->is('admin/introduce/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('Introduce.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="API Key">Thêm</span></a>
              </li> 
            </ul>
          </li> --}}
          {{-- <li class=" nav-item {{ request()->is('admin/contact')   ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Tư vấn</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/contact') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('showListcontact')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh sách</span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item {{ request()->is('admin/instagram') ||  request()->is('admin/instagram/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Slogan</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/slogan') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.slogan')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý </span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/slogan/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createFrom')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm </span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item {{ request()->is('admin/instagram') ||  request()->is('admin/instagram/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">sale slide</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/slogan') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.sale')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý </span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/slogan/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createSale')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm </span></a>
              </li>
            </ul>
          </li> --}}
          <!--    -->
          <!--    -->
          <li class=" navigation-header"><span data-i18n="Misc">Chỉnh sửa hệ thống </span><i data-feather="more-horizontal"></i>
          </li>
          <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation" target="_blank"><i data-feather="folder"></i><span class="menu-title text-truncate" data-i18n="Documentation">Documentation</span></a>
          </li> -->

          <li class=" nav-item {{ request()->is('admin/editing/update')   ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">Thông tin footer</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/editing/update') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.getEditProfile')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Chỉnh sửa thông tin</span></a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

