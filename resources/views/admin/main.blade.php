<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.nav')
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<div class="row my-2">
      		<form class="col-5 row">
      			<div class="col-7">
          			<input class="form-control" placeholder="Input data ...">
      			</div>
      			<div class="col-3">
          			<button class="btn btn-success">Search</button>
      			</div>
      		</form>
      	</div>
      	
      	<div class="container row d-flex justify-content-between">
      		<button class="btn btn-success">Create</button>
      		<div class="row">
      		    <div class="row mr-2">
      				<p>1</p>/<p>2</p
      			</div>
      			<button class="btn btn-primary mx-1">Prev</button>
      			<button class="btn btn-primary mr-1">Next</button>
      		</div>
      	</div>