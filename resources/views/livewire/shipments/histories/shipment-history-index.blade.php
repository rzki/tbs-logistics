<div>
    <div class="main py-4">
        <div class="row ms-2">
            <h1 class="mb-3 fs-2"><strong>{{ $shipmentDetail->shipment_number }}</strong></h1>
        </div>
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col">
                                    <a href="{{ route('shipments.index') }}" class="btn btn-primary text-white"><i
                                            class="align-middle me-1"></i>
                                        {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="row status">
                                <div class="col-lg-2">
                                    <div class="status text-center text-black border border-1 rounded-3 py-3 bg-dark"
                                        style="--bs-bg-opacity: .05;">
                                        <div class="mb-3">
                                            <div class="status">
                                                <p class="fw-bold m-0">{{ __('Status') }}</p>
                                                <hr class="my-2 text-black">
                                                @if (is_null($latestShipmentStatus))
                                                    <p>{{ '-' }}</p>
                                                @elseif($latestShipmentStatus->shipment_status === 'on_process')
                                                    <p>{{ __('On Process') }}</p>
                                                @elseif($latestShipmentStatus->shipment_status === 'on_transit')
                                                    <p>{{ __('On Transit') }}</p>
                                                @elseif($latestShipmentStatus->shipment_status === 'delivered')
                                                    <p>{{ __('Delivered') }}</p>
                                                @elseif($latestShipmentStatus->shipment_status === 'cancelled')
                                                    <p>{{ __('Cancelled') }}</p>
                                                @endif
                                            </div>
                                            <div class="sender mt-4">
                                                <p class="fw-bold m-0">{{ __('Sender') }}</p>
                                                <hr class="my-2 text-black">
                                                <p>{{ $shipmentDetail->shipment_sender ?? '-' }}</p>
                                            </div>
                                            <div class="receiver mt-4">
                                                <p class="fw-bold m-0">{{ __('Receiver') }}</p>
                                                <hr class="my-2 text-black">
                                                <p>{{ $shipmentDetail->shipment_receiver ?? '-' }}</p>
                                            </div>
                                            <div class="origin mt-4">
                                                <p class="fw-bold m-0">{{ __('Origin') }}</p>
                                                <hr class="my-2 text-black">
                                                <p>{{ $shipmentDetail->shipment_origin ?? '-' }}</p>
                                            </div>
                                            <div class="destination mt-4">
                                                <p class="fw-bold m-0">{{ __('Destination') }}</p>
                                                <hr class="my-2 text-black">
                                                <p>{{ $shipmentDetail->shipment_destination ?? '-' }}</p>
                                            </div>
                                            <div class="last-updated mt-4">
                                                <p class="fw-bold m-0">{{ __('Last Updated') }}</p>
                                                <hr class="my-2 text-black">
                                                @if (is_null($latestShipmentStatus))
                                                    <p>{{ '-' }}</p>
                                                @else
                                                    <p>{{ date('d-m-Y H:i:s', strtotime($latestShipmentStatus->updated_at)) ?? '-' }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <h2 class="fs-5 fw-bold mb-3">{{ __('Shipment History') }}</h2>
                                    <div class="table-wrapper">
                                        <div class="container-fluid px-3">
                                            <div class="row mb-3">
                                                <div class="col d-flex justify-content-end pb-3">
                                                    <a href="{{ route('shipment.histories.create', $shipment->shipmentId) }}"
                                                        class="btn btn-success ml-3 text-white" wire:navigate><i
                                                            class="fa fa-plus"
                                                            aria-hidden="true"></i>{{ __(' Create New Shipment') }}</a>
                                                </div>
                                            </div>
                                            <div class="table-wrapper table-responsive">
                                                <table class="table striped-table text-black text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">{{ __('Detail') }}</th>
                                                            <th class="text-center">{{ __('Status') }}</th>
                                                            <th class="text-center">{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($shipmentHistories as $history)
                                                            <tr>
                                                                <td class="text-center">{{ $history->shipment_details ?? '' }}</td>
                                                                <td class="text-center">{{ ucwords(str_replace('_', ' ', $history->shipment_status)) ?? '' }}</td>
                                                            <td>
                                                                <a href="{{ route('shipment.histories.edit', ['shipmentHistoryId' => $history->shipmentHistoryId, 'shipmentId' => $shipment->shipmentId]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                                <button class="btn btn-danger" wire:click.prevent="deleteConfirm('{{ $history->shipmentHistoryId }}')"><i class="fas fa-trash"></i></button>
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
    </div>
</div>
@script
<script>
    window.addEventListener('delete-confirmation', event => {
        Swal.fire({
            title: "Are you sure?",
            text: "Shipment History will be deleted permanently!",
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