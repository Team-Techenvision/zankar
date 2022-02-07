 
<div class="col-12">
    <div class="card">
        <div class="card-body">

            {{-- <h4 class="card-title">Buttons example</h4> --}}
            {{-- <p class="card-title-desc">The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p> --}}
            <div class="col-md-8 m-auto">                                           
                <form action="{{url('submit-subject')}}" method="POST"> 
                @csrf                       
                
                <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" required>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Subject Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="subject_name" required placeholder="Enter Subject Name" value="{{$subject->subject_name}}" />
                        </div>
                    </div>

                @php
                    $medium_name = DB::table('medium')->where('id',$subject->medium_id)->pluck('medium_name')->first();
                    $standard_name = DB::table('standerds')->where('id',$subject->standard_id)->pluck('standerd_name')->first();
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
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status">                                    
                                <option value="1" @if($subject->status == '1') selected @endif>Active</option>
                                <option value="0" @if($subject->status == '0') selected @endif>De-Active</option>                                     
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
