<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Learning Laravel</a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ URL::to('/index') }}">Home</a></li>
                <li><a href="{{ URL::to('/about') }}">About</a></li>
                <li><a href="{{ URL::to('/contact') }}">Contact</a></li>
                <?php if(isset($value)){?>
                <li><a href="{{ URL::to('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL::to('/model_insert') }}">Flight</a></li>
                <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
				<?php }else{ ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member 
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('/register') }}">Register</a></li>
                        <li><a href="{{ URL::to('/login') }}">Login</a></li>
                    </ul>
                <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>