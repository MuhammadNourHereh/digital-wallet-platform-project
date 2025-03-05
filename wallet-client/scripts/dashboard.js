const user = localStorage.getItem('user')
if (user === null)
    window.location.href = "login.html"

// setup username
const { username } = JSON.parse(user)
const nameSpan = document.getElementById("name")
nameSpan.innerText = username

// set logout button
const logoutButton = document.getElementById("logout")
logoutButton.addEventListener('click', () => {
    console.log('hello')
    localStorage.removeItem('user');
    window.location.href = "index.html"
})
