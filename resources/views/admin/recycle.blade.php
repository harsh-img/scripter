@extends('layouts/master')

@section('title',__('Recycle List'))

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i>Recycle List</h2>
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
                                                        Module Name
                                                    </th> 
                                                    <th class="center sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 126.333px;"
                                                    aria-label=" Name : activate to sort column ascending"> Deleted Name
                                                     </th> 
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Restore
                                                    </th> 
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 85px;"
                                                        aria-label=" Action : activate to sort column ascending"> Action
                                                    </th> 
                                                </tr>
                                            </thead>
                                            <tbody class="row_position">
												@if(!empty($daletedata))
													@foreach($daletedata as $key=>$value)

                                                    @php
                                                    if($value['about_id'])
                                                        $data = \App\Helpers\commonHelper::getaboutinfo($value['about_id']);
                                                    else
                                                        $data = \App\Helpers\commonHelper::getaboutinfo($value['testimonial_id']);
                                                    @endphp
                                                    
														<tr class="gradeX odd"  id="recycle{{ $value->id }}">
															<td class="center">{{ $key+1}}</td>
                                                            <td class="center">{{ $data['moduleName'] }}</td>                                                            
                                                            <td class="center">{{  $data['name'] }}</td>                                                            
                                                            <td class="center">
                                                                <button class="restore-button" data-restoreid="{{ $value->id }}" data-id="@if($value->about_id){{$value->about_id}}@else{{$value->testimonial_id}}@endif">Restore</button>
                                                             </td>															
                                                            <td class="center">
                                                        
                                                                <a title="Delete Brand" onclick="return confirm('Are you sure? You want to delete this About-Me.')" href="{{ url('admin/permanent-delete/'.$value['id'] )}}" class="btn btn-tbl-delete">
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
                                                    <th class="center" rowspan="1" colspan="1"> Module Name </th>	
                                                    <th class="center" rowspan="1" colspan="1"> Deleted Name </th>	
                                                    <th class="center" rowspan="1" colspan="1"> Restore </th>	
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
    
<script>
  

    $(document).ready(function() {
        $('.restore-button').on('click', function() {
            var id = $(this).data('id');
            var restoreid = $(this).data('restoreid');
           
            $.ajax({
                url: "{{ route('admin.restore') }}",
                method: 'POST',
                data: {' id': id , 'getId':restoreid },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                    $('#recycle'+restoreid).remove();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    
 </script>  
    
@endpush