@extends('panel.layout.app')
@section('title', 'Assessment Builder')

@section('content')

<div class="page-header">
    <div class="container-xl">
        <div class="row g-2 items-center justify-between max-md:flex-col max-md:items-start max-md:gap-4">
            <div class="col col-xs-12">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    {{__('Add subject for specific class.')}}
                </div>
                <h2 class="page-title mb-2">
                    {{__('Add Subject
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
            <div class="col-12">
                <div class="row">
                 
                    



                    <div class="mb-3 col-xs-6 col-md-6">
                        <label class="form-label">{{__('Grade*')}}</label>
                        <select type="text" class="form-select" name="grade" id="grade" required>
                            <option>{{__('-- Select Student Grade --')}}</option>
                            @foreach ($grade as $item)
    
<option value="{{ $item->id }}">{{ $item->name}}</option>
@endforeach

                        </select>
                    </div>
                 
                    <div class="mb-3 col-xs-6 col-md-6">
                        <label class="form-label">{{__('Class/Section*')}}</label>
                        <select type="text" class="form-select" name="class" id="class" required>

                            <option>{{__('-- Select Student class --')}}</option>
                            @foreach ($section as $item)
    
                            <option value="{{ $item->id }}">{{ $item->name}}</option>
                            @endforeach
                          
                        </select>
                    </div>
                    @foreach ($subject as $item)
                        
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="subject" value="{{ $item->id }}"
                            >
                            <label class="form-check-label" for="mySwitch">{{ $item->name }}</label>
                        </div>
                    </div>
                    @endforeach
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Science</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Amharic</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Creative Arts</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Mathematics</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Civic and Ethical Education</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Physics</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Chemistry</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Biology</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Geography</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">History</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Information Technology (IT)</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Economics</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Business Studies</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Afaan Oromo</label>
                        </div>
                    </div>
                    <div class="mb-3 col-xs-6 col-md-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                >
                            <label class="form-check-label" for="mySwitch">Drawing</label>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-xs-12 col-4 mt-4">
                <button id="openai_generator_button"
                    class="btn btn-primary w-100 py-[0.75em] flex items-center group" type="submit">
                    <span class="hidden group-[.lqd-form-submitting]:inline-flex">{{__('Please
                        wait...')}}</span>
                    <span class="group-[.lqd-form-submitting]:hidden">{{__('Save')}}</span>
                </button>
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