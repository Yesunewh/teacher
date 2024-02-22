@extends('panel.layout.app')
@section('title', 'List of generators')

@section('content')
<div class="page-header">
	<div class="container-fluid px-16 max-lg:px-10">
		<div class="row g-2 items-center">
			<div class="col">
				<div class="page-pretitle">
					{{__('Tools for Curriculum Creator using AI')}}
				</div>
				<h2 class="page-title mb-[22px]">
					{{__('Curriculum Creator')}}
				</h2>


			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div
	class="page-body mt-2 relative after:h-px after:w-full after:bg-[var(--tblr-body-bg)] after:absolute after:top-full after:left-0 after:-mt-px">
	<div class="container-fluid">
		<div class="row">

			@php
			$plan = Auth::user()->activePlan();
			$plan_type = 'regular';

			if ( $plan != null ) {
			$plan_type = strtolower($plan->plan_type);
			}
			@endphp

			@foreach($list as $item)
			@if ($item->filters == 'Curriculum')

			@if($item->active != 1)
			@continue
			@endif
			@php
			$upgrade = false;
			if (Auth::user()->type != 'admin' && $item->premium == 1 && $plan_type === 'regular' ){
			$upgrade = true;
			}
			@endphp
			<div
				class="col-lg-4 col-xl-3 col-md-6 pt-8 pb-10 px-10 relative border-[1px] border-solid border-t-0 border-s-0 border-[var(--tblr-border-color)] group max-xl:px-10 ">
				<span class="avatar w-full h-[43px] mb-[18px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg rounded-md overflow-hidden" style="background: {{$item->color}}">
					@if ($item->image !== 'none')
					  <span class="inline-block  text-gray-900  transition-all duration-300 group-hover:scale-140">
						{!! html_entity_decode($item->image) !!}
					  </span>
					@endif
					@if ($item->active == 1)
					  <span class="badge bg-green !w-[9px] !h-[9px]"></span>
					@else
					  <span class="badge bg-red !w-[9px] !h-[9px]"></span>
					@endif
					<h4 class="w-full text-center py-2 text-gray-900 text-sm font-bold uppercase tracking-wide mt-1">{{__($item->title)}}</h4>
				  </span>
				<div>
					
					<div class="text-muted">
						{{__($item->description)}}
					</div>
				</div>
				@if($item->active == 1)
		
				<a onclick="return favoriteTemplate({{$item->id}});" id="favorite_area_{{$item->id}}"
					class="btn inline-flex items-center justify-center w-[34px] h-[34px] p-0 absolute right-4 z-3">
					@if(!isFavorited($item->id))
					<svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
							stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					@else
					<svg width="16" height="15" viewBox="0 0 16 15" fill="currentColor"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
							stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					@endif
				</a>
				
				<div
					class="absolute top-0 left-0 w-full h-full transition-all z-2 @if($upgrade) bg-white opacity-75 dark:!bg-black @endif">
					
				
					@if($item->type == 'text' or $item->type == 'code')
					@if ($item->slug == "ai_article_wizard_generator")
					@if(Auth::user()->remaining_words > 0 or Auth::user()->remaining_words == -1)
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.articlewizard.new')) }}"
						class="inline-block w-full h-full absolute top-0 left-0 overflow-hidden -indent-[99999px]">
						{{__('Create Workbook')}}
					</a>
					@endif
					@else
					@if(Auth::user()->remaining_words > 0 or Auth::user()->remaining_words == -1)
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.generator.workbook', $item->slug)) }}"
						class="inline-block w-full h-full absolute top-0 left-0 overflow-hidden -indent-[99999px]">
						{{__('Create Workbook')}}
					</a>
					@endif
					@endif
					@elseif($item->type == 'voiceover')
					@if(Auth::user()->remaining_words > 0 or Auth::user()->remaining_words == -1)
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.generator', $item->slug)) }}"
						class="inline-block w-full h-full absolute top-0 left-0 overflow-hidden -indent-[99999px]">
						{{__('Create Workbook')}}
					</a>
					@endif
					@elseif($item->type == 'image')
					@if(Auth::user()->remaining_images > 0 or Auth::user()->remaining_images == -1)
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.generator', $item->slug)) }}"
						class="inline-block w-full h-full absolute top-0 left-0 overflow-hidden -indent-[99999px]">
						{{__('Create')}}
					</a>
					@endif
					@elseif($item->type == 'audio')
					@if(Auth::user()->remaining_words>0 or Auth::user()->remaining_words == -1)
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.generator', $item->slug)) }}"
						class="inline-block w-full h-full absolute top-0 left-0 overflow-hidden -indent-[99999px]">
						{{__('Create')}}
					</a>
					@endif
					@else
					<div
						class="flex items-center justify-center absolute inset-0 bg-zinc-900 bg-opacity-5 backdrop-blur-[1px]">
						<a href="#" disabled="" class="bg-white pointer-events-none btn text-dark cursor-default">
							{{__('No Tokens Left')}}
						</a>
					</div>
					@endif
				</div>
				@endif
			</div>
			@endif

			@endforeach
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="/assets/js/panel/openai_list.js"></script>
@endsection

