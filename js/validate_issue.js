function validate() {
    var cname = document.getElementById("cname").value;
    var composition = document.getElementById("composition").value;
    var rate = document.getElementById("rate").value;
    var qty = document.getElementById("qty").value;
    var dod = document.getElementById("dod").value;
    var sd = document.getElementById("sd").value;
    var ed = document.getElementById("ed").value;
    var desc = document.getElementById("desc").value;
    var regex_no = /^\d+$/;
    $('input[type=text]').css({
        borderColor: "#d9d9d9"
    });
    $('input[type=date]').css({
        borderColor: "#d9d9d9"
    });

    $('span2').css({
        display: "none"
    });
    var count = 0;
    if (!(/^[a-zA-Z ]+$/.test(cname))) {
        document.getElementById('cname').style.borderColor = "red";
        document.getElementById('cname_check').style.display = "block";
        document.getElementById('cname_check').style.color = "red";
        $("#cname_check").html("Component name must not special character or number");
        count++;
    }
    if(composition ==null)
    {
         document.getElementById('composition').style.borderColor = "red";
        document.getElementById('composition_check').style.display = "block";
        document.getElementById('composition_check').style.color = "red";
        $("#composition_check").html("Composition cannot be empty");
        count++;
    }

    console.log(dod);
     if(desc ==null)
    {
         document.getElementById('desc').style.borderColor = "red";
        document.getElementById('desc_check').style.display = "block";
        document.getElementById('desc_check').style.color = "red";
        $("#desc_check").html("Description cannot be empty");
        count++;
    }
     if(desc.length >255)
    {
         document.getElementById('desc').style.borderColor = "red";
        document.getElementById('desc_check').style.display = "block";
        document.getElementById('desc_check').style.color = "red";
        $("#desc_check").html("Description must be less than 255");
        count++;
    }
    if (!(regex_no.test(qty))) {
            document.getElementById('qty').style.borderColor = "red";
            document.getElementById('qty_check').style.display = "block";
            document.getElementById('qty_check').style.color = "red";
            $("#qty_check").html("Quantity must be in numbers");
            count++;
        }
 if (!(/^[1-9]\d*(\.\d+)?$/.test(rate))) {
            document.getElementById('rate').style.borderColor = "red";
            document.getElementById('rate_check').style.display = "block";
            document.getElementById('rate_check').style.color = "red";
            $("#rate_check").html("Rate must be in numbers");
            count++;
        }         
if(sd>ed)
{
    document.getElementById('sd').style.borderColor = "red";
    document.getElementById('sd_check').style.display = "block";
    document.getElementById('sd_check').style.color = "red";
    $("#sd_check").html("Start Date must be before End Date");
    document.getElementById('ed').style.borderColor = "red";
    document.getElementById('ed_check').style.display = "block";
    document.getElementById('ed_check').style.color = "red";
    $("#ed_check").html("End Date must be after Start Date");
            count++;
}
if(dod < sd || dod < ed)
{
    document.getElementById('dod').style.borderColor = "red";
    document.getElementById('dod_check').style.display = "block";
    document.getElementById('dod_check').style.color = "red";
    $("#dod_check").html("Date of Delivery must be after the start and end date");
            count++;
}


    if (count == 0) {
        return true;
        console.log(" true");
    } else {
        return false;
        console.log(" false");
    }
}