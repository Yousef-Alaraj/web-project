let f = document.getElementById("contact-form");

f.onsubmit = function (e) {
    e.preventDefault();

    let nameVal = document.getElementById('user-name').value;
    let emailVal = document.getElementById('user-email').value;
    let subVal = document.getElementById('user-sub').value;
    let msgVal = document.getElementById('user-message').value;

    if (nameVal == "") {
        alert("Please enter your name");
        return;
    }

    if (emailVal == "") {
        alert("Please enter your email");
        return;
    }

    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailVal == "") {
        alert("Please enter your email");
        return;
    }
    if (emailPattern.test(emailVal) == false) {
        alert("Please enter a valid email format (e.g., name@example.com)");
        return;
    }

    if (emailVal.indexOf("@") == -1) {
        alert("There must be @ in your email");
        return;
    }

    if (subVal == "") {
        alert("Please enter your subject");
        return;
    }

    if (msgVal == "") {
        alert("Please enter your message");
        return;
    }

    alert("Thank you " + nameVal + ", your message was sent!");
    f.reset();
}