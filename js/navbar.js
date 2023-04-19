function matchPassword() {
    var alert = document.getElementById("alert").innerHTML = "";
    var pw1 = document.getElementById("registerInputPassword").value;
    var pw2 = document.getElementById("registerInputPasswordcheck").value;


    if (pw1 != pw2) {
        var alert = document.getElementById("alert").innerHTML = "Οι κωδικοί δεν ταιρίαζουν.";
        var btn = document.getElementById("registerbtn").disabled = true;
    } else {
        var btn = document.getElementById("registerbtn").disabled = false;
    }
}


function signup() {
    let firstname = $("#registerInputName").val();
    let lastname = $("#registerInputSname").val();
    let country = $("#country-select").val();
    let city = $("#state-select").val();
    let address = $("#registerInputAddress").val();
    let email = $("#registerInputEmail").val();
    let username = $("#registerInputUsername").val();
    let phone = $("#registerInputTel").val();
    let password = $("#registerInputPassword").val();

    $.post(
        "http://localhost/Unipihotel/api/users/signup.php",
        {
            firstname: firstname,
            lastname: lastname,
            country: country,
            city: city,
            address: address,
            email: email,
            username: username,
            phone: phone,
            password: password,
            role: 0
        },
        function (response) {
            console.log(response);
            alert("Επιτυχής εγγραφή!");
        }
    );
}

function login() {

    let username = $("#logusername").val();
    let password = $("#logpass").val();

    $.get(
        "http://localhost/Unipihotel/api/users/login.php",
        {
            username: username,
            password: password
        },
        function (response) {
            console.log(response);
            alert(response);
            location.reload();
        }
    );

}

