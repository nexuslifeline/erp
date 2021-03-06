<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

    <style>

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

    </style>

</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">

        <?php echo $_side_bar_navigation;?>

        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="products">Products</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_product_list">
                                        <div class="panel panel-default">
                                            <div class="panel-body table-responsive">
                                                <table id="tbl_products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Product Code</th>
                                                        <th>Description 1</th>
                                                        <th>Description 2</th>
                                                        <th>Category</th>
                                                        <th>Department</th>
                                                        <th>Unit</th>
                                                        <th>Equivalent Points</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>

                                    <div id="div_product_fields" style="display: none;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>product Information</h2>
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div>

                                            <div class="panel-body">
                                                <div class="">
                                                <h3>General</h3>
                                                <hr/>
                                                &nbsp;
                                                </div>
                                                <form id="frm_product" role="form" class="form-horizontal row-border">
                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Product Code :</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                        <i class="fa fa-file-code-o"></i>
                                                                                    </span>
                                                                <input type="text" name="product_code" class="form-control" value="" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Description 1 :</label>
                                                        <div class="col-md-7">
                                                            <textarea name="product_desc" class="form-control" data-error-msg="product Description is required!" placeholder="Description" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Description 2 :</label>
                                                        <div class="col-md-7">
                                                            <textarea name="product_desc1" class="form-control" placeholder="Description"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Category :</label>
                                                        <div class="col-md-7">
                                                            <select name="product_cat" id="" class="form-control">
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                foreach($product_cat as $row)
                                                                {
                                                                    echo '<option value="'.$row->category_name.'">'.$row->category_name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Department :</label>
                                                        <div class="col-md-7">
                                                            <select name="product_dept" id="" class="form-control">
                                                                <option value="">Select Department</option>
                                                                <?php
                                                                foreach($product_dept as $row)
                                                                {
                                                                    echo '<option value="'.$row->department_name.'">'.$row->department_name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">* Unit :</label>
                                                        <div class="col-md-7">
                                                            <select name="product_unit" id="" class="form-control">
                                                                <option value="">Select Unit</option>
                                                                <?php
                                                                foreach($product_unit as $row)
                                                                {
                                                                    echo '<option value="'.$row->unit_name.'">'.$row->unit_name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-7 col-md-offset-3">
                                                            <input type="checkbox" name="product_vat"> <b>Vat Exempt</b>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Equivalent Points :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="equivalent_points" class="form-control">
                                                        </div>
                                                    </div>

                                                    <h3>Inventory</h3>
                                                    <hr/>
                                                    &nbsp;

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Warn Qty :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="product_warn" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Ideal Qty :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="product_ideal" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-7 col-md-offset-3">
                                                            <input type="radio" name="product_radio"> <b>Inventory</b>
                                                            <input type="radio" name="product_radio" style="margin-left: 10px;"> <b>Non-Inventory</b>
                                                        </div>
                                                    </div>

                                                    <h3>Pricing</h3>
                                                    <hr/>
                                                    &nbsp;

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Purchase Cost :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="purchase_cost" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Markup Percent :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="markup_percent" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Sale Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="sale_price" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Whole Sale Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="whole_sale" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Retailer Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="retailer_price" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Special Discount Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="special_disc" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 col-md-offset-1 control-label">Valued Customer Price :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" name="valued_customer" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br /><br />
                                                </form>
                                            </div>

                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;""><span class=""></span>  Save Changes</button>
                                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- .container-fluid -->

                </div> <!-- #page-content -->
            </div>

            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>
                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>

        </div>
    </div>
</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script>

$(document).ready(function(){
    var dt; var _txnMode; var _selectedID; var _selectRowObj;

    var initializeControls=function(){
        dt=$('#tbl_products').DataTable({
            "dom": '<"toolbar">frtip',
            "bLengthChange":false,
            "ajax" : "products/transaction/list",
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "product_code" },
                { targets:[2],data: "product_desc" },
                { targets:[3],data: "product_desc1" },
                { targets:[4],data: "product_cat" },
                { targets:[5],data: "product_dept" },
                { targets:[6],data: "product_unit" },
                { targets:[7],data: "equivalent_points" },
                {
                    targets:[8],
                    render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                }
            ]
        });

        var createToolBarButton=function(){
            var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New product" >'+
                '<i class="fa fa-users"></i> New product</button>';
            $("div.toolbar").html(_btnNew);
        }();
    }();

    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_products tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );

        $('#btn_new').click(function(){
            _txnMode="new";
            showList(false);
        });

        $('#tbl_products tbody').on('click','button[name="edit_info"]',function(){
            _txnMode="edit";
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.product_id;

            $('input,textarea').each(function(){
                var _elem=$(this);
                $.each(data,function(name,value){
                    if(_elem.attr('name')==name){
                        _elem.val(value);
                    }
                });
            });
            showList(false);
        });

        $('#tbl_products tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.product_id;

            $('#modal_confirmation').modal('show');
        });

        $('#btn_yes').click(function(){
            removeProduct().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });

        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_product').hide();
            $('#div_img_loader').show();

            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            console.log(_files);

            $.ajax({
                url : 'products/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    $('#div_img_loader').hide();
                    $('#div_img_product').show();
                }
            });
        });

        $('#btn_cancel').click(function(){
            showList(true);
        });

        $('#btn_save').click(function(){
            if(validateRequiredFields()){
                if(_txnMode=="new"){
                    createProduct().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields();

                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updateProduct().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields();
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }
            }
        });
    })();

    var validateRequiredFields=function(){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required]','#frm_product').each(function(){
            if($(this).val()==""){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('div.form-group').addClass('has-error');
                stat=false;
                return false;
            }
        });
        return stat;
    };

    var createProduct=function(){
        var _data=$('#frm_product').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"products/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updateProduct=function(){
        var _data=$('#frm_product').serializeArray();
        _data.push({name : "product_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"products/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removeProduct=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"products/transaction/delete",
            "data":{product_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_product_list').show();
            $('#div_product_fields').hide();
        }else{
            $('#div_product_list').hide();
            $('#div_product_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(){
        $('input[required],textarea','#frm_product').val('');
        $('form').find('input:first').focus();
    };

    function format ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td width="20%">Product Code : </td><td width="50%"><b>'+ d.product_code+'</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td>Product Description 1 : </td><td>'+ d.product_desc+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Product Description 2 : </td><td>'+ d.product_desc1+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Category : </td><td>'+ d.product_cat+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Department : </td><td>'+ d.product_dept+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Unit : </td><td>'+ d.product_unit+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Vat Exempt : </td><td>'+ d.product_vat+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Equivalent Points : </td><td>'+ d.equivalent_points+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Warn Qty : </td><td>'+ d.product_warn+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Ideal : </td><td>'+ d.product_ideal+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Purchase Cost : </td><td>'+ d.purchase_cost+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Markup Percent : </td><td>'+ d.markup_percent+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Sale Price : </td><td>'+ d.sale_price+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Whole Sale Price : </td><td>'+ d.whole_sale+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Retailer Price : </td><td>'+ d.retailer_price+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Special Discount Price : </td><td>'+ d.special_disc+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Valued Customer Price : </td><td>'+ d.valued_customer+'</td>' +
        '</tr>' +
        '</tbody></table><br />';
    };
});

</script>

</body>

</html>