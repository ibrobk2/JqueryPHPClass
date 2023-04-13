<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Jquery Class</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Content 1</h1>
        </div>
        <button id="btn-add">Add More Content</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            sessionStorage.clear();
            $("#btn-add").click(function (e) { 
               
                e.preventDefault();
                
                // console.log("Button Clicked!");

                //session storage
                var count = sessionStorage.getItem("count");
                
                if(count==null){
                  
                    count = 1;
                }
                $.ajax({
                    type: "GET",
                    url: "ajax.php",
                    data: {
                        count
                    },
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        //Update count 
                        count = response.count;
                        //Update session count
                        sessionStorage.setItem("count", count);
                        //update Content

                        $('.content').append(response.content);
                    }
                });
            });
        });
    </script>
</body>
</html>