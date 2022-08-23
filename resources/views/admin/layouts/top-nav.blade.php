<nav class="navbar  navbar-light bg-gradiant-green-blue nav-shadow">

    <a class="navbar-brand" href=""></a>
    <span class="">
</a>
        <span class="dropdown">
            <a class="dropdown-toggle text-decoration-none text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button type="submit" class="dropdown-item" >logout</button>
            </form>
            </div>
        </span>
    </span>
</nav>
