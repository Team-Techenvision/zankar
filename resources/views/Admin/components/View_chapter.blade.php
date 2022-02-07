
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 text-right pb-2"> 
                    <a href="add-chapter" class="btn btn-info">Add Chapter</a>
                </div>  
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Chapter Name</th>
                            <th>Medium</th>
                            <th>Standard </th>
                            <th>Subject</th>
                            <th>Status</th>                            
                            <th>Action</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                         <!-- { {dd($chapters)} } -->
                        @foreach($chapters as $row)

                        @php
                               $medium_name = DB::table('medium')->where('id',$row->medium_id)->pluck('medium_name')->first();
                              $standard_name = DB::table('standerds')->where('id',$row->standard_id)->pluck('standerd_name')->first();
                              $subject_name = DB::table('subjects')->where('id',$row->standard_id)->pluck('subject_name')->first();
                        @endphp

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->chapter_name}}</td>
                            <td>{{$medium_name}}</td>
                            <td>{{$standard_name}}</td>                            
                            <td>{{$subject_name}}</td>                            
                            <td>@if($row->status == 1) Active @else De-Active @endif</td>
                            <td><a href="{{url('edit-chapter/'.$row->id)}}" class="btn btn-info mb-2">Edit</a><a href="{{url('delete-chapter/'.$row->id)}}" class="btn btn-danger">Delete</a></td>                                               
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