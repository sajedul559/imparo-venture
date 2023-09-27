<x-admin.app>

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Category create</h4>
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- <div class="mb-3">
                            <div id="skill_progress">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="skill_progress" id="Repeter">
                                        <div data-repeater-item class="repeater-item">
                                            <div class="form-group row">
                                                <div class="mb-3 col-md-5">
                                                    <label for="">Skill<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control mb-2 mb-md-0" name="skill_progress" placeholder="Enter skill progress" required />

                                                    @error('skill_title')
                                                    <p class="error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">Skill Progress:<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control mb-2 mb-md-0" name="skill_progress" placeholder="Enter skill progress" required />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group mt-2">
                                    <a href="javascript:;" class="btn btn-success" id="AddMore">
                                        <i class="la la-plus"></i>Add More Skill
                                    </a>
                                </div>
                                <!--end::Form group-->
                            </div>

                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name<span class="error">*</span></label>
                            <input name="name" type="text" class="form-control slug-input" required="" placeholder="Name"
                                   value="{{old('name')}}">
                            @error('name')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3 col-md-5">
                            <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_yes"
                                       value="active"
                                       name="status" class="form-check-input" checked="">
                                <label class="mb-0" for="status_yes">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_no"
                                       value="inactive"
                                       name="status" class="form-check-input">
                                <label class="mb-0" for="status_no">Inactive</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <button class="btn btn-primary waves-effect waves-lightml-2 mr-2" type="submit">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                                <a class="btn btn-secondary waves-effect" href="#">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <x-slot name="topStyle">
            <style>
                .subtext {
                    font-size: 13px;
                    color: #acb3bc;
                }
                .choose-btn{
                    border-radius: 0px !important;
                    border-end-end-radius: 5px !important;
                    border-start-end-radius: 5px !important;
                }
            </style>
    </x-slot>
</x-admin.app>
