<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('slider.index')}}">Slider</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" target="_blank" href="{{url('/')}}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.index')}}">Danh mục game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dịch vụ game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('accessories.index')}}">Phụ kiện</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog.index')}}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('video.create')}}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nick game</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>