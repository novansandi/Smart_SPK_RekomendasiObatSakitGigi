@extends('templates.new')
@section('css')
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keluhan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Keluhan</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
              	<div class="col-sm-6 pt-2">
              		<h3 class="card-title">List Data Keluhan</h3>
              	</div>
              	<div class="col-sm-6" align="right">
              		<a style="cursor: pointer;"  data-toggle="modal" data-target="#kriteriaModal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
              	</div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($message=Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="alert-text">{{ucwords($message)}}</div>
                    </div>
               @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->updated_at}}</td>
                  <td>
                  	<a  data-toggle="modal" data-target="#kriteriaModalEdit{{$item->id}}"
                  	    style="color: black;cursor: pointer;" 
                  	    class="fa fa-edit btn btn-warning btn-sm"> 
                  		Edit
                  	</a> &nbsp;
                  	<a  href="{{url('keluhan_delete/'.$item->id)}}" 
                  		style="color: black;" 
                  	    class="fa fa-edit btn-danger btn-sm" 	
                  	    onclick="return confirm('Yakin menghapus data?')"> 
                  		Hapus
                  	</a>
                  </td>
                </tr>  

                <div class="modal fade" id="kriteriaModalEdit{{$item->id}}" tabindex="-1" aria-labelledby="kriteriaModalEdit{{$item->id}}" aria-hidden="true" data-backdrop="static">
					<div class="modal-dialog modal-xl">
				        <div class="modal-content">
				            <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLabel">Update Data Kriteria</h5>
				             	<button type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
				             </div>
				           <form action="{{url('keluhan_update/'.$item->id)}}" method="POST">
				              @csrf
				             <div class="modal-body">
				                 <div class="input-group mb-3">
				                      <button style="min-width: 122px;" class="btn btn-primary" disabled type="button">Nama</button>
				                      <input required type="text" name="nama" value="{{$item->nama}}" class="form-control" placeholder="Contoh : Nyeri">
				                 </div>
				             </div>
				            <div class="modal-footer">
				                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                 <button type="submit" class="btn btn-primary">Save</button>
				            </div>
				        </form>
				      </div>
				   </div>
				</div>  
                @endforeach            
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModal" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
             	<button type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
             </div>
           <form action="{{url('keluhan_store')}}" method="POST">
              @csrf
             <div class="modal-body">
                 <div class="input-group mb-3">
                      <button style="min-width: 122px;" class="btn btn-primary" disabled type="button">Nama</button>
                      <input required type="text" name="nama" class="form-control" placeholder="Contoh : Nyeri">
                 </div>
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
   </div>
</div>
@endsection

@section('script')


@endsection