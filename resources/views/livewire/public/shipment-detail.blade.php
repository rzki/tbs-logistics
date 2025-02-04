<div>
    <div class="row">
        <div class="logo text-center mb-5">
            <img src="{{ asset('images/logo-tbs_converted.webp') }}" alt="" class="img-fluid w-15">
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-50">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <div class="back-button text-start">
                        <a href="{{ route('shipments.search') }}" class="btn btn-info">{{ __('Kembali') }}</a>
                    </div>
                    <h1 class="mb-3 h3">{{ 'Detail Pengiriman' }}</h1>
                </div>
                <div class="row detail-shipment px-5 mb-4">
                    <div class="col-lg-8">
                        <p class="fs-6"><b>{{ __('Nomor Resi') }}</b> : {{ $shipmentDetail->shipment_number }}</p>
                        <p class="fs-6"><b>{{ __('Nama Barang') }}</b> : {{ $shipmentDetail->shipment_goods_name }}</p>
                        <p class="fs-6"><b>{{ __('Pengirim') }}</b> : {{ $shipmentDetail->shipment_sender }}</p>
                        <p class="fs-6"><b>{{ __('Penerima') }}</b> : {{ $shipmentDetail->shipment_receiver }}</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="fs-6"><b>{{ __('Asal') }}</b> : {{ $shipmentDetail->shipment_origin }}</p>
                        <p class="fs-6"><b>{{ __('Tujuan') }}</b> : {{ $shipmentDetail->shipment_destination }}</p>
                        @if ($shipmentDetail->histories->count() > 0)
                            <p class="fs-6"><b>{{ __('Status') }}</b> : {{ ucwords(str_replace('_', ' ', $shipmentDetail->histories->last()->shipment_status)) }}</p>
                        @else
                            <p class="fs-6"><b>{{ __('Status') }}</b> : {{ __('-') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row shipment-timeline">
                    <div class="card bsb-timeline-8 border-light shadow-sm">
                        <div class="card-body p-4">
                            <ul class="timeline">
                                @forelse ($shipmentDetail->histories->sortByDesc('updated_at') as $history)
                                    <li class="timeline-item">
                                        <div class="timeline-body">
                                            <div class="timeline-meta">
                                                <span>{{ date('d F Y H:i', strtotime($history->updated_at)) }}</span>
                                            </div>
                                            <div class="timeline-content timeline-indicator">
                                                <h6 class="mb-1">{{ $history->shipment_details }}</h6>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <p> - </p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
