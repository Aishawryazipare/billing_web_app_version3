@extends('layouts.app')
@section('title', 'Stock Report')
@section('content')
<link href="css/sweetalert.css" rel="stylesheet">
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    @if (Session::has('alert-success'))
    <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Success!</h4>
        {{ Session::get('alert-success') }}
    </div>
    @endif  
    @if (Session::has('alert-error'))
    <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
        {{ Session::get('alert-error') }}
    </div>
    @endif  
    <section class="content-header">
      <h1>
       &nbsp;
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Report</a></li>
        <li class="active">Stock Report</li>
      </ol>
    </section>
   
  <section class="content">
   <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock Report</h3><a href="{{url('download_item')}}" class="panel-title" style="margin-left: 82%;color: #dc3d59;"><span class="fa fa-plus-square"></span> Download</a>
            </div>
             <?php $x = 1; ?>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead>
                <tr>
                  <th style="width:50px;">Sr.No</th>
                  <th>Item Name</th>
                  <th>Stock</th>
                  
                </tr>
                </thead>
                <tbody>
                    @foreach($item_data as $s)
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{$s->item_name}}</td>
                            <td>{{$s->item_stock}}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
 </div>   
  </section>
 
<!-- END PAGE CONTENT WRAPPER -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
    
    $(".delete").on("click",function(){
        return confirm('Are you sure to delete');
    });
    
});
$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
