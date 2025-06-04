<div>
    <div class="row">
        <!-- Logo -->
        <div class="text-center my-4">
            <img src="{{ asset('images/logo-tbs_converted.webp') }}" alt="Logo" class="img-fluid mb-2 w-35">
        </div>
        <!-- Card Container -->
        <div class="w-lg-50 w-85 mx-auto">
            <div class="bg-white rounded shadow-sm p-4 px-md-5 py-md-5">
                <!-- Back Button -->
                <div class="mb-4">
                    <a href="{{ route('shipments.search') }}" class="btn btn-primary px-4">{{ __('Kembali') }}</a>
                </div>
                <!-- Title -->
                <h2 class="text-center mb-4" style="font-weight:500;">{{ __('Detail Pengiriman') }}</h2>
                <!-- Shipment Details -->
                <div class="row mb-4 justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <!-- Left Details -->
                            <div class="col-12 col-md-6 mb-3 mb-md-0 ps-lg-0 ps-3">
                                <div class="mb-2"><strong>Nomor Resi</strong> :
                                    {{ $shipmentDetail->shipment_number ?? '-' }}
                                </div>
                                <div class="mb-2"><strong>Nama Barang</strong> :
                                    {{ $shipmentDetail->shipment_goods_name ?? '-' }}</div>
                                <div class="mb-2"><strong>Pengirim</strong> :
                                    {{ $shipmentDetail->shipment_sender ?? '-' }}
                                </div>
                                <div><strong>Penerima</strong> : {{ $shipmentDetail->shipment_receiver ?? '-' }}</div>
                            </div>
                            <!-- Right Details -->
                            <div class="col-12 col-md-6 ps-lg-0 ps-3">
                                <div class="mb-2"><strong>Asal</strong> :
                                    {{ $shipmentDetail->shipment_origin ?? '-' }}</div>
                                <div class="mb-2"><strong>Tujuan</strong> :
                                    {{ $shipmentDetail->shipment_destination ?? '-' }}
                                </div>
                                <div><strong>Status</strong> :
                                    @if ($shipmentDetail->histories->count() > 0)
                                        {{ ucwords(str_replace('_', ' ', $shipmentDetail->histories->last()->shipment_status)) }}
                                    @else
                                        {{ __('-') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shipment History / Timeline -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="bg-white rounded shadow-sm p-4" style="border:1px solid #f0f0f0;">
                            <ul class="mb-0 ps-3">
                                @forelse ($shipmentDetail->histories->sortByDesc('updated_at') as $history)
                                    <li class="mb-2">{{ $history->shipment_details }}</li>
                                @empty
                                    <li>-</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
