 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">{{__('lang.home')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/partner" class="nav-link">{{__('lang.contact')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/order" class="nav-link">{{__('lang.order')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="/warehouse" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Product </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/template_view">Template</a>
                <a class="dropdown-item" href="/product">Product</a>
            </div>
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/invoice" class="nav-link">{{__('lang.invoice')}}</a>
      </li>
      <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="/warehouse" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{__('lang.warehouse')}} </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/warehouse">{{__('lang.warehouse')}}</a>
            <a class="dropdown-item" href="/product_fail">Product Fail</a>
            <a class="dropdown-item" href="/product_stored">Product Store</a>
        </div>
        </div>
        </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/ipep" class="nav-link">{{__('lang.ipep')}}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/template/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/template/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/template/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      @php $locale = session()->get('locale'); @endphp
      <li class="nav-item dropdown">
      	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       	data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        @switch($locale)
            @case('en')
            <img src="/images/flag/en.png" width="25px"> English
            @break
            @case('vi')
            <img src="/images/flag/vi.png" width="20px"> VietNam
            @break
            @default
            <img src="{{asset('images/flag/en.png')}}" width="25px"> English
        @endswitch
        	<span class="caret"></span>
    	</a>
    	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        	<a class="dropdown-item" href="lang/en"><img src="{{asset('images/flag/en.png')}}" width="30px"> English</a>
        	<a class="dropdown-item" href="lang/vi"><img src="{{asset('images/flag/vi.png')}}" width="25px"> VietNam</a>
    	</div>
	</li>
    </ul>
  </nav>
  <div>
  </div>
  <!-- /.navbar -->
