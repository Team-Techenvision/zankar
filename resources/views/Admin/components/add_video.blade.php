
<div class="col-12">
    <div class="card">
        <div class="card-body"> 
            <div class="col-md-8 m-auto">                                           
                <form class="" action="{{url('submit-video')}}" method="post"> 
                @csrf    
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Video Title </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="video_title" required placeholder="Enter Video Title"/>   
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Video Link </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="video_link" required placeholder="Enter Video Link"/>   
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Medium</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="medium_id" required>
                            <option value="">Select Medium</option>
                            @foreach($medium as $r) 
                                <option value="{{$r->id}}">{{$r->medium_name}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Standard</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="standard_id" required>
                            <option value="">Select Standard</option>
                            {{-- @foreach($standerds as $r) 
                                <option value="{{$r->id}}">{{$r->standerd_name}}</option> 
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="subject_id" required>
                            <option value="">Select Subject</option>
                            {{-- @foreach($standerds as $r) 
                                <option value="{{$r->id}}">{{$r->standerd_name}}</option> 
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Chapter</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="chapter_id" required>
                            <option value="">Select Chapter</option>
                            {{-- @foreach($standerds as $r) 
                                <option value="{{$r->id}}">{{$r->standerd_name}}</option> 
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status">                                    
                                <option value="1">Active</option>
                                <option value="0">De-Active</option>                                     
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
