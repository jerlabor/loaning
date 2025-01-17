<nav id="sidebar">
    <div class="sidebar-header">
        <h3>{{ config('app.name', 'Laravel') }}</h3>
        <strong>BS</strong>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-users"></i>
                Borrowers
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Add Borrower</a>
                </li>
                <li>
                    <a href="#">View Borrower</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-briefcase"></i>
                About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-image"></i>
                Portfolio
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-question"></i>
                FAQ
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-paper-plane"></i>
                Contact
            </a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article text-center"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
        </li>
        <li>
            Copyright © 2019 Madayaw
        </li>
    </ul>
</nav>
