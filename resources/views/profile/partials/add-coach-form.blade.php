<div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25">
    <div class="row mrg-r-10 mrg-l-10 preview-info">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Add Coach Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>
        <div class="row mrg-r-10 mrg-l-10 preview-info">
            {{ Form::open([
                'route' => 'user.coach.store',
                'class' => 'forms-sample needs-validation',
                'novalidate' => 'novalidate',
                'method' => 'post',
                'files' => true,
            ]) }}

            <div class="row">
                <div class="mb-3">
                    {!! Form::label('image', 'Banner Image', ['class' => 'form-label']) !!}

                    {!! Form::file('image', [
                        'class' => 'form-control',
                        'placeholder' => 'Main Thumbnail',
                        'onchange' => 'mainThamUrl(this)',
                    ]) !!}
                    @error('image')
                        <span class="text-danger pt-3">{{ $message }}</span>
                    @enderror
                    <img src="" id="mainThmb">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('name', 'Name', ['class' => 'form-label', 'required' => 'required']) !!}

                        {!! Form::text('name', $value = null, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Name',
                        ]) !!}
                        @error('name')
                            <span class="text-danger pt-3">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('gender', 'Gender', ['class' => 'form-label']) !!}

                        {!! Form::select('type', GENDER, 1, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Select Gender',
                        ]) !!}

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}

                        {!! Form::text('email', $value = null, ['class' => 'form-control']) !!}

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}

                        {!! Form::text('phone', $value = null, ['class' => 'form-control']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('website', 'Website', ['class' => 'form-label']) !!}

                        {!! Form::text('website', $value = null, ['class' => 'form-control']) !!}

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}

                        {!! Form::text('address', $value = null, ['class' => 'form-control']) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">

                        {!! Form::label('age', 'Age', ['class' => 'form-label']) !!}
                        <div class="row">
                            
                            <div class="col-sm-12">{!! Form::number('age', $value = 25, [
                                'class' => 'form-control',
                                'min' => 18,
                                'max' => 89,
                                'required' => 'required',
                            ]) !!}</div>
                           
                        </div>


                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('price', 'Price', ['class' => 'form-label']) !!}
                        {!! Form::number('price', $value = 10, [
                            'class' => 'form-control',
                            'min' => 10,
                            'max' => 100,
                            'required' => 'required',
                        ]) !!}</div>
                </div>
            </div>
            <hr>
            <h2>Filters</h2>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('category', 'Category', ['class' => 'form-label']) !!}

                        {!! Form::select('category[]', $categories, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                            'required' => 'required',
                            'placeholder' => 'Select Category',
                        ]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('coachtheme', 'Coath theme', ['class' => 'form-label']) !!}

                        {!! Form::select('coachtheme[]', $coachtheme, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                            'placeholder' => 'Select Coach Theme',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('coachorg', 'Coach Organation', ['class' => 'form-label']) !!}

                        {!! Form::select('coachorg[]', $coachorg, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                            'placeholder' => 'Select Coach Organation',
                        ]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('canprovide', 'Can Provide', ['class' => 'form-label']) !!}

                        {!! Form::select('canprovide[]', $canprovide, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                        
                            'placeholder' => 'Select Can Provide',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('coachmethod', 'Coach Method', ['class' => 'form-label']) !!}

                        {!! Form::select('coachmethod[]', $coachmethod, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                            'placeholder' => 'Select Coach Method',
                        ]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('heldposition', 'Held Position', ['class' => 'form-label']) !!}

                        {!! Form::select('heldposition[]', $heldposition, 0, [
                            'class' => 'form-control tagging',
                            'multiple' => 'multiple',
                        
                            'placeholder' => 'Select Held Position',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('location', 'Location', ['class' => 'form-label']) !!}

                        {!! Form::select('location', $location, 0, [
                            'class' => 'form-control tagging',
                            'placeholder' => 'Select Location',
                        ]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        {!! Form::label('language', 'Language', ['class' => 'form-label']) !!}

                        {!! Form::select('language[]', $language, 0, [
                            'class' => 'form-control tagging nested',
                            'multiple' => 'multiple',
                            'placeholder' => 'Select Language',
                        ]) !!}
                    </div>
                </div>
            </div>


            <div class="mb-3">

                {!! Form::label('text', 'About Me', ['class' => 'form-label']) !!}

                {!! Form::textarea('text', $value = null, [
                    'class' => 'form-control',
                    'placeholder' => 'Text',
                    'id' => 'editor',
                ]) !!}

            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-midium theme-btn btn-radius width-200"']) !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
