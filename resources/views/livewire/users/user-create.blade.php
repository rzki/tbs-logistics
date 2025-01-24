<div>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-5">{{ __('Create New User') }}</h2>
                            <div class="row mb-5">
                                <div class="col">
                                    <a href="{{ route('users.index') }}" class="btn btn-primary text-white"
                                       wire:navigate><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form wire:submit='create'>
                                        <div class="row mb-3">
                                            <div class="col-lg-4 mb-3 form-group">
                                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                                <input type="text" id="name" class="form-control" wire:model='name'>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3 form-group">
                                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" id="email" class="form-control" wire:model='email'>
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-lg-4 mb-3 form-group">
                                                <label for="position" class="form-label">{{ __('Position') }}</label>
                                                <select name="position" id="position" class="form-control" wire:model="position">
                                                    <option value="">Select Position</option>
                                                    @foreach ($roles as $position)
                                                        <option value="{{ $position->name }}">{{ $position->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('company') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                        <div class="d-grid">
                                            <button type="submit"
                                                    class="btn btn-success text-white">{{ __('Submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
