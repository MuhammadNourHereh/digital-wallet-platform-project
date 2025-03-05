
const baseUrl = 'http://localhost:3000/'

if (localStorage.getItem('user') != null)
    window.location.href = "dashboard.html"

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData(this)
    axios.post(`${baseUrl}connection/user/v1/api/login.php`,
        form
    )
        .then(response => {

            const user = response.data.user
            const { id, username } = user
            if (user) {
                localStorage.setItem("user", JSON.stringify({ id, username }))
                console.log(id, username)
                window.location.href = "dashboard.html"
            } else {
                console.log('no maessage')
            }
        })
        .catch(error => {
            console.error("Error logging in:", error)
        })
});