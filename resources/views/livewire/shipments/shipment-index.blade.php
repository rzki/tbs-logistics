<div>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-3">{{ __('Shipments') }}</h2>
                            <div class="table-wrapper">
                                <div class="container-fluid px-3">
                                    <div class="row mb-3">
                                        <div class="col d-flex justify-content-end pb-3">
                                            <a href="{{ route('shipments.create') }}" class="btn btn-success ml-3 text-white" wire:navigate><i class="fa fa-plus" aria-hidden="true"></i>{{ __(' Create New Shipment') }}</a>
                                        </div>
                                    </div>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table striped-table text-black text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('Tracking Number') }}</th>
                                                    <th class="text-center">{{ __('Sender') }}</th>
                                                    <th class="text-center">{{ __('Receiver') }}</th>
                                                    <th class="text-center">{{ __('Origin') }}</th>
                                                    <th class="text-center">{{ __('Destination') }}</th>
                                                    <th class="text-center">{{ __('Actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shipments as $ship)
                                                    <tr>
                                                        <td class="text-center">{{ $ship->shipment_number ?? '' }}</td>
                                                        <td class="text-center">{{ $ship->shipment_sender ?? '' }}</td>
                                                        <td class="text-center">{{ $ship->shipment_receiver ?? '' }}</td>
                                                        <td class="text-center">{{ $ship->shipment_origin ?? '' }}</td>
                                                        <td class="text-center">{{ $ship->shipment_destination ?? '' }}</td>
                                                        <td>
                                                            <a href="{{ route('shipment.histories.index', $ship->shipmentId) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ route('shipments.edit', $ship->shipmentId) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                            <button class="btn btn-danger" wire:click.prevent="deleteConfirm('{{ $ship->shipmentId }}')"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row mt-4">
                                            <div class="col-lg-6 d-flex align-items-center">
                                                <label class="text-black font-bold form-label me-3 mb-0">Per
                                                    Page</label>
                                                <select wire:model.live='perPage'
                                                        class="form-control text-black per-page" style="width: 7%">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center justify-content-end">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    window.addEventListener('delete-confirmation', event => {
        Swal.fire({
            title: "Are you sure?",
            text: "Coupon will be deleted permanently!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch('deleteConfirmed');
            }
        });
    })
</script>
@endscript
@if (session()->has('alert'))
    @script
    <script>
        const alerts = @json(session()->get('alert'));
        const title = alerts.title;
        const icon = alerts.type;
        const toast = alerts.toast;
        const position = alerts.position;
        const timer = alerts.timer;
        const progbar = alerts.progbar;
        const confirm = alerts.showConfirmButton;

        Swal.fire({
            title: title,
            icon: icon,
            toast: toast,
            position: position,
            timer: timer,
            timerProgressBar: progbar,
            showConfirmButton: confirm
        });
    </script>
    @endscript
@endif
