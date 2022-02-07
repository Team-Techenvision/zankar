
<div class="col-12">
    <div class="card">
        <div class="card-body"> 
            <div class="col-md-8 m-auto">                                           
                <form class="" action="{{url('submit-chapter')}}" method="post"> 
                @csrf    
                <input type="hidden" name="id" value="{{$chapter->id}}">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Chapter Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="chapter_name" value="{{$chapter->chapter_name}}"  placeholder="Enter Chapter Name" required />   
                    </div>
                </div>

                @php
                    $medium_name = DB::table('medium')->where('id',$chapter->medium_id)->pluck('medium_name')->first();
                    $standard_name = DB::table('standerds')->where('id',$chapter->standard_id)->pluck('standerd_name')->first();
                    $subject_name = DB::table('subjects')->where('id',$chapter->standard_id)->pluck('subject_name')->first();
                @endphp

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Medium</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="demo1" value="{{$medium_name}}"  readonly/>   
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Standard</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="demo2" value="{{ $standard_name }}"  readonly/>   
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="demo3" value="{{ $subject_name }}"  readonly/>   
                    </div>
                </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status">                                    
                                <option value="1" @if($chapter->status == '1') selected @endif>Active</option>
                                <option value="0" @if($chapter->status == '0') selected @endif>De-Active</option>                                     
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-center mt-5">
                        <div>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Cancel
                            </button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Submit
                            </button>                               
                        </div>

                        <div class="any_message mt-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('alert-danger'))
                                <div class="alert alert-danger">
                                    {{ session()->get('alert-danger') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                                @if(session()->has('alert-success'))
                                <div class="alert alert-success">
                                    {{ session()->get('alert-success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end col -->
