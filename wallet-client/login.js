
const baseUrl = 'http://localhost:3000/'

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData();

    form.append("username", document.getElementById("username-input").value)
    form.append("password", document.getElementById("password-input").value)
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