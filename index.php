<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax</title>
       <!-- bootstrap links -->
       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .loader {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container w-75 shadow mx-auto mt-5 p-5">

        <h3 class=" p-1 mb-2">Add <span class="text-primary"> User</span> Information</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <!-- alert for success -->
                <div class="alert alert-success alert-dismissible fade show msg" id="success" role="alert" style="display: none;">

                </div>
                <!-- alert for error -->
                <div class="alert alert-danger alert-dismissible fade show msg" id="error" role="alert" style="display: none;">
                </div>
            </div>
        </div>

        <!-- form to get data from user -->
        <div class="row ">
            <div class="col-md-4 px-3 mt-2">
                <label class="form-label"> Name</label>
                <input type="text" class="form-control  mb-3" id="name" placeholder="Enter here..."  required/>
            </div>

            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">Email</label>
                <input type="text" class="form-control mb-3" id='email' placeholder="Enter here..." required/>
            </div>
            <div class="col-md-4 px-3 mt-2">
                <label class="form-label">Password</label>
                <input type="password" class="form-control mb-3" id='password' placeholder="Enter here..." required/>
            </div>
            <div class="col-md-4 mt-3 mx-auto">
                <label class="form-label"></label>
                <input type="submit" id="send" class="btn btn-primary w-100" name="submit" value="Submit" />
            </div>
        </div>
<!-- model -->
 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <input type="hidden" id="item_id" value="" />
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter here" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter here" required autocomplete="off">
                        </div>
                    <div class="alert alert-success" style="display: none"; id="messages"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="loader spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <div id="data_table">

        </div>

    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var btn = $("#send");

            // insert data function 
            btn.click(function() {
                var name = $("#name").val();
            
                var email = $("#email").val();
                var password = $("#password").val();
                // send data on insert qry page
                $.ajax({
                    url: "./insert-qry.php",
                    type: "POST",
                    data: {
                     name: name,
                        email: email,
                        password: password

                        
                    },
                    success: function(response) {
                        alert(response);

                        $("#name").val("");
                      
                        $("#email").val("");
                        $("#password").val("");
                        loadData();
                     
                    }
                })


            })
// show data

function loadData() {
                $.ajax({
                    url: "./ajax.php",
                    type: "POST",
                    data: {

                    },
                    success: function(response) {
                        $('#data_table').html(response);
                       
                        
                    },
                   

                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            loadData();
            // edit data
            $(document).on("click", '.editBtn', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "./single.php",
                    type: "GET",
                    data: {
                        id: id
                    },
                    
                    success: function(res) {
                        
                        let data = JSON.parse(res);
                       $("#name").val(data.name);
                       console.log(data.name)
                       $("#item_id").val(data.id);
                        $("#editModal").modal("show");
                        // console.log(data.name)
                    }
                })
            });
            //update item
            $("#updateBtn").on("click",  function(e) {
                e.preventDefault();
                $.ajax({
                    url: "./update.php",
                    type: "POST",
                    data: {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        password: $("#password").val(),
                        id: $("#item_id").val()
                    },
                    success: function(res) {
                        $("#messages").html(res).show();
                        setTimeout(() => {
                            $("#messages").hide();
                            $("#exampleModal").modal("hide");
                        }, 2000)
                    }
                })

            
            })

            
            // hide modal event
            const myModalEl = document.getElementById('exampleModal')
            myModalEl.addEventListener('hidden.bs.modal', event => {
                loadData();
            })
        })
    </script>
</body>

</html>