@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Report Management | Admin
@stop
@section('header_styles')


@stop

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="container" style="margin-top: 80px;" >
        <div class="row">
            <div class="col-xs-10">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2 class="panel-title">
                          Ticket Report
                      </h2>
                  </div>
                  <div class="panel-body">
                    <h3>
                        @php
                        if(Sentinel::check()){
                            $user = Sentinel::getUser();
                        }
                        @endphp
                        Welcome {{ $user->first_name }}
                    </h3>
                </div>
                <ul class="list-group">

                    <li class="list-group-item">
                        <h4>Report</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>start date</th>
                                    <th>Priority</th>
                                    <th>Ticket Status</th>
                                    <th>Serial No.</th>
                                    <th>Model No.</th>
                                    <th>User Name.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) >  0)
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->priority }}</td>
                                    <td>{{ $value->ticket_status }}</td>
                                    <td>{{ $value->serial_no }}</td>
                                    <td>{{ $value->model_no }}</td>
                                    <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                </tr>
                                @endforeach
                                @else

                                <tr> <td>
                                    No Data Found
                                </td>  </tr>

                                @endif
                            </tbody>
                        </table>
                    </li>



                </ul>
            </div>
        </div>
    </div>
</div>
</div>
@stop
@section('footer_scripts')
@stop
