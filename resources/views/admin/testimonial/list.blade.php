@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update 
	@else
		Add 
	@endif
	Testimonials
@endsection
@push('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link href="{{ asset('admin-assets/dragimage/dist/image-uploader.min.css')}}" rel="stylesheet"> 

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

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
                            <a class="btn-primary" href="{{ url('admin/testimonial/add')}}">
                                <i class="fa fa-list"></i> Add Testimonials 
							</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Testimonials</h2>
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
                                                 style="width: 85px;"
                                                 aria-label=" Image : activate to sort column ascending"> Image
                                              </th>
                                              <th class="center sorting" tabindex="0"
                                                 aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                 style="width: 126.333px;"
                                                 aria-label=" Status : activate to sort column ascending"> Status
                                              </th>
                                              <th class="center sorting" tabindex="0"
                                                 aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                 style="width: 193.017px;"
                                                 aria-label=" Description : activate to sort column ascending"> Description
                                              </th>
                                              
                                              <th class="center sorting" tabindex="0"
                                              aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                              style="width: 85px;"
                                              aria-label=" Title : activate to sort column ascending"> Title
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
                                              <td class="center"><img src="{{ asset('uploads/testimonials/'.$value->image) }}" width="65px"/></td>
                                              <td class="center">
                                                 <div class="switch mt-3">
                                                    <label>
                                                    <input type="checkbox" class="-change3" data-id="{{ $value['id'] }}"@if($value['status']=='Active'){{ 'checked' }} @endif>
                                                    <span class="lever switch-col-red layout-switch"></span>
                                                    </label>
                                                 </div>
                                              </td>
                                              <td class="center">{!!$value->desc!!}</td>
                                              <td class="center">{{$value->title}}</td>

                                              <td class="center">
                                                 <a href="{{ url('admin/testimonial/update/'.$value['id'] )}}" title="Edit Testimonial" class="btn btn-tbl-edit">
                                                 <i class="fas fa-pencil-alt"></i>
                                                 </a>
                                                 
                                                 <a title="Delete Testimonial" onclick="return confirm('Are you sure? You want to delete this testimonial.')" href="{{ url('admin/testimonial/delete/'.$value['id'] )}}" class="btn btn-tbl-delete">
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
                                              <th class="center" rowspan="1" colspan="1"> Image </th>
                                              <th class="center" rowspan="1" colspan="1"> Status </th>
                                              <th class="center" rowspan="1" colspan="1"> Description</th>
                                              <th class="center" rowspan="1" colspan="1"> Title</th>
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
<script type="text/javascript" src="{{ asset('admin-assets/dragimage/dist/image-uploader.min.js')}}"></script>
<script type="text/javascript">

	let preloaded = [
		@if(!empty($result->image))
			
			@php $images = explode(',',$result->image);  @endphp 
				@foreach($images as $key=>$image)
					{id: "{{$image}}", src: "{{ asset('uploads/package')}}/{{$image}}"},
				@endforeach
		@endif
		
	];

	$('.input-images').imageUploader({
		extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
		mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']
		preloaded: preloaded,
		imagesInputName: 'uploadfile',
		preloadedInputName: 'images',
		maxSize: 2  1024  1024,
		maxFiles: 10
	});
	
	$(function() {
		$( ".uploaded" ).sortable({
			update: function() {
			}
		});
	});

	function resetFormData(){ 
		$('.image-uploader').removeClass('has-files');
		$('.uploaded').html('');
	}
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
	$('#summernote').summernote({
		placeholder: 'Enter Description',
		tabsize: 2,
		height: 200,
	});
</script>
@endpush
@push('custom_js')
<script>
   $('.-change3').change(function() {
   
       var status = $(this).prop('checked') == true ? 'Active' : 'De-Active'; // .prop will check property value of status
       var id = $(this).data('id');
       $.ajax({
           type: "POST",
           dataType: "json",
           url: "{{ route('admin.testimonial.changestatus') }}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data: {
               'status': status, 
               'id': id
           },
           beforeSend:function(){
               $('#preloader').css('display','block');
           },
           error:function(xhr,textStatus){
   
               if(xhr && xhr.responseJSON.message){
                     sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                     }else{
                     sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
                     }
                                 $('#preloader').css('display','none');
                           },
                           success: function(data){
                     $('#preloader').css('display','none');
                                 sweetAlertMsg('success',data.message);
                           }
                        });
   });
   
</script>  
<script type="text/javascript">
   $(".row_position").sortable({
       delay: 150,
       stop: function() {
           var selectedData = new Array();
           $(".row_position>tr").each(function() {
               selectedData.push($(this).attr("id"));
           });
           updateOrder(selectedData);
       }
   });
   
   function updateOrder(aData) {        
       $.ajax({
           url: "{{ route('admin.testimonial.change-order') }}",
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
           type: 'POST',
           data: {
               allData: aData
           },
           success: function() {
               swal("Success!", "Your change successfully saved", "success");
           }
       });
   }
</script>
@endpush
