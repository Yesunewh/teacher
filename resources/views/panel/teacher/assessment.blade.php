@extends('panel.layout.app')
@section('title', 'Assessment Builder')

@section('content')

<div class="page-header">
    <div class="container-xl">
        <div class="row g-2 items-center justify-between max-md:flex-col max-md:items-start max-md:gap-4">
            <div class="col col-xs-12">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    {{__('Enter the following information to get started with this tool.')}}
                </div>
                <h2 class="page-title mb-2">
                    {{__('Test Generator
                    ')}}
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
</div>
<!-- Page body -->
<div class="page-body">


    <div class="container-xl ">
        <div class="row ">
            <div class="col-6">

                <div class="mb-3 col-xs-12 col-md-12">
                    <label class="form-label">{{__('Course Title*')}}</label>
                    <input type="text" class="form-control" id="maximum_length" name="title"
                        placeholder="i.e math, english" required>
                </div>


                <div class="mb-3 col-xs-12 col-md-12">
                    <label class="form-label">{{__('Grade*')}}</label>
                    <select type="text" class="form-select" name="grade" id="grade" required>
                        <option value="kindergarten">{{__('kindergarten')}}</option>
                        <option value="Grade 1">{{__('Grade 1')}}</option>
                        <option value="Grade 2">{{__('Grade 2')}}</option>
                        <option value="Grade 3">{{__('Grade 3')}}</option>
                        <option value="Grade 4">{{__('Grade 4')}}</option>
                        <option value="Grade 5">{{__('Grade 5')}}</option>
                        <option value="Grade 6">{{__('Grade 6')}}</option>
                        <option value="Grade 7">{{__('Grade 7')}}</option>
                        <option value="Grade 8">{{__('Grade 8')}}</option>
                        <option value="Grade 9">{{__('Grade 9')}}</option>
                        <option value="Grade 10">{{__('Grade 10')}}</option>
                        <option value="Grade 11">{{__('Grade 11')}}</option>
                        <option value="Grade 12">{{__('Grade 12')}}</option>
                        <option value="Adult Education">{{__('Adult Education')}}</option>

                    </select>
                </div>
                <div class="mb-3 col-xs-12 col-md-12">
                    <label class="form-label">{{__('Subject*')}}</label>
                    <select type="text" class="form-select" name="grade" id="grade" required>

                        <option value="Language and Literature">{{__('Language and Literature')}}</option>
                        <option value="Social Sciences">{{__('Social Sciences')}}</option>
                        <option value="Mathematics and Sciences">{{__('Mathematics and Sciences')}}</option>
                        <option value="Arts and Humanities">{{__('Arts and Humanities')}}</option>
                        <option value="Physical Education and Health">{{__('Physical Education and Health')}}</option>
                        <option value="Technical and Life Skills">{{__('Technical and Life Skills')}}</option>
                        <option value="Information Technology">{{__('Information Technology')}}</option>
                    </select>
                </div>
                <div class="row ">
                    <p>What type of quation it should be?</p>
                <div class="mb-3 col-xs-12 col-md-6 ">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                            >
                        <label class="form-check-label" for="mySwitch">True Or False</label>
                    </div>
                </div>
                <div class="mb-3 col-xs-12 col-md-6 ">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                            >
                        <label class="form-check-label" for="mySwitch">Multiple Choice</label>
                    </div>
                </div>
                <div class="mb-3 col-xs-12 col-md-6 ">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                            >
                        <label class="form-check-label" for="mySwitch">Short Answer</label>
                    </div>
                </div>
                <div class="mb-3 col-xs-12 col-md-6 ">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                            >
                        <label class="form-check-label" for="mySwitch">Fill Blank</label>
                    </div>
                </div>
                </div>
                <div class="col-xs-12 mt-96">
                    <button id="openai_generator_button"
                        class="btn btn-primary w-100 py-[0.75em] flex items-center group" type="submit">
                        <span class="hidden group-[.lqd-form-submitting]:inline-flex">{{__('Please wait...')}}</span>
                        <span class="group-[.lqd-form-submitting]:hidden">{{__('Generate')}}</span>
                    </button>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6 lg:pl-16 lg:border-l lg:border-solid border-t-0 border-r-0 border-b-0 border-[var(--tblr-border-color)] [&_.tox-edit-area__iframe]:!bg-transparent"
                id="workbook_textarea">
                <div class="row text-[13px] items-center">
                    <div class="col flex items-center">
                        {{-- @if($openai->type != 'code') --}}

                        {{-- @endif --}}
                        <button
                            class="bg-transparent p-1 inline-flex items-center justify-center rounded-sm w-[30px] h-[30px] border-0 text-[13px] hover:!bg-[var(--lqd-faded-out)] transition-colors"
                            id="workbook_copy" title="{{__('Copy to clipboard')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960"
                                fill="var(--lqd-heading-color)" width="20">
                                <path
                                    d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z" />
                            </svg>
                            <span class="sr-only">{{__('Copy to clipboard')}}</span>
                        </button>
                        {{-- @if($openai->type != 'code') --}}
                        <div class="relative">
                            <button
                                class="bg-transparent p-1 inline-flex items-center justify-center rounded-sm w-[30px] h-[30px] border-0 text-[13px] hover:!bg-[var(--lqd-faded-out)] transition-colors"
                                title="{{__('Download')}}" data-bs-toggle="dropdown" tabindex="-1">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.01025 10.7186V12.3124C1.01025 12.7351 1.17817 13.1404 1.47705 13.4393C1.77594 13.7382 2.18132 13.9061 2.604 13.9061H12.1665C12.5892 13.9061 12.9946 13.7382 13.2935 13.4393C13.5923 13.1404 13.7603 12.7351 13.7603 12.3124V10.7186M10.5728 7.53113L7.38525 10.7186M7.38525 10.7186L4.19775 7.53113M7.38525 10.7186V1.15613"
                                        stroke="var(--lqd-heading-color)" stroke-width="1.25" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="sr-only">{{__('Download')}}</span>
                            </button>
                            <div
                                class="dropdown-menu dropdown-menu-end text-center whitespace-nowrap p-0 [--tblr-dropdown-min-width:150px]">
                                <div class="flex flex-col p-1 gap-1">
                                    <button
                                        class="workbook_download flex items-center gap-1 p-2 border-none rounded-md bg-[transparent] text-[12px] font-medium text-heading hover:bg-slate-100 dark:hover:bg-zinc-900"
                                        data-doc-type="doc" data-doc-name="testdoc">
                                        <svg class="shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                                        </svg>
                                        MS Word
                                    </button>
                                    <button
                                        class="workbook_download flex items-center gap-1 p-2 border-none rounded-md bg-[transparent] text-[12px] font-medium text-heading hover:bg-slate-100 dark:hover:bg-zinc-900"
                                        data-doc-type="html" data-doc-name="testdoc">
                                        <svg class="shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5z"></path>
                                            <path d="M15.5 8h-7l.5 4h6l-.5 3.5l-2.5 .75l-2.5 -.75l-.1 -.5"></path>
                                        </svg>
                                        HTML
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                        <a href="javascript:void(0);"
                            class="bg-transparent -mr-1 p-1 inline-flex items-center justify-center rounded-sm w-[30px] h-[30px] border-0 text-[13px] hover:!bg-[var(--lqd-faded-out)] transition-colors"
                            id="workbook_delete" title="{{__('Delete')}}">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_1_7315" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="20" height="20">
                                    <rect x="0.885254" width="19.0623" height="19.0623" fill="#D9D9D9" />
                                </mask>
                                <g mask="url(#mask0_1_7315)">
                                    <path
                                        d="M6.44519 10.3254H14.3878V8.73687H6.44519V10.3254ZM10.4165 17.4738C9.31778 17.4738 8.28524 17.2653 7.31888 16.8483C6.35253 16.4313 5.51193 15.8654 4.7971 15.1505C4.08226 14.4357 3.51635 13.5951 3.09936 12.6288C2.68237 11.6624 2.47388 10.6299 2.47388 9.53113C2.47388 8.4324 2.68237 7.39986 3.09936 6.43351C3.51635 5.46715 4.08226 4.62656 4.7971 3.91172C5.51193 3.19688 6.35253 2.63097 7.31888 2.21398C8.28524 1.797 9.31778 1.5885 10.4165 1.5885C11.5152 1.5885 12.5478 1.797 13.5141 2.21398C14.4805 2.63097 15.3211 3.19688 16.0359 3.91172C16.7508 4.62656 17.3167 5.46715 17.7337 6.43351C18.1506 7.39986 18.3591 8.4324 18.3591 9.53113C18.3591 10.6299 18.1506 11.6624 17.7337 12.6288C17.3167 13.5951 16.7508 14.4357 16.0359 15.1505C15.3211 15.8654 14.4805 16.4313 13.5141 16.8483C12.5478 17.2653 11.5152 17.4738 10.4165 17.4738ZM10.4165 15.8852C12.1904 15.8852 13.6928 15.2697 14.924 14.0386C16.1551 12.8075 16.7706 11.305 16.7706 9.53113C16.7706 7.75728 16.1551 6.2548 14.924 5.02369C13.6928 3.79258 12.1904 3.17703 10.4165 3.17703C8.64265 3.17703 7.14017 3.79258 5.90907 5.02369C4.67796 6.2548 4.0624 7.75728 4.0624 9.53113C4.0624 11.305 4.67796 12.8075 5.90907 14.0386C7.14017 15.2697 8.64265 15.8852 10.4165 15.8852Z"
                                        fill="#CE3A3A" />
                                </g>
                            </svg>
                            <span class="sr-only">{{__('Delete')}}</span>
                        </a>

                    </div>
                    <div id="savedDiv" class="col items-end text-end hidden">
                        <div class="outer-div">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.1718 11.1436C15.1718 13.678 13.6779 15.1719 11.1435 15.1719H5.63125C3.09046 15.1719 1.59375 13.678 1.59375 11.1436V5.61862C1.59375 3.08775 2.5245 1.59387 5.05963 1.59387H6.47629C6.98488 1.59458 7.46371 1.83329 7.76829 2.24058L8.415 3.1005C8.721 3.50708 9.19983 3.7465 9.70842 3.74721H11.713C14.2538 3.74721 15.1916 5.04062 15.1916 7.62675L15.1718 11.1436Z"
                                    stroke="#20725E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.29932 10.2447H11.4866" stroke="#20725E" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="inner-div">
                                <span>Saved to </span>
                                <a href="{{route('dashboard.user.openai.documents.all')}}"
                                    style="color: #20725E; text-decoration: underline;cursor: pointer;">Documents</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if($openai->type == 'code') --}}

                {{-- @else --}}
                <div
                    class="border-solid border-t border-r-0 border-b-0 border-l-0 border-[var(--tblr-border-color)] pt-[30px] mt-[15px]">
                    <form class="workbook-form">
                        <div class="mb-[20px]">
                            <input type="text" class="form-control rounded-md"
                                placeholder="{{__('Untitled Document...')}}">
                        </div>
                        <div class="mb-[20px]">
                            <textarea class="form-control tinymce" id="default" rows="25"></textarea>
                        </div>
                    </form>
                </div>
                {{-- @endif --}}
            </div>

        </div>
    </div>
</div>
</div>
@endsection


@section('script')
<script src="/assets/libs/tinymce/tinymce.min.js" defer></script>
<script src="/assets/js/panel/openai_generator_workbook.js"></script>
{{-- @if($setting->hosting_type != 'high') --}}
<script src="/assets/js/panel/openai_generator_workbook_low.js"></script>
{{-- @endif --}}
{{-- @if($openai->type == 'code')
<link rel="stylesheet" href="/assets/libs/prism/prism.css">
<script src="/assets/libs/prism/prism.js"></script>
@endif --}}
<script>
    const stream_type = '{!!$settings_two->openai_default_stream_server!!}';
        const openai_model = '{{$setting->openai_default_model}}';

        function sendOpenaiGeneratorForm(ev){
			"use strict";
            $('#savedDiv').addClass('hidden');

			tinyMCE?.activeEditor?.setContent('');

			ev?.preventDefault();
			ev?.stopPropagation();
			const submitBtn = document.getElementById("openai_generator_button");
			const editArea = document.querySelector('.tox-edit-area');
			const typingTemplate = document.querySelector('#typing-template').content.cloneNode( true );
			const typingEl = typingTemplate.firstElementChild;
            document.querySelector('#app-loading-indicator')?.classList?.remove('opacity-0');
            submitBtn.classList.add('lqd-form-submitting');
            submitBtn.disabled = true;

			if ( editArea ) {
				if ( !editArea.querySelector('.lqd-typing') ) {
					editArea.appendChild(typingEl);
				} else {
					editArea.querySelector('.lqd-typing')?.classList?.remove('lqd-is-hidden');
				}
			}

           

            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "/dashboard/user/openai/generate",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                  
                        // because data changing in the dom can't cache codeOutput
                        // const codeOutput = $("#code-output");
                        toastr.success('Generated Successfully!');
                        // if ( $("#code-output").length ) {
                        $("#workbook_textarea").html(data.html);
                        window.codeRaw = $("#code-output").text();
                        $("#code-output").addClass(`language-${$('#code_lang').val() || 'javascript'}`);
                        Prism.highlightElement($("#code-output")[0]);
                        // } else {
                        //     tinymce.activeEditor.destroy();
                        //     $("#workbook_textarea").html(data.html);
                        //     getResult();
                        // }
                        submitBtn.classList.remove('lqd-form-submitting');
                        document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
                        document.querySelector('#workbook_regenerate')?.classList?.remove('hidden');
                        submitBtn.disabled = false;
                   
						const typingEl = document.querySelector( '.tox-edit-area > .lqd-typing' );
                    
                        let responseText = '';
                        const message_id = data.message_id;
                        const eventSource = new EventSource( "/dashboard/user/openai/generate?message_id=" + message_id+"&maximum_length=" + data.maximum_length + "&number_of_results=" + data.number_of_results + "&creativity=" + data.creativity);
                        eventSource.onmessage = function ( e ) {
                            let txt = e.data;
							typingEl.classList.add('lqd-is-hidden');
                            if ( txt === '[DONE]' ) {
                                //This is the area when the chat ends.
                                eventSource.close();
                                submitBtn.classList.remove('lqd-form-submitting');
                                document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
                                document.querySelector('#workbook_regenerate')?.classList?.remove('hidden');
                                submitBtn.disabled = false;
                            }
                            if ( txt && txt !== '[DONE]') {
                                responseText += txt.split("/**")[0];
                                tinyMCE.activeEditor.setContent(responseText, {format: 'raw'});
                            }
                        };
                     
                            // $("#workbook_textarea").html(data.html);

                            const message_no = data.message_id;
                            const creativity = data.creativity;
                            const maximum_length = parseInt(data.maximum_length);
                            const number_of_results = data.number_of_results;
                            const prompt = data.inputPrompt;

                            return generate(message_no, creativity, maximum_length, number_of_results, prompt);

                 
                    
                    setTimeout(function(){
                        $('#savedDiv').removeClass('hidden');
                    }, 1000);
                },
                error: function (data){
					if ( data.responseJSON.errors ) {
						$.each(data.responseJSON.errors, function(index, value) {
							toastr.error(value);
						});
					} else if ( data.responseJSON.message ) {
						toastr.error(data.responseJSON.message);
					}
                    submitBtn.classList.remove('lqd-form-submitting');
					document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
					document.querySelector('#workbook_regenerate')?.classList?.add('hidden');
                    submitBtn.disabled = false;
                }
            });
            return false;
        }

        const deleteButton = document.getElementById("workbook_delete");
        deleteButton.addEventListener("click", clearWorkbookContent);
        function clearWorkbookContent() {
            const editor = tinyMCE.activeEditor;
            if (editor) {
                editor.setContent("");
            }
        }

</script>

@endsection