<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Course Information</h4>
                <div class="form-group mb-3">
                    <label for="title">Course Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Course Name" value="{{ $course?$course->title??'' : (old('title') ?: '') }}">
                    @error('title')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3"  wire:ignore>
                    <label for="name">Description<span class="text-danger">*</span></label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class=" form-control @error('desc') is-invalid @enderror" wire:model="desc">
                            test
                        </textarea>
                    @error('desc')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="claimable">Hrdf claimable </label>
                    <select name="claimable" class="form-control @error('claimable') is-invalid @enderror">
                        <option value="1" {{ $course?($course->hrdf_claimable == 1 ?'selected':'') : (old('claimable') == 1 ? 'selected' : '') }}>Yes</option>
                        <option value="2" {{ $course?($course->hrdf_claimable == 2 ?'selected':'') : (old('claimable') == 2 ? 'selected' : '')}}>No</option>
                    </select>
                    @error('claimable')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="datetime">Start Date Time<span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control @error('start') is-invalid @enderror" name="start" placeholder="Start Date Time" value="{{ $course?$course->start??'' : (old('start') ?: '') }}">
                    @error('start')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="datetime">End Date Time<span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control @error('end') is-invalid @enderror" name="end" placeholder="End Date Time" value="{{ $course?$course->end??'' : (old('end') ?: '') }}">
                    @error('end')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="duration">Duration in Day(s)<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Duration" value="{{ $course?$course->duration??'' : (old('duration') ?: '') }}">
                    @error('duration')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="online">Venue / Online <span class="text-danger">*</span></label>
                    <select name="online" class="form-control @error('online') is-invalid @enderror"  wire:change.prevent="openVenue">
                        <option value="0" {{$course?($course->online == 0 ?'selected':'') : (old('online') == 0 ? 'selected' : '')}}>Offline</option>
                        <option value="1" {{$course?($course->online == 1 ?'selected':'') : (old('online') == 1 ? 'selected' : '')}}>Online</option>
                    </select>
                    @error('online')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                @if(!$showVenue)
                    <div class="form-group mb-3">
                        <label for="venue">Venue <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" placeholder="Venue" value="{{ $course?$course->venue??'' : (old('venue') ?: '') }}">
                        @error('venue')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                @endif
                @if($course == [])
                <div class="form-group mb-3">
                    <label for="existing">Existing / New Trainer<span class="text-danger">*</span></label>
                    <select name="existing" class="form-control changeExisting @error('existing') is-invalid @enderror"  wire:change.prevent="changeExisting">
                        <option value="0" >Existing</option>
                        <option value="1" >New</option>
                    </select>
                    @error('existing')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                @endif
                @if($showExisting)
                <div class="form-group mb-3">
                    <label for="trainer">Trainer<span class="text-danger">*</span></label>
                    <select name="trainer" class="form-control @error('trainer') is-invalid @enderror">
                        <option value="">--Select a trainer--</option>
                        @forelse($trainers as $trainer)
                            <option value="{{$trainer->id}}" {{ $course?($course->trainer_id == $trainer->id ?'selected':'') : (old('trainer') == $trainer->id ? 'selected' : '')}}>{{$trainer->name}}</option>
                        @empty
                            <option value="" disabled>No trainer</option>
                        @endforelse
                    </select>
                    @error('trainer')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                @endif
                <div class="form-group mb-3">
                    <label>Banner</label>
                    <div class="file-upload" style="border-radius:65px">
                        <input type="file" name="banner" onchange="readURL(this,2);" style="z-index:2;">
                        <div class="camera-bg"  id="camera2"></div>
                        <i id="imageResultIcon2" class="fa fa-plus" style="border-radius:15px;"></i>
                        <img id="imageResult2" src="" class="w-5 h-5" style="display:none;object-fit:contain;" value="{{ old('banner') }}">
                    </div>
                    <label class="text-danger">***Maximum file size to upload is 8MB (8192 KB)***</label>
                    @error('banner') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

    @if(!$showExisting)
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">New Trainer Information</h4>
                <div class="form-group mb-3">
                    <label for="name">Trainer Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Trainer Name" value="{{ old('name') ?: '' }}">
                    @error('name')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Trainer Email" value="{{ old('email') ?: '' }}">
                    @error('email')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="qualification">Qualification</label>
                    <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" placeholder="Qualification" value="{{ old('qualification') ?: '' }}">
                    @error('qualification')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="experience">Experience / Achievements</label>
                    <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" placeholder="Experience / Achievements" value="{{ old('experience') ?: '' }}">
                    @error('experience')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Trainer Photo</label>
                    <div class="file-upload" style="border-radius:65px">
                        <input type="file" name="photo" onchange="readURL(this,1);" style="z-index:2;">
                        <div class="camera-bg"  id="camera1"></div>
                        <i id="imageResultIcon1" class="fa fa-plus" style="border-radius:15px;"></i>
                        <img id="imageResult1" src="" class="w-5 h-5" style="display:none;object-fit:contain;" value="{{ old('photo') }}">
                    </div>
                    <label class="text-danger">***Maximum file size to upload is 8MB (8192 KB)***</label>
                    @error('photo') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
<script>

    const editor = CKEDITOR.replace('desc');

    editor.on('change', function(event){
        console.log(event.editor.getData())
    @this.set('desc', event.editor.getData());
    })
</script>

