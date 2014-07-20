<div class="navbar navbar-fixed-top">
    
    <div class="navbar-inner">
        
        <div class="container">
            
            
            <center><div class="" > <div class="pull-left">{{HTML::image('packages/bootstrap/img/logo1.png')}}
            </div> <div class=" pull-right">{{HTML::image('packages/bootstrap/img/logo2.png')}}</div>
            <div class=" " >
        <h2>UDSM INTEGRATED HOSPITAL INFORMATION SYSTEM </h2></div>
            </div></center>
            
            
            <div class="nav-collapse">
            
                <ul class="nav pull-right">
                
                </ul>
                
            </div> <!-- /nav-collapse -->
            
        </div> <!-- /container -->
        
    </div> <!-- /navbar-inner -->
    
</div>
<!-- /navbar -->
        <div id="content">

        <div class="container">

            <div class="row">

                <div class="span3">

                    <div class="account-container">
<?php   if (Auth::user()) {
    
?>
                        <div class="account-avatar">
                        @if(Auth::user()->profile_pic=="")
                        {{HTML::image('packages/bootstrap/img/noavatar.png',"", array('class'=>'thumbnail'))}}
                        @else
                        {{HTML::image("uploads/profiles/" . Auth::user()->profile_pic,"",array('class'=>'img-rounded thumbnail', 'style'=>'height:80px;width:60px'))}}
                        @endif                      
                        
                        </div> <!-- /account-avatar -->

                        <div class="account-details">
                            Welcome,

                            @if(Auth::user()->level == 0)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 1)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 2)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 3)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 4)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 6)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            @if(Auth::user()->level == 7)
                            <span class="account-name">{{Auth::user()->username}}</span>
                            @endif
                            <span class="account-actions">
                                <a style="color:#888; text-decoration:none;" href="{{url("logout")}}"><i class="icon-off"></i> Logout</a>
                            </span>

                        </div> <!-- /account-details -->

                    </div> <!-- /account-container -->

                    <hr />
                     <?php }else
          ?> 