{{--
@extends('panel.layout.app')
@section('title', 'Curriculum Creator')

@section('content') --}}

{{-- <div class="page-header">
	<div class="container-xl">
		<div class="row g-2 items-center justify-between max-md:flex-col max-md:items-start max-md:gap-4">
			<div class="col col-xs-12">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					{{__('Tools for Curriculum Creator using AI')}}
				</div>
				<h2 class="page-title mb-2">
					{{__('Curriculum Creator')}}
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto">
				<div class="btn-list">
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.documents.all') ) }}"
						class="btn">
						{{__('My Documents')}}
					</a>
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.list') ) }}"
						class="btn btn-primary">
						<svg xmlns="http://www.w3.org/2000/svg" class="!me-2" width="18" height="18" viewBox="0 0 24 24"
							stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
							stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M12 5l0 14" />
							<path d="M5 12l14 0" />
						</svg>
						{{__('New')}}
					</a>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<!-- Page body -->
{{--
<div class="page-body">

	<div class="container-xl ">


		<div class="row row-deck row-cards max-xl:[--tblr-gutter-y:1.5rem]">
			<a href="{{route('dashboard.teacher.syllabus')}}" class="col-sm-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="avatar bg-white dark:!bg-[rgba(255,255,255,0.05)]"> --}}
									{{-- <svg width="12" height="20" viewBox="0 0 12 20" fill="none"
										stroke="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M10.7 6C10.501 5.43524 10.1374 4.94297 9.65627 4.58654C9.17509 4.23011 8.59825 4.02583 8 4H4C3.20435 4 2.44129 4.31607 1.87868 4.87868C1.31607 5.44129 1 6.20435 1 7C1 7.79565 1.31607 8.55871 1.87868 9.12132C2.44129 9.68393 3.20435 10 4 10H8C8.79565 10 9.55871 10.3161 10.1213 10.8787C10.6839 11.4413 11 12.2044 11 13C11 13.7956 10.6839 14.5587 10.1213 15.1213C9.55871 15.6839 8.79565 16 8 16H4C3.40175 15.9742 2.82491 15.7699 2.34373 15.4135C1.86255 15.057 1.49905 14.5648 1.3 14"
											stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M6 1V4M6 16V19" stroke-width="1.5" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg> --}}
									{{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
										<path
											d="M10 5.25C9.58579 5.25 9.25 5.58579 9.25 6C9.25 6.41421 9.58579 6.75 10 6.75V5.25ZM16 6.75C16.4142 6.75 16.75 6.41421 16.75 6C16.75 5.58579 16.4142 5.25 16 5.25V6.75ZM10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 14.4142 9.58579 14.75 10 14.75V13.25ZM16 14.75C16.4142 14.75 16.75 14.4142 16.75 14C16.75 13.5858 16.4142 13.25 16 13.25V14.75ZM10 9.25C9.58579 9.25 9.25 9.58579 9.25 10C9.25 10.4142 9.58579 10.75 10 10.75V9.25ZM22 10.75C22.4142 10.75 22.75 10.4142 22.75 10C22.75 9.58579 22.4142 9.25 22 9.25V10.75ZM10 17.25C9.58579 17.25 9.25 17.5858 9.25 18C9.25 18.4142 9.58579 18.75 10 18.75V17.25ZM22 18.75C22.4142 18.75 22.75 18.4142 22.75 18C22.75 17.5858 22.4142 17.25 22 17.25V18.75ZM3 6.75H5V5.25H3V6.75ZM5.25 7V9H6.75V7H5.25ZM5 9.25H3V10.75H5V9.25ZM2.75 9V7H1.25V9H2.75ZM3 9.25C2.86193 9.25 2.75 9.13807 2.75 9H1.25C1.25 9.9665 2.0335 10.75 3 10.75V9.25ZM5.25 9C5.25 9.13807 5.13807 9.25 5 9.25V10.75C5.9665 10.75 6.75 9.9665 6.75 9H5.25ZM5 6.75C5.13807 6.75 5.25 6.86193 5.25 7H6.75C6.75 6.0335 5.9665 5.25 5 5.25V6.75ZM3 5.25C2.0335 5.25 1.25 6.0335 1.25 7H2.75C2.75 6.86193 2.86193 6.75 3 6.75V5.25ZM3 14.75H5V13.25H3V14.75ZM5.25 15V17H6.75V15H5.25ZM5 17.25H3V18.75H5V17.25ZM2.75 17V15H1.25V17H2.75ZM3 17.25C2.86193 17.25 2.75 17.1381 2.75 17H1.25C1.25 17.9665 2.0335 18.75 3 18.75V17.25ZM5.25 17C5.25 17.1381 5.13807 17.25 5 17.25V18.75C5.9665 18.75 6.75 17.9665 6.75 17H5.25ZM5 14.75C5.13807 14.75 5.25 14.8619 5.25 15H6.75C6.75 14.0335 5.9665 13.25 5 13.25V14.75ZM3 13.25C2.0335 13.25 1.25 14.0335 1.25 15H2.75C2.75 14.8619 2.86193 14.75 3 14.75V13.25ZM10 6.75H16V5.25H10V6.75ZM10 14.75H16V13.25H10V14.75ZM10 10.75H22V9.25H10V10.75ZM10 18.75H22V17.25H10V18.75Z"
											fill="currentColor"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<p class="font-weight-medium mb-1">
									{{__('Syllabus Generator')}}
								</p>

							</div>
						</div>
					</div>
				</div>
			</a>


			<a href="/dashboard/user/openai/generator/unit_planner/workbook" class="col-sm-6 col-xl-3">

				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="avatar bg-white dark:!bg-[rgba(255,255,255,0.05)]">
									<svg width="19" height="18" viewBox="0 0 19 18" fill="none"
										stroke="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M1 17V15.2222C1 14.2792 1.37707 13.3749 2.04825 12.7081C2.71943 12.0413 3.62975 11.6667 4.57895 11.6667H8.15789C9.10709 11.6667 10.0174 12.0413 10.6886 12.7081C11.3598 13.3749 11.7368 14.2792 11.7368 15.2222V17M12.6316 8.11111H18M15.3158 5.44444V10.7778M9.94737 4.55556C9.94737 6.51923 8.34502 8.11111 6.36842 8.11111C4.39182 8.11111 2.78947 6.51923 2.78947 4.55556C2.78947 2.59188 4.39182 1 6.36842 1C8.34502 1 9.94737 2.59188 9.94737 4.55556Z"
											stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</span>
							</div>
							<div class="col">
								<p class="font-weight-medium mb-1">
									{{__('Unit Planner')}}
								</p>

							</div>
						</div>
					</div>
				</div>

			</a>
		</div>



		<div class="row row-deck row-cards max-xl:[--tblr-gutter-y:1.5rem] mt-9 ">
			<a href="{{route('dashboard.teacher.activity')}}" class="col-sm-6 col-xl-3">

				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="avatar bg-white dark:!bg-[rgba(255,255,255,0.05)]">
									<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
										stroke-width="1.5" stroke="var(--lqd-heading-color)" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
										<line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
									</svg>
								</span>
							</div>
							<div class="col">
								<p class="font-weight-medium mb-1">
									{{__('Activity Generator')}}
								</p>

							</div>
						</div>
					</div>
				</div>
			</a>
			<a href="{{route('dashboard.teacher.lab')}}" class="col-sm-6 col-xl-3">

				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="avatar bg-white dark:!bg-[rgba(255,255,255,0.05)]">
									<svg width="20" height="19" viewBox="0 0 20 19" fill="none"
										stroke="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M2.90625 4.5H3.90625C4.43668 4.5 4.94539 4.28929 5.32046 3.91421C5.69554 3.53914 5.90625 3.03043 5.90625 2.5C5.90625 2.23478 6.01161 1.98043 6.19914 1.79289C6.38668 1.60536 6.64103 1.5 6.90625 1.5H12.9062C13.1715 1.5 13.4258 1.60536 13.6134 1.79289C13.8009 1.98043 13.9062 2.23478 13.9062 2.5C13.9062 3.03043 14.117 3.53914 14.492 3.91421C14.8671 4.28929 15.3758 4.5 15.9062 4.5H16.9062C17.4367 4.5 17.9454 4.71071 18.3205 5.08579C18.6955 5.46086 18.9062 5.96957 18.9062 6.5V15.5C18.9062 16.0304 18.6955 16.5391 18.3205 16.9142C17.9454 17.2893 17.4367 17.5 16.9062 17.5H2.90625C2.37582 17.5 1.86711 17.2893 1.49204 16.9142C1.11696 16.5391 0.90625 16.0304 0.90625 15.5V6.5C0.90625 5.96957 1.11696 5.46086 1.49204 5.08579C1.86711 4.71071 2.37582 4.5 2.90625 4.5Z"
											stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										<path
											d="M9.90625 13.5C11.5631 13.5 12.9062 12.1569 12.9062 10.5C12.9062 8.84315 11.5631 7.5 9.90625 7.5C8.2494 7.5 6.90625 8.84315 6.90625 10.5C6.90625 12.1569 8.2494 13.5 9.90625 13.5Z"
											stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</span>
							</div>
							<div class="col">
								<p class="font-weight-medium mb-1">
									{{__('Lab

									Assignment')}}
								</p>

							</div>
						</div>
					</div>
				</div>
		</div>




	</div>
</div>
</div> --}}

{{-- @endsection

@section('script')
<script src="/assets/js/panel/openai_list.js"></script>
@endsection --}}