<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=1051026648318470";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="page-header">
    <h1>
        Dashboard
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <i class="ace-icon fa fa-check green"></i>

            Selamat Datang di Dashboard <?php echo $company?>
        </div>
        <?php
        /*
        if (!empty($this->session->flashdata('error'))) {
            echo "<div class='alert alert-danger'>";
            echo '<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i>
            </button>';
            echo "<b>".$this->session->flashdata('error')."</b>";
            echo "</div>";
        }
        */
        ?>
                        <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-star orange"></i>
                            Fans Page
                        </h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table class="table table-bordered table-striped">
                                <thead class="thin-border-bottom">
                                    <tr>
                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue"></i>Page
                                        </th>

                                        <th>
                                            <i class="ace-icon fa fa-caret-right blue"></i>Likes
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>facebook.com</td>

                                        <td>
                                            <div class="fb-like" data-href="https://web.facebook.com/savanatech/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>online.com</td>

                                        <td>
                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>newnet.com</td>

                                        <td>
                                            <b class="blue">$15.00</b>
                                        </td>
                                    </tr>

                                    
                                </tbody>
                            </table>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
    </div>

