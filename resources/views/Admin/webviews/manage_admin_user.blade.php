@extends('layouts.master')

@section('title') User List @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') @if($page_title)  {{$page_title}} @endif @endslot
         {{-- @slot('li_1') Tables  @endslot --}}
     @endcomponent

                    

     <div class="row">
    @if($flag == 1)
        @include('Admin.components/admin_view_user')
    @elseif($flag == 2)
        @include('Admin.components/admin_view_user')
    @elseif($flag == 3) 
        @include('Admin.components/view_medium')
    @elseif($flag == 4) 
        @include('Admin.components/add_medium')
    @elseif($flag == 5) 
        @include('Admin.components/edit_medium')
    @elseif($flag == 6) 
        @include('Admin.components/view_standard')
    @elseif($flag == 7) 
        @include('Admin.components/add_standard')
    @elseif($flag == 8) 
        @include('Admin.components/edit_standard')
    @elseif($flag == 9) 
        @include('Admin.components/view_subject')
    @elseif($flag == 10) 
        @include('Admin.components/add_subject')
    @elseif($flag == 11) 
        @include('Admin.components/edit_subject')
    @elseif($flag == 12) 
        @include('Admin.components/view_chapter')
    @elseif($flag == 13) 
        @include('Admin.components/add_chapter')
    @elseif($flag == 14) 
        @include('Admin.components/edit_chapter')
    @elseif($flag == 15) 
        @include('Admin.components/view_video')
    @elseif($flag == 16) 
        @include('Admin.components/add_video')
    @elseif($flag == 17) 
        @include('Admin.components/edit_video')
    @elseif($flag == 18) 
        @include('Admin.components/user_details')
    {{-- @elseif($flag == 2) 
        @include('Admin.components/add_subject')
    @elseif($flag == 3) 
        @include('Admin.components/add_standard')
    @elseif($flag == 4) 
        @include('Admin.components/add_chapter')
    @elseif($flag == 5) 
        @include('Admin.components/view_standard') 
    @elseif($flag == 6) 
        @include('Admin.components/view_subject') 
    @elseif($flag == 7) 
        @include('Admin.components/view_chapter')
    @elseif($flag == 8) 
        @include('Admin.components/view_college')
    @elseif($flag == 9) 
        @include('Admin.components/add_college')
    @elseif($flag == 10) 
        @include('Admin.components/edit_standard')
    @elseif($flag == 11) 
        @include('Admin.components/edit_college')   
    @elseif($flag == 12) 
        @include('Admin.components/view_semister')
    @elseif($flag == 13) 
        @include('Admin.components/add_semister')  
    @elseif($flag == 14) 
        @include('Admin.components/edit_semister')
    @elseif($flag == 15) 
        @include('Admin.components/edit_subject')
    @elseif($flag == 16) 
        @include('Admin.components/edit_chapter')
    @elseif($flag == 17) 
        @include('Admin.components/view_test_type')
    @elseif($flag == 18) 
        @include('Admin.components/add_test_type') 
    @elseif($flag == 19) 
        @include('Admin.components/edit_test_type')   --}}
    @endif
    </div>
                    <!-- end row -->

    @endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection