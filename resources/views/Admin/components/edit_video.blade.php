
<div class="col-12">
    <div class="card">
        <div class="card-body"> 
            <div class="col-md-8 m-auto">                                           
                <form class="" action="{{url('submit-video')}}" method="post"> 
                @csrf    
                <input type="hidden" name="video_id" value="{{$video->id}}">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Video Title </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="video_title" value="{{$video->video_title}}"  placeholder="Enter Video Title" required />   
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Video Link </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="video_link" value="{{$video->video_link}}"  placeholder="Enter Video Link" required/>   
                    </div>
                </div>

                @php
                               $medium_name = DB::table('medium')->where('id',$video->medium_id)->pluck('medium_name')->first();
                              $standard_name = DB::table('standerds')->where('id',$video->standard_id)->pluck('standerd_name')->first();
                              $subject_name = DB::table('subjects')->where('id',$video->standard_id)->pluck('subject_name')->first();
                              $chapter_name = DB::table('chapters')->where('id',$video->chapter_id)->pluck('chapter_name')->first();
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
                    <label class="col-sm-3 col-form-label">Chapter</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="demo4" value="{{ $chapter_name }}"  readonly/>   
                    </div>
                </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status">                                    
                                <option value="1" @if($video->status == '1') selected @endif>Active</option>
                                <option value="0" @if($video->status == '0') selected @endif>De-Active</option>                                     
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
