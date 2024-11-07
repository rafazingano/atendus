<header class="theme-main-menu sticky-menu theme-menu-three">
    <div class="inner-content">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo order-lg-0">
                <a href="#" class="d-block">
                    <img src="{{ asset('images/logo/logo_02.png') }}" alt="" width="129">
                </a>
            </div>

            <div class="right-widget d-flex align-items-center ms-auto ms-lg-0 order-lg-3">
                <a href="{{ url('admin/register') }}" class="req-demo-btn tran3s d-none d-lg-block">Inscreva-se</a>
            </div>

            <nav class="navbar navbar-expand-lg order-lg-2">
                <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="d-block d-lg-none">
                            <div class="logo">
                                <a href="#">
                                    <img src="{{ asset('images/logo/logo_02.png') }}" alt="" width="130">
                                </a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="#" role="button">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#" role="button">Como funciona?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">Contato</a>
                        </li>
                    </ul>
                    <div class="mobile-content d-block d-lg-none">
                        <div class="d-flex flex-column align-items-center justify-content-center mt-70">
                            <a href="{{ url('admin/register') }}" class="req-demo-btn tran3s">Inscreva-se</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
