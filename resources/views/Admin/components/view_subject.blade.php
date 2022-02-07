
<div class="col-12">
        <div class="card">
            <div class="card-body"> 
                <div class="col-12 text-right pb-2"> 
                    <a href="add-subject" class="btn btn-info">Add Subject</a>
                </div>    
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Subject Name</th>
                            <th>Medium</th>
                            <th>Standard</th>             
                            <th>Status</th>                            
                            <th>Action</th>                        
                        </tr>
                    </thead>

                    <tbody>
                       
                        <?php $i = 1; ?>                
                        @foreach($subjects as $row)
                        @php
                              $medium_name = DB::table('medium')->where('id',$row->medium_id)->pluck('medium_name')->first();
                              $standard_name = DB::table('standerds')->where('id',$row->standard_id)->pluck('standerd_name')->first();
                         @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->subject_name}}</td> 
                            <td>{{$medium_name}}</td> 
                            <td>{{$standard_name}}</td>                            
                            <td>@if($row->status == 1) Active @else De-Active @endif</td>
                            <td><a href="{{url('edit-subject/'.$row->id)}}" class="btn btn-info">Edit </a>  <a href="{{url('delete-subject/'.$row->id)}}" class="btn btn-danger">Delete</a></td>                                               
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