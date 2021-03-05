<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form</title>
<link rel="stylesheet/less" type="text/css" href="styles.less"/>
</head>
<body>
    <div class="container">
        <form action="javascript:void(0)" method="post" id="ajax-form"> 
            <div class="form-control">
                <div>Firstname</div>
                <input type="text" name="fname" id="fname">
                <span class="error" id="fname_err">Firstname is required</span>
            </div>
            <br>
            <div class="form-control">
                <div>Lastname</div>
                <input type="text" name="lname" id="lname">
                <span class="error" id="lname_err">lastname is required</span>
            </div>
            <br>
            <div class="form-control">
                <div>Email</div>
                <input type="email" name="email" id="email">
                <span class="error" id="email_err">Email is required</span>
            </div>
            <br>
            <div class="form-control">
                <button type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>
        <div id="success"></div>
    </div>
    

    <script src="//cdn.jsdelivr.net/npm/less@3.13"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
    <script>
        $(document).ready($ => {
            $('.error').hide();
            $('#success').hide();
            let flag=false; 

            $('#ajax-form').submit(function(e){

                $('#submit').attr("disabled", true);

                let fname = $('#fname').val();
                let lname = $('#lname').val();
                let email = $('#email').val();

                if(!valid(fname)) {
                    $('#fname_err').show(); flag=true;
                } else {
                    $('#fname_err').hide();
                }
                if(!valid(lname)) {
                    $('#lname_err').show(); flag=true;
                } else {
                    $('#lname_err').hide();
                }
                if(!valid(email)) {
                    $('#email_err').show(); flag=true;
                } else {
                    $('#email_err').hide();
                }

                if(!flag) {
                    $.ajax({
                        type: "POST",
                        url: "ajaxforsave.php",
                        data: $(this).serialize(), 
                        success: function(){
                            $('#submit').attr("disabled", false);
                            $('#success').addClass('pass');
                            $('#success').text("Success");
                            $('#success').show();
                        }
                    }); 
                } else {
                    $('#submit').attr("disabled", false);
                    $('#success').addClass('fail');
                    $('#success').text("Failed");
                    $('#success').show();
                }

                let time = setTimeout(() => {
                    $('#success').hide();
                    $('#success').removeClass();
                    clearTimeout(time);
                }, 2000);
               
                flag=false;

                e.preventDefault();
            })

        })

        function valid(val) {
            if(val === "") return false;
            else return true;
        }
    </script>
</body>
</html>