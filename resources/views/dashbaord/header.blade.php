<header>
    <div class=" header-left">
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="logo-header" id="logoHeader">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>

        </div>
        <div class="date-display">
            <i class="fas fa-calendar-alt"></i>
            <span id="current-date">Lundi 15 Janvier 2024</span>
            <i class="fas fa-clock" style="margin-left: 0.5rem;"></i>
            <span id="current-time">10:30</span>
        </div>
    </div>
    <div class="header-right">
        <div class="notification-bell pulse" id="notificationBell">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </div>
        <div class="user-profile" id="userProfile">
            <div class="user-avatar">AB</div>
            <div class="user-info">
                <h4>Pr. Ahmed Ben Salah</h4>
                <p>Département Informatique</p>
            </div>
            <i class="fas fa-chevron-down" style="color: var(--text-gray); font-size: 0.8rem;"></i>

            <!-- DROPDOWN MENU -->
            <div class="user-dropdown" id="userDropdown">
                <div class="dropdown-header">
                    <div class="dropdown-avatar">AB</div>
                    <div>
                        <p class="dropdown-name">Pr. Ahmed Ben Salah</p>
                        <p class="dropdown-email">ahmed.bensalah@iit.tn</p>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Mon Profil</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
    // User dropdown toggle
    (function () {
        const userProfile = document.getElementById('userProfile');
        const userDropdown = document.getElementById('userDropdown');

        if (userProfile && userDropdown) {
            // Toggle dropdown on profile click
            userProfile.addEventListener('click', function (e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
                console.log('Dropdown toggled:', userDropdown.classList.contains('show'));
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!userProfile.contains(e.target)) {
                    userDropdown.classList.remove('show');
                }
            });

            // Prevent dropdown from closing when clicking inside it
            userDropdown.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        } else {
            console.error('User profile or dropdown not found');
        }
    })();
</script>