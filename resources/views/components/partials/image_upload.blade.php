<label class="form-label">{{ $label ??  }} <span class="error">*</span><span
            class="subtext">(Min. Image Size (870 *500) PX)</span></label>
    <div class="row m-0 p-0">
        <div class="col-md-10 ml-0 pl-0">
            <input type="file" class="filestyle" name="image"
                data-buttonname="btn-secondary" id="file-input" tabindex="-1"
                style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
            <div class="bootstrap-filestyle input-group">
                <div name="filedrag"
                    style="position: absolute; width: 100%; height: 35px; z-index: -1;">
                </div>
                <input type="text" class="form-control p-2" id="input_text"
                    placeholder="" disabled=""
                    style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                <span class="group-span-filestyle input-group-btn" tabindex="0"><label
                        for="file-input" style="margin-bottom: 0;"
                        class="btn btn-info choose-btn"><span class="buttonText"><i
                                class="ti-export px-3"></i></span></label></span>

            </div>
        </div>
        <div id='img_contain col-md-4 px-2'>
            <img id="image-preview" align='middle' src="{{ get_default_image() }}"
                alt="your image" title='' class="img-fluid"
                style="width: 50px;height:35px" />
        </div>
    </div>
 