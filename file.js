// JavaScript untuk validasi login
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    // Lakukan validasi email dan password disini
    if (email === 'user@example.com' && password === 'password') {
        alert('Login berhasil!');
    } else {
        document.getElementById('message').innerHTML = 'Email atau password tidak sesuai.';
    }
});
