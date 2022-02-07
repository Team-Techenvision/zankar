view_video
<div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 text-right pb-2"> 
                    {{-- <a href="{{url('add-video')}}" class="btn btn-info">Add Video</a> --}}
                </div>  
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Name </th>
                            <th>Medium </th>
                            <th>Standard</th>
                            <th>Mobile No. </th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>State</th>
                            <th>Status</th>                            
                            <th>Action</th>                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                         <!-- { {dd($video)} } -->
                         @php
                              $medium_name = DB::table('medium')->where('id',$user->medium_id)->pluck('medium_name')->first();
                            //   dd($user);
                         @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->medium_id}}</td>                            
                            <td>{{$user->standard_id}}</td>
                            <td>{{$user->phone}}</td>                            
                            <td>{{$user->address}}</td>
                            <td>{{$user->city}}</td>  
                            <td>{{$user->pin_code}}</td>                            
                            <td>{{$user->state}}</td>                            
                            <td>@if($user->status == 1) Active @else De-Active @endif</td>
                            <td></td>                                               
                        </tr>
                       
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