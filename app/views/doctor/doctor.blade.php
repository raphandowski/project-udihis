@extends('dashboard')
@section('main')
<h1 class="page-title"><i class="icon-info-sign"></i>Doctor Dashboard</h1>												
			<div class="widget-content">
                <div class="row-fluid">
                <div class="">
                    <div class="widget widget-table">
                        <div class="widget-header">
                            <span class="title"><i class="icon-tasks"></i></span>  Notifications
                        </div>
                        <div class="widget-content" style="padding:px20;">
                            <table class="table table-bordered">
                                <colgroup>
                                  <col class="span6">
                                  <col class="span2">
                                </colgroup>
                                <thead>
                                  <tr>
                                    <th>Tittle</th>
                                    <th>Message</th>
                                    <th>Schedule</th>
                                    <th>Author</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php $notice=Notification::orderBy('id', 'DESC')->get()->take(5); ?>
                                  @foreach($notice as $notice)
                                  <tr>
                                    <td>{{$notice->title}}</td>
                                    <td>{{$notice->message}}</td>                                    
                                    <td>{{$notice->date}}</td>
                                    <td>{{$notice->who_responsible}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			</div> <!-- /widget-content -->
		
@stop
