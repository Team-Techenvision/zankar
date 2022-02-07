
<div class="col-12">
        <div class="card">
            <div class="card-body"> 
                <div class="col-12 text-right pb-2"> 
                    <a href="{{url('add-standard')}}" class="btn btn-info">Add Standard</a>
                </div>    
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Standard</th>
                            <th>Medium</th>
                            <th>Status</th>                            
                            <th>Action</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($standerds as $row)
                        @php
                                $medium_name = DB::table('medium')->where('id',$row->medium_id)->pluck('medium_name')->first();
                        @endphp

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->standerd_name}}</td>    
                            <td>{{$medium_name}}</td>                        
                            <td>@if($row->status == 1) Active @else De-Active @endif</td>
                            <td><a href="{{url('edit-standard/'.$row->id)}}" class="btn btn-info mr-2">Edit</a><a href="{{url('delete-standard/'.$row->id)}}" class="btn btn-danger">Delete</a></td>                                               
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .dt-buttons
        {
            display:none!important;
        }
     </style>   
    <!-- end col -->
