// Authentication utility functions

function checkAuth() {
  const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
  const user = JSON.parse(localStorage.getItem('user') || 'null');
  return { isLoggedIn, user };
}

function logout() {
  localStorage.removeItem('isLoggedIn');
  localStorage.removeItem('user');
  window.location.href = 'index.html';
}

// Update navigation menu based on auth status
function updateAuthMenu() {
  const { isLoggedIn, user } = checkAuth();
  const authMenu = document.getElementById('auth-menu');
  
  if (!authMenu) return;
  
  if (isLoggedIn && user) {
    authMenu.innerHTML = `
      <li class="profile-dropdown">
        <a href="#" class="profile-link">
          <i class="fas fa-user-circle"></i> ${escapeHtml(user.username)}
          <i class="fas fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu">
          <a href="profile.html"><i class="fas fa-user"></i> My Profile</a>
          <a href="#" onclick="logout(); return false;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    `;
  } else {
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
