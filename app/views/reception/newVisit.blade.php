@extends('dashboard')
@section('main')

<h1 class="page-title"><i class="icon-th-large"></i>Manage Patients</h1>
<div class="row">
<div class="span9">
<div class="widget-content">

    <div id="alrt" class="alert alert-success alert-dismissable" style="display:none;z-index:3000;position:absolute;margin-left: 160px; margin-top:150px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Successfully updated! Redirecting...</strong>
    </div>

    @if(isset($message))
    <div class="alert alert-info" id="message">{{ $message }}</div>
    @endif

    <form id="myWizard" type="get" action="">

        <section style="display:none" class="step" data-step-title="Initial Information">
            <fieldset >

                <div class="span4 pull-left">


                    <h4 >Full name :  {{Patient::fullname($patient)}} </h4>
                    <div class="control-group">
                        <label class="control-label" for="">Height (cm)</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge " id="" value="" name="height"  />

                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                        <label class="control-label" for="">Weight (kg)</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge " id="" value="" name="weight"  />

                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="password">Allergy</label>
                        <div class="controls">
                            <select class="form-control" name="allergy" >
                                <option disabled>Select Allergy</option>
                                <option></option>
                                <option>Skin</option>
                                <option>Asthma</option>
                                <option>None</option>
                            </select>
                        </div>

                    </div> <!-- /control-group -->



                </div>

                <div class="span4 pull-right">
                    <h4> Hospital File no:  UD/<b>{{$patient->filenumber}}</b></h4>
                    <div class="control-group">
                        <label class="control-label" for="temperature">Temperature (c)</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge " id="" value="" name="temperature" />

                        </div> <!-- /controls -->
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="bp">Blood Pressure (hg)</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge " id="" value="" name="bloodpressure" >

                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="gender">Blood Group</label>
                        <div class="controls">
                            <select class="form-control" name="bloodgroup" required>
                                <option disabled>Select Blood Group</option>
                                <option></option>
                                <option>A</option>
                                <option>B</option>
                                <option>O</option>
                                <option>AB</option>
                            </select>
                        </div>

                    </div> <!-- /control-group -->
                    <div class="control-group">
                        <label class="control-label" for="gender">Rhesus Factor</label>
                        <div class="control-group ">
                            <label class="radio">
                                <input type="radio" name="rhesus" id="" value="positive" >
                                Positive
                            </label>
                            <label class="radio">
                                <input type="radio" name="rhesus" id="" value="negative">
                                Negative</label>

                        </div>

                    </div> <!-- /control-group -->
                </div>


            </fieldset>
        </section>



        <section style="display:none" class="step" id="last" data-step-title="More Information">




            <fieldset >
                <div class="span4 pull-left">
                    <h4 >Full name :  {{Patient::fullname($patient)}} </h4>

                     <div class="control-group ">
                        <h4>Payment Mode</h4>
                    <p>Choose type</p>
                    <select id="insurance1" name="payment" class="form-control" required>
                        <option></option>
                        <option value="Cash">Cash</option>
                        <option value="Insurance">Insurance</option>
                       
                    </select>

                     <div id="insurance-more">

                    </div>

                    </div>



                </div>
                <div class="span4 pull-right" style="margin-left:4px;">


                    <h4> Hospital File no:  UD/<b>{{$patient->filenumber}}</b></h4>
                    <input name="pid" value="{{$patient->id}}" type="hidden" />
                    <label class="control-label">Direct To &raquo</label>
                    <p>SECTION</p>
                    <select id="section" name="section" class="form-control" required>
                        <option></option>
                        <option value = "OPD">OPD</option>
                        <option value = "IPD">IPD</option>
                        <option value = "ANC">ANC</option>
                    </select>

                    <div id="section-more">

                    </div>
                </div>

            </fieldset>
        </section>
    </form>

    <div>
    </div>

</div>
</div>
</div>


@stop

