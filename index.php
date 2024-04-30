<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Query</title>
    <!-- bootstrp links -->
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-75 shadow mx-auto mt-5 p-5">

        <h3 class=" p-1 mb-2">Add <span class="text-primary"> User</span> Information</h3>
        <hr>

        <!-- form to get data from user -->
        <div class="row ">
            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control  mb-3" id="name" placeholder="Enter here..." />
            </div>

            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">Email</label>
                <input type="text" class="form-control mb-3" id='email' placeholder="Enter here..." />
            </div>

            <div class="col-md-4 mt-3 mx-auto">
                <label class="form-label"></label>
                <input type="submit" id="send" class="btn btn-primary w-100" name="submit" value="Submit" />
            </div>
        </div>

        <!-- Show Data in table -->
        <div class="row my-3">
            <div class="col-md-12">
                <h3 class=" p-1 mb-2">View All <span class="text-primary"> User</span></h3>
                <hr>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Ali</td>
                            <td>Raza</td>
                            <td><a href="" class="btn btn-warning btn-sm">Edit</a>
                                |
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- js links -->
    <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./jquery/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {

            var btn = $("#send");

            // insert data function 
            btn.click(function() {
                var name = $("#name").val();
                var email = $("#email").val();

                // send data on insert qry page
                $.ajax({

            })

        })
    </script>

</body>

</html>