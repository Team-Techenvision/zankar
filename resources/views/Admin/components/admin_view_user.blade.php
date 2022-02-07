
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {{-- <h4 class="card-title">Buttons example</h4> --}}
                {{-- <p class="card-title-desc">The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p> --}}

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Username </th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                    @foreach($users as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> <a href="{{url('view-user-details/'.$row->id)}}">{{$row->name}} </a> </td>  
                        <td>{{$row->phone}}</td>                            
                        <td>@if($row->status == 1) Active @else De-Active @endif</td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                        {{-- <td><a href="{{url('edit-college/'.$row->id)}}" class="btn btn-info mr-2">Edit</a><a href="{{url('delete-college/'.$row->id)}}" class="btn btn-danger">Delete</a></td>                                                --}}
                    </tr>
                    @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
