<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('admin/assets/images/logo@2x.png') }}" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

                            
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>
                                
        <ul id="main-menu" class="main-menu">
            <li class="{{ Request::segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i class="entypo-monitor"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'gejala' ? 'active' : '' }}">
                <a href="{{ route('symptom.index') }}">
                    <i class="entypo-monitor"></i>
                    <span class="title">Gejala</span>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <i class="entypo-megaphone"></i>
                    <span class="title">Gangguan</span>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <i class="entypo-list"></i>
                    <span class="title">History Konsultasi</span>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <i class="entypo-newspaper"></i>
                    <span class="title">Artikel</span>
                </a>
            </li>
        </ul>
    </div>
</div>