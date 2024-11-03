<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yurban web portal</title>
    <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="../../patostyles/styles2.css">

</head>
<body>
    <div class="dashboard-container">
    @include('adminSidebar')
        <main class="main-content">
            <header class="topbar">
                <h1>Welcome to the Yurban Dashboard</h1>
            </header>
            <section class="content">
             

                <!-- Button to open modal -->
                <button id="openModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                    Add New Admin
                </button>

                 <!-- Table -->
                 <table>
        <thead>
            <tr>
                <th>National ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>County</th>
                <th>Sub-County</th>
                <th>Email</th>
                <th>Actions</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->nationaid }}</td>
                    <td>{{ $admin->firstname }}</td>
                    <td>{{ $admin->lastname }}</td>
                    <td>{{ $admin->phonenumber }}</td>
                    <td>{{ $admin->county }}</td>
                    <td>{{ $admin->subcounty }}</td>
                    <td>{{ $admin->email }}</td>
                    

                    <td>
                    <!-- Edit button (modal trigger) -->
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $admin->id }}">
                        Edit
                    </button>

                    <!-- Delete button -->
                    <form action="{{ url('deleterecords', $admin->id) }}" method="POST" style="display:inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

                <!-- Modal Structure -->
                <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Add New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                <form id="userForm" method="post" action="{{ url('storesadmin') }}">
                    {{ csrf_field() }}
                    
                    <!-- National ID -->
                    <div class="mb-3">
                        <label for="nationaid" class="form-label">National ID:</label>
                        <input type="text" class="form-control" id="nationaid" name="nationalid" required>
                    </div>

                    <!-- First Name -->
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                    </div>

                    <!-- County -->
                    <div class="mb-3">
                        <label for="role" class="form-label">County:</label>
                        <select  class="form-select" name="county" id="county" required>
                <option value="">-- Select County --</option>
              @foreach($counties as $data) 
              <option value="{{$data->id }}"> {{$data->{'id'}.' - '.$data->{'county_name'}.''}}</option>
          @endforeach
            </select>
                    </div>

                    <!-- Sub-County -->
                    <div class="mb-3">
                        <label for="constituency" class="form-label">Sub-County:</label>
                        <select  class="form-select" name="constituency" id="constituency" required>
                        </select>   
        </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                            <option value="Driver">Driver</option>
                        </select>
                    </div>
                                    <button type="submit" class="btn btn-success">Add User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Bootstrap 5 JS (optional) -->
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
               /*------------------------------------------
            --------------------------------------------
          contistuency 
            --------------------------------------------
            --------------------------------------------*/

            $('#county').on('change', function () {
                var idCounty = this.value;
                $("#constituency").html('');
                $.ajax({
                    url: "{{url('fetch-constituencies')}}",
                    type: "POST",
                    data: {
                        id: idCounty,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#constituency').html('<option value="">-- Select Contituency --</option>');
                        $.each(result.constituency, function (key, value) {
                            $("#constituency").append('<option value="' + value
                                .id + '">' + value.constituency + '</option>');
                        });
                    
                    }
                });
            });

        });
    </script>
       
</body>
</html>
