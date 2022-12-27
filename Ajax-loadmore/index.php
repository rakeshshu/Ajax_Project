<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>ajax-load-more</title>
</head>

<body>
    <header>
        <div class="container p-2 bg-primary text-white text-center rounded">
            <h2>AJAX LOAD MORE RECORD FROM DATABASE</h2>
        </div>
    </header>
    <!--main contant start from here-->
    <main>
        <div class="container p-5 bg-white mt-2 rounded">
            <p id="pid">All Records</p>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr id="theading">
                            <th>Id</th>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>DOB</th>
                            <th>Category</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>
    <!--main contant end-->
    <!--footer start from here-->
    <footer>
        <div class="container bg-white mt-3 p-3 rounded">
            <div class="row">
                <div class="col-sm-8">
                    <h4>About Project</h4>
                    <p>This is a dynamic page fetch data from database and if you click load more button.</p>
                    <p>This is pure responsive visible for all devices like Mobile, tablet and laptop.</p>
                </div>
                <div class="col-sm-4">
                    <h4>Contact</h4>
                    <p>Developer - Rakesh Sahu</p>
                    <p>Mobile No. - 7898116303</p>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->
    <!--jQuery code start from here-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadtable(page) {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    data: {
                        page_no: page
                    },
                    success: function(data) {
                        if (data) {
                            $("#pagination").remove();
                            $(".table").append(data);
                        } else {
                            $("#ajaxbtn").html("Finished");
                            $("#ajaxbtn").prop("disabled", true);
                        }


                    }
                })
            }
            loadtable();
            $(document).on("click", "#ajaxbtn", function() {
                $("#ajaxbtn").html("Loding>...");
                var pid = $(this).data("id");
                loadtable(pid);
            })
        });
    </script>
</body>

</html>