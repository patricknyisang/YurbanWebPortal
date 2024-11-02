<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yurban web portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
       <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    Filter By Date
                </button>

                <button id="openCountyModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#countyModal">
                    Filter By County
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
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->nationaid }}</td>
                    <td>{{ $driver->firstname }}</td>
                    <td>{{ $driver->lastname }}</td>
                    <td>{{ $driver->phonenumber }}</td>
                    <td>{{ $driver->county }}</td>
                    <td>{{ $driver->subcounty }}</td>
                    <td>{{ $driver->email }}</td>
                    
                  
                </tr>
            @endforeach
        </tbody>
    </table>

                <!-- Modal Structure -->
               <!-- Modal Structure -->
               <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Filter Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                <form id="userForm" method="post" action="{{ url('filterByDate') }}">
                    {{ csrf_field() }}
                    
                    <!-- Filter by date -->
                    <div class="mb-3">
                        <label for="nationaid" class="form-label">Select Date:</label>
                        <input type="date" class="form-control" id="dateselected" name="dateselected" required>
                    </div>

                                    <button type="submit" class="btn btn-success">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


      <!-- Modal Structure -->
      <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Filter Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                <form id="userForm" method="post" action="{{ url('storescustomer') }}">
                    {{ csrf_field() }}
                    
                    <!-- Filter by date -->
                    <div class="mb-3">
                        <label for="nationaid" class="form-label">Select Date:</label>
                        <input type="date" class="form-control" id="dateselected" name="dateselected" required>
                    </div>

                                    <button type="submit" class="btn btn-success">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                    <!-- County Filter Modal -->
                    <div id="countyModal" class="modal fade" tabindex="-1" aria-labelledby="countyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="countyModalLabel">Filter by County</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="countyFilterForm" method="post" action="{{ url('filterByCounty') }}">
                                    {{ csrf_field() }}
                                    
                                    <!-- Filter by County -->
                                    <div class="mb-3">
                                        <label for="county" class="form-label">Select County:</label>
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

                                    <button type="submit" class="btn btn-primary">Filter</button>
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
