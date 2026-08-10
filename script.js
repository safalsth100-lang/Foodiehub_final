function searchFood() {

    let search = document.getElementById("search").value.trim();

    if (search === "") {

        alert("Please enter something to search.");

    } else {

        alert("Searching for: " + search);

    }

}
function loginUser(event) {

    event.preventDefault();

    let email =
        document.getElementById("loginEmail").value;
    let password =
        document.getElementById("loginPassword").value;
    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return;
    }
    alert("Login successful! 🎉");
    window.location.href = "index.html";

}
function registerUser(event) {
    event.preventDefault();
    let name =
        document.getElementById("name").value;
    let email =
        document.getElementById("email").value;
    let username =
        document.getElementById("username").value;
    let password =
        document.getElementById("password").value;
    let confirmPassword =
        document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }
    if (password.length < 6) {
        alert("Password must contain at least 6 characters.");
        return;
    }
    alert(
        "Welcome to FoodieHub, " +
        name +
        "! 🎉"
    );
    window.location.href = "login.html";
}