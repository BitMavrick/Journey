<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <router-link class="sidebar-brand brand-logo" to="/"><img src="assets/images/logo.svg"
                    alt="logo" /></router-link>
            <router-link class="sidebar-brand brand-logo-mini" to="/"><img src="assets/images/logo-mini.svg"
                    alt="logo" /></router-link>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">Mehedi Hasan</h5>
                            <span>Admin</span>
                        </div>
                    </div>

                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>

            <li class="nav-item active">
                <router-link class="nav-link" to="/">
                    <span class="menu-icon">
                        <i class="mdi mdi-weather-sunny"></i>
                    </span>
                    <span class="menu-title">Your Day</span>
                </router-link>
            </li>

            <li class="nav-item menu-items">
                <router-link class="nav-link" to="/notes">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">Your Notes</span>
                </router-link>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Admin Controls</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</template>