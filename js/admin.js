function adminlogin(){
								
    let username = $("#logusername").val();
    let password = $("#logpass").val();
    
    $.get(
        "http://localhost/Unipihotel/api/users/adminlogin.php",
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
    // alert("name: "+username+" Pass: "+password);
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