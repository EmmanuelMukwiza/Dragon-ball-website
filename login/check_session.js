
document.getElementById("userIcon").addEventListener("click", function(event) {
    event.preventDefault();
    
    fetch('login/check_session.php')
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'loggedin') {
            alert("You are already logged in!");
        } else {
            window.location.href = '../login/login.html';
        }
    })
    .catch(error => console.error('Error checking session:', error));
});
