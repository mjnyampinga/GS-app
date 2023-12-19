const form = document.querySelector("form");
const fullName = document.getElementById("name");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const subject = document.getElementById("subject");
const message = document.getElementById("message");



function sendEmail() {
    const bodyMessage = `Name: ${fullName.value}<br> Email: ${email.value}<br> Phone: ${phone.value}<br> Subject: ${subject.value}<br> Message: ${message.value}`;

    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "goodsamaritan845@gmail.com",
        Password: "DBB520D10EE78E979E95CB528EAD02CFA82F",
        To: 'gsamaritan837@gmail.com',
        From: "goodsamaritan845@gmail.com",
        Subject: subject.value,
        Body: bodyMessage
    }).then(
        message => {
            if (message == "OK") {
                Swal.fire({
                    title: "Thank You!",
                    text: "Sent Successfully",
                    icon: "success"
                });

                window.location.href = "contact.html";
            }
        }
    );
}

function checkInputs() {
    const items = document.querySelectorAll(".item");

    for (const item of items) {
        if (item.value === "") {
            item.classList.add("error");
            item.parentElement.classList.add("error");
        }
        item.addEventListener("keyup", () => {
            if (item.value !== "") {
                item.classList.remove("error");
                item.parentElement.classList.remove("error");
            }
            else {
                item.classList.add("error");
                item.parentElement.classList.add("error");
            }
        });
    }
}

function checkEmail() {
    const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const errorTxtEmail = document.querySelector(".error-txt.email");

    if (!emailRegex.value.match(emailRegex)) {
        errorTxtEmail.style.display = "block";
        email.classList.add("error");
        email.parentElement.classList.add("error");

        if (email.value !== "") {
            errorTxtEmail.innerText = "Please provide a valid email";
        }
        else {
            errorTxtEmail.innerText = "Email cannot be blank";
        }

    }
    else {
        errorTxtEmail.style.display = "none";
        email.classList.remove("error");
        email.parentElement.classList.remove("error");
    }
}

form.addEventListener("submit", (e) => {
    e.preventDefault();
    sendEmail();
});







































































































