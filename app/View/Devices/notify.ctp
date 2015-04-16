<?php //print_r($devices); exit; ?>

<section class="content" id="ibx-r6">
    <form method="post">
    <div class="row">
        <section class="col-lg-6 connectedSortable">
            <!-- Map box -->
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    </div><!-- /. tools -->

                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                        Message
                    </h3>
                </div>
                <div class="box-body no-padding">
                    <div>
                        <div class="form-group">
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <b>Sent:</b> <?php echo $result['sent']; ?><br>
                <b>Failed:</b> <?php echo $result['failed']; ?>
            </div>
        </section>

        
        <section class="col-lg-6 connectedSortable">
            <!-- Map box -->
            <div class="box box-primary">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    </div><!-- /. tools -->

                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                        Combinations
                    </h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    <input class="" id="allChk" type="checkbox" />
                                </th>
                                <td></td>
                                <th>
                                    Device Details
                                </th>
                                
                                <th>Register on</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($devices as $dv){ ?>
                            <tr>
                                <td style="vertical-align: middle;">
                                    <input class="deleteSel" type="checkbox" data-bind="value: jsonval , checked:$root.selectedCombinations " name="tokens[]" value="<?php echo $dv['Device']['device_token']; ?>" />
                                </td>
                                <td>
                                    <img data-bind="attr:{'src':Combination.image} " width="70px" />
                                </td>
                                <td>
                                    <b data-bind="text:Combination.display_name "></b>
                                    <p>Name: <?php echo $dv['Customer']['name']; ?></p>
                                    <p>Mobile Number. <?php echo $dv['Customer']['mobile_number']; ?></p>
                                </td>
                                <td>
                                    <?php echo date("d-m-Y h:i a",$dv['Customer']['registered_on']); ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    </form>
</section>
<script type="text/javascript">
    var NotifyVM = function(){
        var me = this;
        me.sendNotify = function(){
            
        };
    };
    $(document).ready(function(e){
        
        $('#allChk').on("ifChanged",function(){
           if($(this).is(":checked")){
               $('.deleteSel').prop('checked',true);
           }else{
               $('.deleteSel').prop('checked',false);
           }
           $(".deleteSel").iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });
        });

        
    });
</script>