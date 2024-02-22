@extends('panel.layout.app')
@section('title', 'Other Resource')

@section('content')
<div class="page-header">
    <div class="container-fluid px-16 max-lg:px-10">
        <div class="row g-2 items-center">
            <div class="col">
                <div class="page-pretitle">
                    {{__('Other AI Lists')}}
                </div>
                <h2 class="page-title mb-[22px]">
                    {{__('Other Resources')}}
                </h2>

                <ul
                    class="flex flex-wrap items-center m-0 p-0 list-none text-[13px] text-[#2B2F37] gap-[20px] max-sm:gap-[10px]">
                    <li>
                        <button data-filter-trigger="all"
                            class="inline-flex leading-none p-[0.3em_0.65em] rounded-full bg-[transparent] border-0 text-inherit hover:no-underline hover:bg-[#f2f2f4] transition-colors [&.active]:bg-[#f2f2f4] dark:text-[--tblr-muted] dark:[&.active]:bg-[--lqd-faded-out] dark:[&.active]:text-[--lqd-heading-color] active">
                            {{__('All')}}
                        </button>
                    </li>

                    <li>
                        <button data-filter-trigger="image"
                            class="inline-flex leading-none p-[0.3em_0.65em] rounded-full bg-[transparent] border-0 text-inherit hover:no-underline hover:bg-[#f2f2f4] transition-colors [&.active]:bg-[#f2f2f4] dark:text-[--tblr-muted] dark:[&.active]:bg-[--lqd-faded-out] dark:[&.active]:text-[--lqd-heading-color]">
                            {{__('image')}}
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div
    class="page-body mt-2 relative after:h-px after:w-full after:bg-[var(--tblr-body-bg)] after:absolute after:top-full after:left-0 after:-mt-px">
    <div class="container-fluid">
        <div class="row">
            <div data-filter="image"
                class="col-lg-4 col-xl-3 col-md-6 pt-8 pb-10 px-16 relative border-[1px] border-solid border-t-0 border-s-0 border-[var(--tblr-border-color)] group max-xl:px-10">
                <a href="{{route('dashboard.user.openai.generator', 'ai_image_generator')}}">
                    <span
                        class="avatar w-[43px] h-[43px] mb-[18px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg"
                        style="background: #A3D6C2">

                        <span class="inline-block transition-all duration-300 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M430 896V356H200V256h560v100H530v540H430Z" />
                            </svg>
                        </span>

                        <span class="badge bg-green !w-[9px] !h-[9px]"></span>

                    </span>
                    <div>
                        <h4 class="inline-block text-[17px] font-semibold mb-[0.85em] relative">
                            {{__('AI Image Generator')}}
                            <span
                                class="inline-block align-bottom absolute top-1/2 start-[calc(100%+0.35rem)] -translate-y-1/2 -translate-x-1 opacity-0 transition-all group-hover:!opacity-100 group-hover:translate-x-0 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 8h.01"></path>
                                    <path
                                        d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                    </path>
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                </svg>
                            </span>
                        </h4>
                        <div class="text-muted">
                            {{__('Create stunning images in seconds.
                            with AI Image Generator')}}
                        </div>
                    </div>
                    <a onclick="return favoriteTemplate(1);" id="favorite_area_1"
                        class="btn inline-flex items-center justify-center w-[34px] h-[34px] p-0 absolute top-4 right-4 z-3">

                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>

                </a>
            </div>
            <div data-filter="image"
                class="col-lg-4 col-xl-3 col-md-6 pt-8 pb-10 px-16 relative border-[1px] border-solid border-t-0 border-s-0 border-[var(--tblr-border-color)] group max-xl:px-10">
                <a href="{{route('dashboard.user.openai.generator', 'ai_speech_to_text')}}">
                    <span
                        class="avatar w-[43px] h-[43px] mb-[18px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg"
                        style="background: #A3D6C2">

                        <span class="inline-block transition-all duration-300 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M430 896V356H200V256h560v100H530v540H430Z" />
                            </svg>
                        </span>

                        <span class="badge bg-green !w-[9px] !h-[9px]"></span>

                    </span>
                    <div>
                        <h4 class="inline-block text-[17px] font-semibold mb-[0.85em] relative">
                            {{__('AI Speech to Text')}}
                            <span
                                class="inline-block align-bottom absolute top-1/2 start-[calc(100%+0.35rem)] -translate-y-1/2 -translate-x-1 opacity-0 transition-all group-hover:!opacity-100 group-hover:translate-x-0 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </h4>
                        <div class="text-muted">
                            {{__('The AI app that turns audio speech into text with ease.')}}
                        </div>
                    </div>
                    <a onclick="return favoriteTemplate(1);" id="favorite_area_1"
                        class="btn inline-flex items-center justify-center w-[34px] h-[34px] p-0 absolute top-4 right-4 z-3">

                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>

                </a>
            </div>


            <div data-filter="image"
                class="col-lg-4 col-xl-3 col-md-6 pt-8 pb-10 px-16 relative border-[1px] border-solid border-t-0 border-s-0 border-[var(--tblr-border-color)] group max-xl:px-10">
                <a href="{{route('dashboard.user.openai.generator', 'ai_voiceover')}}">
                    <span
                        class="avatar w-[43px] h-[43px] mb-[18px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg"
                        style="background: #A3D6C2">

                        <span class="inline-block transition-all duration-300 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M430 896V356H200V256h560v100H530v540H430Z" />
                            </svg>
                        </span>

                        <span class="badge bg-green !w-[9px] !h-[9px]"></span>

                    </span>
                    <div>
                        <h4 class="inline-block text-[17px] font-semibold mb-[0.85em] relative">
                            {{__('AI Voiceover')}}
                            <span
                                class="inline-block align-bottom absolute top-1/2 start-[calc(100%+0.35rem)] -translate-y-1/2 -translate-x-1 opacity-0 transition-all group-hover:!opacity-100 group-hover:translate-x-0 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </h4>
                        <div class="text-muted">
                            {{__('The AI app that turns text into audio speech with ease.')}}
                        </div>
                    </div>
                    <a onclick="return favoriteTemplate(1);" id="favorite_area_1"
                        class="btn inline-flex items-center justify-center w-[34px] h-[34px] p-0 absolute top-4 right-4 z-3">

                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>

                </a>
            </div>

            <div data-filter="image"
                class="col-lg-4 col-xl-3 col-md-6 pt-8 pb-10 px-16 relative border-[1px] border-solid border-t-0 border-s-0 border-[var(--tblr-border-color)] group max-xl:px-10">
                <a href="{{route('dashboard.user.openai.generator', 'ai_code_generator')}}">
                    <span
                        class="avatar w-[43px] h-[43px] mb-[18px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg"
                        style="background: #A3D6C2">

                        <span class="inline-block transition-all duration-300 group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M430 896V356H200V256h560v100H530v540H430Z" />
                            </svg>
                        </span>

                        <span class="badge bg-green !w-[9px] !h-[9px]"></span>

                    </span>
                    <div>
                        <h4 class="inline-block text-[17px] font-semibold mb-[0.85em] relative">
                            {{__('AI Code Generator')}}
                            <span
                                class="inline-block align-bottom absolute top-1/2 start-[calc(100%+0.35rem)] -translate-y-1/2 -translate-x-1 opacity-0 transition-all group-hover:!opacity-100 group-hover:translate-x-0 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </span>
                        </h4>
                        <div class="text-muted">
                            {{__('Generate high quality code in seconds.')}}
                        </div>
                    </div>
                    <a onclick="return favoriteTemplate(1);" id="favorite_area_1"
                        class="btn inline-flex items-center justify-center w-[34px] h-[34px] p-0 absolute top-4 right-4 z-3">

                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99989 11.8333L3.88522 13.9966L4.67122 9.41459L1.33789 6.16993L5.93789 5.50326L7.99522 1.33459L10.0526 5.50326L14.6526 6.16993L11.3192 9.41459L12.1052 13.9966L7.99989 11.8333Z"
                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>

                </a>
            </div>

        </div>

    </div>
</div>


@endsection

@section('script')
<script src="/assets/js/panel/openai_list.js"></script>
@endsection