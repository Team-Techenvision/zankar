
<div class="col-12">
    <div class="card">
        <div class="card-body"> 
            <div class="col-12 text-right pb-2"> 
                <a href="{{url('add-medium')}}" class="btn btn-info">Add Medium</a>
            </div>    
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive  text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>Medium</th>
                        <th>Status</th>                            
                        <th>Action</th>                    
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    @foreach($medium as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->medium_name}}</td>                            
                        <td>@if($row->status == 1) Active @else De-Active @endif</td>
                        <td><a href="{{url('edit-medium/'.$row->id)}}" class="btn btn-info mr-2">Edit</a><a href="{{url('delete-medium/'.$row->id)}}" class="btn btn-danger">Delete</a></td>                                               
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
