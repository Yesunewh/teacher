@extends('panel.layout.app')
@section('title', 'Update License Type')

@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="container-xl">
            <div class="row g-2 items-center">
                <div class="col">
                    <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}" class="page-pretitle flex items-center">
                        <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z"/>
                        </svg>
                        {{__('Back to dashboard')}}
                    </a>
                    <h2 class="page-title mb-2">
                        {{__('Upgrade License')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body    -->
    <div class="page-body pt-6">
        <div class="container-xl">
        @if($settings_two->liquid_license_type == "Regular License")
            <div class="bg-orange-100 text-orange-600 rounded-xl !p-3 !mt-2 dark:bg-orange-600/20 dark:text-orange-200 text-center">
                {{ __('Your are using Regular License. Please upgrade to Extended License.') }} 
                <br>
                <a href="https://magicaidocs.liquid-themes.com/upgrading-to-extended-license/" target="_blank">{{__('How can i upgrade?')}}</a>
            </div>
        @elseif($settings_two->liquid_license_type == "Extended License")
            <div class="bg-green-100 text-green-600 rounded-xl !p-3 !mt-2 dark:bg-green-600/20 dark:text-green-200 text-center">
                {{ __('Your are using Extended License.') }}
            </div>
        @endif
        </div>
        {{-- @include('vendor.installer.magicai_c4st_Act') --}}
    </div>
    
@endsection
