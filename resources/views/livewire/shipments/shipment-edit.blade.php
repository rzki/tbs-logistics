<div>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-5">{{ __('Edit Shipment') }}</h2>
                            <div class="row mb-5">
                                <div class="col">
                                    <a href="{{ route('shipments.index') }}" class="btn btn-primary text-white"
                                        wire:navigate><i class="fas fa-arrow-left"></i> {{ __(' Back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form wire:submit='update'>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="shipment_sender"
                                                    class="form-label">{{ __('Sender') }}</label>
                                                <input type="text" name="shipment_sender" id="shipment_sender"
                                                    class="form-control" wire:model='shipment_sender'>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="shipment_receiver"
                                                    class="form-label">{{ __('Receiver') }}</label>
                                                <input type="text" name="shipment_receiver" id="shipment_receiver"
                                                    class="form-control" wire:model='shipment_receiver'>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="shipment_origin"
                                                    class="form-label">{{ __('Origin') }}</label>
                                                <input type="text" name="shipment_origin" id="shipment_origin"
                                                    class="form-control" wire:model='shipment_origin'>
                                            </div>
                                            <div class="form-group mb-3 col-lg-6">
                                                <label for="shipment_destination"
                                                    class="form-label">{{ __('Destination') }}</label>
                                                <input type="text" name="shipment_destination" id="shipment_destination"
                                                    class="form-control" wire:model='shipment_destination'>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="shipment_number"
                                                    class="form-label">{{ __('Tracking Number') }}</label>
                                                <input type="text" name="shipment_number" id="shipment_number"
                                                    class="form-control" wire:model='shipment_number'>
                                            </div>
                                        </div>
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