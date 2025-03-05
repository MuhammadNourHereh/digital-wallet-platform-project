
const baseUrl = 'http://localhost:3000/'

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData(this)
x
    axios.post(`${baseUrl}connection/user/v1/api/login.php`,
        form
    )
        .then(response => {
            const data = response.data
            if (data.message) {
                console.log(data.message)
                //window.location.href = "dashboard.html"
            } else {
                console.log('no maessage')
            }
        })
        .catch(error => {
            console.error("Error logging in:", error)
        })
});