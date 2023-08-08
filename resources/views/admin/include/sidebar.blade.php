<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="text-center sidebar-brand-wrapper d-flex align-items-center">
				<a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('admin/images/logo.svg')}}"
						alt="logo" /></a>
				<a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
						src="{{asset('admin/images/logo-mini.svg')}}" alt="logo" /></a>
			</div>
			<ul class="nav">
				<li class="nav-item nav-profile">
					<a href="#" class="nav-link">
						<div class="nav-profile-image">
							<img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile" />
							<span class="login-status online"></span>
							<!--change to offline or busy as needed-->
						</div>
						<div class="nav-profile-text d-flex flex-column pr-3">
							<span class="font-weight-medium mb-2">Henry Klein</span>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{route('auth.login')}}">
						<i class="mdi mdi-home menu-icon"></i>
						<span class="menu-title">Trang chủ</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
						aria-controls="ui-basic">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Nhân viên</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="{{route('user.index')}}" >Danh sách</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/index.html">Thùng rác</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false"
						aria-controls="ui-basic4">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Khách hàng</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic4">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="{{route('customer.index')}}" >Danh sách</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/index.html">Thùng rác</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
						aria-controls="ui-basic1">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Thể Loại</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic1">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="{{route('category.index')}}">Danh sách</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('category.trash')}}">Thùng rác</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
						aria-controls="ui-basic2">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Sản phẩm</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic2">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="{{route('product.index')}}">Danh sách</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('category.trash')}}">Thùng rác</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false"
						aria-controls="ui-basic5">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Đơn hàng</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic5">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="{{route('order.index')}}">Danh sách</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('category.trash')}}">Thùng rác</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pages/icons/mdi.html">
						<i class="mdi mdi-contacts menu-icon"></i>
						<span class="menu-title">Icons</span>
					</a>
				</li>

			</ul>
		</nav>