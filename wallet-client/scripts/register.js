const baseUrl = 'http://localhost:3000/'

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const form = new FormData(this)

    if (form.get('password') != form.get('repassword')) {
        console.log("password should match repassword")
        return
    }
    axios.post(`${baseUrl}connection/user/v1/api/register.php`,
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