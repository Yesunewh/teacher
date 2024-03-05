@extends('panel.layout.app')
@section('title', 'Add Grade')

@section('content')

<div class="page-header">
    <div class="container-xl">
        <div class="row g-2 items-center justify-between max-md:flex-col max-md:items-start max-md:gap-4">
            <div class="col col-xs-12">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    {{__('Add student information.')}}
                </div>
                <h2 class="page-title mb-2">
                    {{__('Add Student
                    ')}}
                </h2>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
            <div class="col-12">
                <form action="{{ route('dashboard.teacher.studentresult') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-xs-5 col-md-3">
                            <label class="form-label">{{__('Advisor Name*')}}</label>
                            <input type="text" class="form-control" id="maximum_length" name="advisor_name"
                                placeholder="i.e abdi, melat" required>
                        </div>
                        <div class="mb-3 col-xs-6 col-md-3">
                            <label class="form-label">{{__('Advisor phone*')}}</label>
                            <input type="number" class="form-control" id="maximum_length" name="advisor_phone"
                                placeholder="09*******" required>
                        </div>
                        <div class="mb-3 col-xs-6 col-md-3">
                            <label class="form-label">{{__('Conduct*')}}</label>
                            <input type="text" class="form-control" id="maximum_length" name="conduct"
                                placeholder="i.e very good, excellent" required>
                        </div>
                        <div class="mb-3 col-xs-6 col-md-3">
                            <label class="form-label">{{__('Class Activity*')}}</label>
                            <input type="text" class="form-control" id="maximum_length" name="class_activity"
                                placeholder="i.e  good, not bad" required>
                        </div>
                        <div class="mb-3 col-xs-6 col-md-3">
                            <label class="form-label">{{__('Attendace*')}}</label>
                            <input type="number" class="form-control" id="maximum_length" name="attendance"
                                placeholder="i.e  days absent" required>
                        </div>
                        <div class="mb-3 col-xs-6 col-md-3">
                            <label class="form-label">{{__('choose semester*')}}</label>
                            <select type="text" class="form-select" name="semester" id="grade" required>
                                <option>{{__('-- choose semester --')}}</option>
                             
                                <option value="1st  semester"> 1st  semester</option>
                                <option value="2nd  semester"> 2nd  semester</option>
                                <option value="3rd  semester"> 3rd  semester</option>
                                <option value="4th  semester"> 4th  semester</option>

                            </select>
                          
                        </div>
                     
                        
                        <hr class="m-4" style="font-weight: 900">
                        <br>
                        @foreach ($student->grade->subjects->toArray() as $item)
                        <div class="mb-3 col-xs-6 col-md-6">
                            <div class="row">
                                <div class="mb-3 col-xs-6 col-md-4">
                                    <label class="form-label">{{ $item['name']}}*</label>
                                    <input type="number" class="form-control subject-result" name="subject_result[]"  required>
                                </div>
                                <div class="mb-3 col-xs-6 col-md-4">
                                    <label class="form-label">{{__('choose assessment type*')}}</label>
                                    <select type="text" class="form-select" name="assessment" id="assessment" required>
                                        <option>{{__('choose assessment')}}</option>
                                     
                                        <option value="Test"> Test</option>
                                        <option value="Quiz"> Quiz</option>
                                        <option value="assignment"> assignment</option>
                                        <option value="Mid-exam"> Mid-exam</option>
                                        <option value="Final-exam"> Final-exam</option>
                                        <option value="Other-Activity">Other-Activity </option>
                                    </select>
                                  
                                </div>
                                <div class="mb-3 col-xs-6 col-md-4">
                                    <label class="form-label">{{__('Percent*')}}</label>
                                    <input type="number" class="form-control percent" name="percent[]"  required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="subject_id[]" value="{{ $item['id'] }}">

                    @endforeach
                    
                    <hr>
                    
                    <div class="mb-3 col-xs-6 col-md-3">
                        <label class="form-label">{{__('Total Percent*')}}</label>
                        <input type="text" class="form-control total-percent" id="total_percent" name="total_percent" placeholder="" required readonly style="background-color: rgb(239, 233, 233)">
                    </div>
                    
                    <div class="mb-3 col-xs-6 col-md-3">
                        <label class="form-label">{{__('Total Result*')}}</label>
                        <input type="text" class="form-control total-result" id="total_result"  name="total_result" placeholder="" required readonly style="background-color: rgb(239, 233, 233)">
                    </div>
                    
                    <hr>
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                
                      
                        <div class="col-xs-12 col-4 mt-4">
                            <button id="openai_generator_button"
                                class="btn btn-primary w-100 py-[0.75em] flex items-center group" type="submit">
                                <span class="hidden group-[.lqd-form-submitting]:inline-flex">{{__('Please
                                    wait...')}}</span>
                                <span class="group-[.lqd-form-submitting]:hidden">{{__('Save')}}</span>
                            </button>
                        </div>
                    </div>
                </form>

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
    // Calculate total result and total percent
    $(document).ready(function () {
        $('.subject-result, .percent').on('input', function () {
            var totalResult = 0;
            var totalPercent = 0;

            $('.subject-result').each(function () {
                var subjectResult = parseFloat($(this).val());
                if (!isNaN(subjectResult)) {
                    totalResult += subjectResult;
                }
            });

            $('.percent').each(function () {
                var percent = parseFloat($(this).val());
                if (!isNaN(percent)) {
                    totalPercent += percent;
                }
            });

            $('#total_result').val(totalResult);
            $('#total_percent').val(totalPercent);
        });
    });
</script>
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