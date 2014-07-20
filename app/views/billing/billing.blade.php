@extends('dashboard')
@section('main')
<h3 class="page-title"><i class="icon-info-sign"></i>Accountant dashboard</h3>
   
   <div class="widget-content">
        <div class="container-fluid padded">
            <div class="container-fluid padded">
                <div class="row-fluid">
                    <div class="span30">
                        <div class="action-nav-normal">
                            <div class="row-fluid">
                                <div class="span3 action-nav-button">
                                    <a href="Pending_bills">
                                    <i class="icon-money"></i>
                                    <span>Payment</span>
                                    </a>
                                </div>
                                <div class="span3 action-nav-button">
                                    <a href="service_management">
                                    <i class="icon-certificate"></i>
                                    <span>Manage service</span>
                                    </a>
                                </div>
                                <div class="span3 action-nav-button">
                                    <a href="manage_report">
                                    <i class="icon-hospital"></i>
                                    <span>Manage  report</span>
                                    </a>
                                </div>
                                <div class="span3 action-nav-button">
                                    <a href=My_account_billing>
                                    <i class="icon-user"></i>
                                    <span>My account</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      <!---DASHBOARD MENU BAR ENDS HERE-->
        </div>
        <hr>
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
    </div>
@stop


