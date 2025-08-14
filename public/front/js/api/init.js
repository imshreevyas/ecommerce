document.addEventListener('DOMContentLoaded', initAuthState);
function initAuthState() {
  const isLoggedIn = localStorage.getItem('auth_token') !== null;
  
  if (!isLoggedIn) {
    // if not logged in
    if (window.location.pathname !== '/ecom/') {
        //check if user is not on homepage
        window.location.href = './';
    } 
  }
}