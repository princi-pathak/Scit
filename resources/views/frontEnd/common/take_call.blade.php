<?php
$home_id = Auth::user()->home_id;
$company_id = App\Home::where('is_deleted', '0')->where('id', $home_id)->value('admin_id');
$manager_data = App\User::where('status', '1')
    ->where('user_type', 'M')
    ->where('is_deleted', '0')
    ->where('company_id', $company_id)
    ->get();

?>


<style type="text/css">
    .wrap-info>img#manager_id {
        width: 90px;
        height: 70px;
        border-radius: 4px;
        padding: 3px;
        border: 1px solid #d3cfcf;
    }

    .hadr {
        background-color: #1f88b5;
    }

    .hadr .hadr_txt {
        color: white;
    }

    .mail-pop {
        margin-bottom: 12px;
    }

    #call_modal .wrap-info p {
        margin-bottom: 0;
        font-size: 14px;
    }
</style>
<!-- modal here -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="call_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header hadr">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title hadr_txt">Contact to Company Manager</h4>
            </div>

            <div class="modal-body clearfix">
                <div class="wrap-all text-center">
                    <?php if (empty($manager_data)) { ?>
                        <div class="mail-pop">
                            <div class="col-xs-12">
                                <div class="wrap-info text-center">
                                    <p>No company manager available to take call </p>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        @foreach($manager_data as $manager_info)
                        <div class="mail-pop row">
                            <div class="col-xs-2">
                                <div class="wrap-info">
                                    <!-- <i class="fa fa-user"></i> -->
                                    <?php $image  = userProfileImageBasePath . '/' . 'default_user.jpg';

                                    if (!empty($manager_info->image)) {
                                        $image = userProfileImageBasePath . '/' . $manager_info->image;
                                    }

                                    ?>
                                    <img src="{{ url($image) }}" alt="No image" id="manager_id">


                                </div>
                            </div>
                            <div class="col-xs-9">
                                <div class="wrap-info text-left icons-social">
                                    <p> <i class="fa fa-user"></i> &nbsp;{{isset($manager_info->name)? $manager_info->name : ''}} </p>

                                    <p> <i class="fa fa-envelope"></i> <a href="mailto:{{isset($manager_info->email)? $manager_info->email : ''}}">{{isset($manager_info->email)? $manager_info->email : ''}}</a> </p>


                                    <p class="text-phone"> <i class="fa fa-phone"></i> {{isset($manager_info->phone_no)? $manager_info->phone_no : ''}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    <?php } ?>
                </div>
            </div>

            <div class="modal-body email_error"></div>
        </div>
    </div>
</div>
<!-- modal here -->