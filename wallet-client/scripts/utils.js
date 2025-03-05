export const passwordVarify = pass => {
    if (pass.length < 3 || pass.length > 20)
        return false
    // Regex to check if the password contains ONLY letters,numbers and underscore
    const regex = /^[a-zA-Z0-9_]+$/;
    if (!regex.test(pass))
        return false;
    return true
}

export const usernameVarify = username => {
    if (username.length < 3 || username.length > 20)
        return false
    // Regex to check if the password contains ONLY letters,numbers and underscore
    const regex = /^[a-zA-Z0-9_]+$/;
    if (!regex.test(username))
        return false;
    return true
}