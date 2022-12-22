function validate() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirmpassword = document.getElementById("confirmpassword").value;
    var phone = document.getElementById("phone").value;
    $('input[type=text]').css({
        borderColor: "#d9d9d9"
    });
    $('input[type=password]').css({
        borderColor: "#d9d9d9"
    });
    $('span2').css({
        display: "none"
    });
    var count = 0;
    var address_regex = /^[a-zA-Z0-9\s,'-]*$/;
    if (!(/^[a-zA-Z ]+$/.test(name))) {
        document.getElementById('name').style.borderColor = "red";
        document.getElementById('name_check').style.display = "block";
        document.getElementById('name_check').style.color = "red";
        $("#name_check").html("Name must not contain numbers");
        count++;
    }

    if (isNaN(phone)) {
        document.getElementById('phone').style.borderColor = "red";
        document.getElementById('phone_check').style.display = "block";
        document.getElementById('phone_check').style.color = "red";
        $("#phone_check").html("Phone must not contain character other than number");
        count++;
    } else {
        if (!(/^\d{10}$/.test(phone))) {
            document.getElementById('phone').style.borderColor = "red";
            document.getElementById('phone_check').style.display = "block";
            document.getElementById('phone_check').style.color = "red";
            $("#phone_check").html("Phone number must be of 10 character");
            count++;
        }
    }

    var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if (!(pattern.test(email))) {
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('email_check').style.display = "block";
        document.getElementById('email_check').style.color = "red";
        $("#email_check").html("Email format error");
        count++;
    }
    var username_regex = /^[a-z0-9]+$/;
    if (!username_regex.test(username) || !(username.length > 4 && username.length <= 15)) {
        document.getElementById('username').style.borderColor = "red";
        document.getElementById('uname_check').style.display = "block";
        document.getElementById('uname_check').style.color = "red";
        $("#uname_check").html("Username must not contain space, capital letter and must be in between 5 to 15 character");
        count++;
    }
    if (!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/.test(password))) {
        document.getElementById('password').style.borderColor = "red";
        document.getElementById('password_check').style.display = "block";
        document.getElementById('password_check').style.color = "red";
        $("#password_check").html("Password must be of atleast 8 character and must contain a special character, a capital letter, a number");
        count++;
    }
    else{
    if (password != confirmpassword) {
        document.getElementById('confirmpassword').style.borderColor = "red";
        document.getElementById('password').style.borderColor = "red";
        document.getElementById('password_check').style.display = "block";
        document.getElementById('password_check').style.color = "red";
        $("#password_check").html("Password and Confirm Password did not matched");
        count++;
    }
}
    var flag = "";
    if (document.getElementById('manuCheck').checked) {
        flag = "0";
    } else {
        flag = "1";
    }

    if (flag == "0") {
        var cname = document.getElementById("cname").value;
        var cemail = document.getElementById("cemail").value;
        var caddress = document.getElementById("caddress").value;
        var gstno = document.getElementById("gstno").value;
        var cphone = document.getElementById("cphone").value;

        if (!(/^[a-zA-Z ]+$/.test(cname))) {
            document.getElementById('cname').style.borderColor = "red";
            document.getElementById('cname_check').style.display = "block";
            document.getElementById('cname_check').style.color = "red";
            $("#cname_check").html("Company Name must not contain number");
            count++;
        }

        if (isNaN(cphone)) {
            document.getElementById('cphone').style.borderColor = "red";
            document.getElementById('cphone_check').style.display = "block";
            document.getElementById('cphone_check').style.color = "red";
            $("#cphone_check").html("Phone number must only be number");
            count++;
        } else {
            if (!(/^\d{10}$/.test(cphone))) {
                document.getElementById('cphone').style.borderColor = "red";
                document.getElementById('cphone_check').style.display = "block";
                document.getElementById('cphone_check').style.color = "red";
                $("#cphone_check").html("Phone number must be of 10 character");
                count++;
            }
        }

        if (!pattern.test(cemail)) {
            document.getElementById('cemail').style.borderColor = "red";
            document.getElementById('cemail_check').style.display = "block";
            document.getElementById('cemail_check').style.color = "red";
            $("#cemail_check").html("Email format error");
            count++;
        }

        if (!address_regex.test(caddress)) {
            document.getElementById('caddress').style.borderColor = "red";
            document.getElementById('caddress_check').style.display = "block";
            document.getElementById('caddress_check').style.color = "red";
            $("#caddress_check").html("Address format error");
            count++;
        }
        var gst_regex = /^([0][1-9]|[1-2][0-9]|[3][0-5])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$/;
        if (!gst_regex.test(gstno)) {
            document.getElementById('gstno').style.borderColor = "red";
            document.getElementById('gstno_check').style.display = "block";
            document.getElementById('gstno_check').style.color = "red";
            $("#gstno_check").html("GST number format error");
            count++;
            console.log(count);
        }

    } else {
        var hname = document.getElementById("hname").value;
        var hemail = document.getElementById("hemail").value;
        var haddress = document.getElementById("haddress").value;
        var uid = document.getElementById("uid").value;
        var hphone = document.getElementById("hphone").value;

        if (!(/^[a-zA-Z ]+$/.test(hname))) {
            document.getElementById('hname').style.borderColor = "red";
            document.getElementById('hname_check').style.display = "block";
            document.getElementById('hname_check').style.color = "red";
            $("#hname_check").html("Hospital Name must not contain number");
            count++;
        }

        if (isNaN(hphone)) {
            document.getElementById('hphone').style.borderColor = "red";
            document.getElementById('hphone_check').style.display = "block";
            document.getElementById('hphone_check').style.color = "red";
            $("#hphone_check").html("Phone number must only be number");
            count++;
        } else {
            if (!(/^\d{10}$/.test(hphone))) {
                document.getElementById('hphone').style.borderColor = "red";
                document.getElementById('hphone_check').style.display = "block";
                document.getElementById('hphone_check').style.color = "red";
                $("#hphone_check").html("Phone number must only be of 10 character");
                count++;
            }

        }

        if (!pattern.test(hemail)) {
            document.getElementById('hemail').style.borderColor = "red";
            document.getElementById('hemail_check').style.display = "block";
            document.getElementById('hemail_check').style.color = "red";
            $("#hemail_check").html("Email format error");
            count++;
        }

        if (!address_regex.test(haddress)) {
            document.getElementById('haddress').style.borderColor = "red";
            document.getElementById('haddress_check').style.display = "block";
            document.getElementById('haddress_check').style.color = "red";
            $("#haddress_check").html("Address format error");
            count++;
        }
        var uid_regex = /^[a-zA-Z0-9]+$/;
        if (!uid_regex.test(uid)) {
            document.getElementById('uid').style.borderColor = "red";
            document.getElementById('uid_check').style.display = "block";
            document.getElementById('uid_check').style.color = "red";
            $("#uid_check").html("Unique Id must not contain special character");
            count++;

            console.log(count);
        }

    }

    if (count == 0) {
        return true;
        console.log(" true");
    } else {
        return false;
        console.log(" false");
    }
}