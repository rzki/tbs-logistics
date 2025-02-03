<div>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-5">{{ __('Create New Shipment History') }}</h2>
                            <div class="row mb-5">
                                <div class="col">
                                    <a href="{{ route('shipment.histories.index', $shipment->shipmentId) }}" class="btn btn-primary text-white"
                                        wire:navigate><i class="fas fa-arrow-left"></i> {{ __(' Back') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form wire:submit='create'>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label for="shipment_details"
                                                    class="form-label">{{ __('Details') }}</label>
                                                <textarea name="shipment_details" id="shipment_details"
                                                    class="form-control" wire:model='shipment_details'></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="shipment_status" class="form-label">{{ __('Status')
                                                    }}</label>
                                                <select name="shipment_status" id="shipment_status" class="form-control"
                                                    wire:model='shipment_status'>
                                                    <option value="">{{ __('Choose one...') }}</option>
                                                    <option value="on_process">{{ __('On Process') }}</option>
                                                    <option value="on_transit">{{ __('On Transit') }}</option>
                                                    <option value="delivered">{{ __('Delivered') }}</option>
                                                    <option value="cancelled">{{ __('Cancelled') }}</option>
                                                </select>
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