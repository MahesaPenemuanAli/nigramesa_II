<header class="admin-header">
    <div style="display: flex; align-items: center; gap: 16px;">
        <button id="sidebarToggle" class="btn btn-soft" style="padding: 8px; min-height: unset; height: 42px; width: 42px;" aria-label="Toggle Sidebar">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
        <div class="admin-header__title">
            <p>Panel Nigramesa</p>
            <h2>@yield('page-title', 'Dashboard')</h2>
        </div>
    </div>

    <div class="admin-header__actions">
        <form class="admin-search">
            <span class="admin-search__icon"></span>
            <input type="search" placeholder="Cari data admin..." />
        </form>
        <div class="admin-profile">
            <div class="admin-profile__text">
                <strong>Admin</strong>
                <span>admin@nigramesa.test</span>
            </div>
            <div class="admin-profile__avatar">A</div>
            
            <div class="admin-profile-dropdown">
                <a href="#" class="admin-profile-dropdown__item">
                    <span class="admin-nav__icon" data-icon="settings" style="background: transparent; color: inherit; width: 20px; height: 20px; margin-right: 8px;"></span>
                    Pengaturan
                </a>
                <a href="#" class="admin-profile-dropdown__item admin-profile-dropdown__item--danger">
                    <span class="admin-nav__icon" data-icon="logout" style="background: transparent; color: inherit; width: 20px; height: 20px; margin-right: 8px;"></span>
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>
