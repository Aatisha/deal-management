function validate() {
    var mrp = document.getElementById("mrp").value;
    var bidrate = document.getElementById("bidrate").value;
    var bidqty = document.getElementById("bidqty").value;
    var biddod = document.getElementById("biddod").value;
    var biddesc= document.getElementById("biddesc").value;
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
 
     if(biddesc ==null)
    {
         document.getElementById('biddesc').style.borderColor = "red";
        document.getElementById('biddesc_check').style.display = "block";
        document.getElementById('biddesc_check').style.color = "red";
        $("#biddesc_check").html("Description cannot be empty");
        count++;
    }
     if(biddesc.length >255)
    {
         document.getElementById('biddesc').style.borderColor = "red";
        document.getElementById('biddesc_check').style.display = "block";
        document.getElementById('biddesc_check').style.color = "red";
        $("#biddesc_check").html("Description must be less than 255");
        count++;
    }
    var regex_no = /^\d+$/;
    if (!(regex_no.test(bidqty))) {
            document.getElementById('bidqty').style.borderColor = "red";
            document.getElementById('bidqty_check').style.display = "block";
            document.getElementById('bidqty_check').style.color = "red";
            $("#bidqty_check").html("Quantity must be in numbers");
            count++;
        }
 if (!(/^[1-9]\d*(\.\d+)?$/.test(bidrate))) {
            document.getElementById('bidrate').style.borderColor = "red";
            document.getElementById('bidrate_check').style.display = "block";
            document.getElementById('bidrate_check').style.color = "red";
            $("#bidrate_check").html("Rate must be in numbers");
            count++;
        } 
 if (!(/^[1-9]\d*(\.\d+)?$/.test(mrp))) {
            document.getElementById('mrp').style.borderColor = "red";
            document.getElementById('mrp_check').style.display = "block";
            document.getElementById('mrp_check').style.color = "red";
            $("#mrp_check").html("MRP must be in numbers");
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