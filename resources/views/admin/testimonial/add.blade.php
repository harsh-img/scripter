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
                            <a class="btn-primary" href="{{ url('admin/testimonial/list')}}">
                                <i class="fa fa-list"></i> Testimonials List
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
						<form id="form" action="{{ route('admin.testimonial.add') }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						<input type="hidden" name="id" value="@if(!empty($result)){{$result['id']}}@else{{ 0 }}@endif"  required />												
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Title <label class="text-danger">*</label></label>
										<input type="text" name="title" required  class="form-control" placeholder="Enter Title" value="@if(!empty($result)){{ $result['title'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>   
                        <div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName"> Description<label class="text-danger">*</label></label>
										<textarea id="summernote" type="text" name="desc" required  class="form-control" placeholder="Enter Description" >@if(!empty($result)){{ $result['desc'] }}@endif</textarea> 
									</div>
								</div>
							</div>
						</div>                        
                        <div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Image <label class="text-danger">*</label></label>
										<input type="file" name="images[]" @if(!$result) required @endif  data-type="single" data-image-preview="product" multiple class="form-control image" accept="image/*">
										<p style="color:red;width:100%">Size must be 800*800 px</p>
									</div>
								</div>
								<div class="form-group previewimages col-md-6" id="product">
									@if($result)
										<img src="{{ asset('uploads/testimonials/'.$result->image) }}" style="width: 100px;border:1px solid #222;margin-right: 13px" />
										<input type="hidden" name="old_image" value="{{ $result->image }}" />
									@endif
								</div>
							</div>
						</div>

						
						<div class="col-lg-12 p-t-20 text-center">
							@if(empty($result)) 
								<button type="reset" class="btn btn-danger waves-effect">Reset</button>
							@endif
							<button style="background:#353c48;" type="submit" class="btn btn-primary waves-effect m-r-15" >@if(!empty($result)) Update @else Submit @endif</button> 
						</div>
					</form>
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
					{id: "{{$image}}", src: "{{ asset('uploads/testimonials')}}/{{$image}}"},
				@endforeach
		@endif
		
	];

	$('.input-images').imageUploader({
		extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
		mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
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