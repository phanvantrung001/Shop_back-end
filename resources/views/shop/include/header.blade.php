<style>
    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h4 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .user-info span {
        color: #007bff;
        margin-left: 5px;
    }

    .logout-btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
    }
</style>
<!-- Topbar Start -->


<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">Sign in</button>
                        <button class="dropdown-item" type="button">Sign up</button>
                    </div>
                </div>
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">EUR</button>
                        <button class="dropdown-item" type="button">GBP</button>
                        <button class="dropdown-item" type="button">CAD</button>
                    </div>
                </div>
                <div class="col-lg-4 text-right">

                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">FR</button>
                        <button class="dropdown-item" type="button">AR</button>
                        <button class="dropdown-item" type="button">RU</button>

                    </div>
                </div>
            </div>

            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">lipstick</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 text-right">
                @if (isset(Auth()->guard('customers')->user()->name))
                <div class="user-info">
                    <div class="col-9 ml-5">
                        <h4 class="m-0"><span>Xin Chào: {{ Auth()->guard('customers')->user()->name }}</span></h4>
                    </div>
                    <div class="col-3">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="logout-btn">Đăng Xuất</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('shop.login') }}" title="Login" class="login-btn bg-primary">
                    <h6>Đăng nhập</h6>
                </a>
                @endif
            </div>
        </div>
            
    </div>
</div>
</div>
</div>
<style>
    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h4 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .user-info span {
        color: #007bff;
        margin-left: 5px;
    }

    .logout-btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
    }
</style>


<!-- Topbar End -->

<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">

        <div class="col-lg-3 d-none d-lg-block">


            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Men's Dresses</a>
                            <a href="" class="dropdown-item">Women's Dresses</a>
                            <a href="" class="dropdown-item">Baby's Dresses</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">Shirts</a>
                    <a href="" class="nav-item nav-link">Jeans</a>
                    <a href="" class="nav-item nav-link">Swimwear</a>
                    <a href="" class="nav-item nav-link">Sleepwear</a>
                    <a href="" class="nav-item nav-link">Sportswear</a>
                    <a href="" class="nav-item nav-link">Jumpsuits</a>
                    <a href="" class="nav-item nav-link">Blazers</a>
                    <a href="" class="nav-item nav-link">Jackets</a>
                    <a href="" class="nav-item nav-link">Shoes</a>
                </div>
            </nav>
        </div>

        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="{{route('home.index')}}" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="{{ route('cart.index') }}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary" aria-hidden="true"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle cart-quantity"
                                style="padding-bottom: 2px;">
                                {{ count((array) session('cart')) }}
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>