// Authentication utility functions

// Check if user is authenticated
function checkAuth() {
    try {
        const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
        const userStr = localStorage.getItem('user');
        const user = userStr ? JSON.parse(userStr) : null;

        // Validate user object has required fields
        if (isLoggedIn && user && user.id && user.username && user.email) {
            return { isLoggedIn: true, user };
        }

        // Clear invalid session data
        if (isLoggedIn && !user) {
            localStorage.removeItem('isLoggedIn');
        }

        return { isLoggedIn: false, user: null };
    } catch (error) {
        console.error('Auth check error:', error);
        // Clear corrupted data
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('user');
        return { isLoggedIn: false, user: null };
    }
}

// Logout function - only way to clear session
function logout() {
    try {
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('user');
        window.location.href = 'index.html';
    } catch (error) {
        console.error('Logout error:', error);
        // Force navigation even if localStorage fails
        window.location.href = 'index.html';
    }
}

// Update navigation menu based on auth status
function updateAuthMenu() {
    const { isLoggedIn, user } = checkAuth();
    const authMenu = document.getElementById('auth-menu');

    if (!authMenu) return;

    if (isLoggedIn && user) {
        console.log('User session active:', user.username); // Debug log
        authMenu.className = 'profile-dropdown';
        authMenu.innerHTML = `
      <a href="#" class="profile-link">
        <i class="fas fa-user-circle"></i> ${escapeHtml(user.username)}
        <i class="fas fa-chevron-down"></i>
      </a>
      <div class="dropdown-menu">
        <a href="profile.html"><i class="fas fa-user"></i> My Profile</a>
        <a href="#" onclick="logout(); return false;"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    `;
    } else {
        console.log('No active session'); // Debug log
        authMenu.className = '';
        authMenu.innerHTML = '<a href="signup.html">Log in / Sign up</a>';
    }
}

// Escape HTML to prevent XSS
function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}

// Initialize auth on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', updateAuthMenu);
} else {
    updateAuthMenu();
}

// Make logout function globally accessible
window.logout = logout;
