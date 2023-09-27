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
                    <form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name<span class="error">*</span></label>
                            <input name="name" type="text" class="form-control slug-input" required="" placeholder="Name"
                            value="{{ $category->name ?? old('name') }}">
                            @error('name')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3 ml-3">
                            <label class="form-label mb-2 w-100">Status <span class="error">*</span></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_yes" name="status" class="form-check-input"
                                       value="active" name="status"
                                       class="custom-control-input"
                                       @if( $category->status =='active') checked @endif>
                                <label class="mb-0" for="status_yes">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="status_no" name="status" class="form-check-input"
                                       value="inactive" name="status"
                                       class="custom-control-input"
                                       @if( $category->status =='inactive') checked @endif>
                                <label class="mb-0" for="status_no">Inactive</label>
                            </div>
                        </div>
                        <div class="mb-3 ml-3">
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
</x-admin.app>
