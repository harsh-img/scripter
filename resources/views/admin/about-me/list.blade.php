@extends('layouts/master')

@section('title',__('Brand List'))

@section('content')

<section class="content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i>  Go To</h2>
					</div>
					<div class="body">
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" href="{{ url('admin/catalog/brand/add') }}">
                                <i class="fa fa-plus"></i> Add About Me 
							</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> About Me  List</h2>
					</div>
					<div class="header">
                        <h1>Visitor Count: {{ $visitorCount }}</h1>					
                    </div>
                    <div class="body">
                        <div class="table-">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover js-basic-example contact_list dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="center sorting sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 48.4167px;" aria-sort="ascending"
                                                        aria-label="#: activate to sort column descending"># ID</th>
                                                        <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending">
                                                        Name
                                                    </th> 
                                                    <th class="center sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 126.333px;"
                                                    aria-label=" Name : activate to sort column ascending"> Who Am i
                                                     </th> 
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Image
                                                    </th> 
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 85px;"
                                                        aria-label=" Action : activate to sort column ascending"> Action
                                                    </th> 
                                                </tr>
                                            </thead>
                                            <tbody class="row_position">
												@if(!empty($result))
													@foreach($result as $key=>$value)
														<tr class="gradeX odd"  id="{{ $value->id }}">
															<td class="center">{{ $key+1}}</td>
                                                            <td class="center">{{ ucfirst($value['name']) }}</td>
                                                            <td class="center">{{ ucfirst($value['short_description']) }}</td>
															<td class="center"><img src="{{ asset('uploads/about/'.$value->image) }}" width="65px"/></td> 
															
                                                            <td class="center">
                                                        
                                                                <a title="Delete Brand" onclick="return confirm('Are you sure? You want to delete this About-Me.')" href="{{ url('admin/about-me/about-delete/'.$value['id'] )}}" class="btn btn-tbl-delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
														</tr>
													@endforeach
												@endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Name </th>	
                                                    <th class="center" rowspan="1" colspan="1"> Who Am i </th>	
                                                    <th class="center" rowspan="1" colspan="1"> Image </th>	
                                                    <th class="center" rowspan="1" colspan="1"> Action </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
   
@push('custom_js')
    
  
    
@endpush