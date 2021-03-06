<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <router-link :to="{ name: 'homepageposts'}">
        <a href="#" class="brand-link">
            <img src="{{ asset('assets/dist/img/Logo.png') }}" alt="HIMTI-UMT Logo" class="brand-image">
        </a>
    </router-link>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


          <router-link :to="{ name: 'homepageposts'}" style="text-decoration: none">
              <li class="nav-item">
                  <a class="nav-link">
                      <p> Home </p>
                  </a>
              </li>
            </router-link>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">#</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>

            </li>

            <router-link :to="{ name: 'homepageposts'}" style="text-decoration: none">
              <li class="nav-item">
                  <a class="nav-link" href="#">
                    <p> About </p>
                  </a>
              </li>
            </router-link>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" disabled>
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</nav>
<!-- /.navbar -->
