<div>
    <div class="row">
        <div class="logo text-center mb-5">
            <img src="{{ asset('images/logo-tbs_converted.webp') }}" alt="" class="img-fluid w-15">
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-50">
                <div class="text-center text-md-center mb-4 mt-md-0">
                    <h1 class="mb-3 h3">{{ 'Lacak Pengiriman' }}</h1>
                </div>

                <form wire:submit.prevent="search">
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Masukkan nomor resi"
                                wire:model.live.debounce.1000ms='search'>
                        </div>
                    </div>
                </form>
                @if (!empty($shipment))
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>{{ __('Nomor Resi') }}</th>
                                    <th>{{ __('Pengirim') }}</th>
                                    <th>{{ __('Penerima') }}</th>
                                    <th>{{ __('Asal') }}</th>
                                    <th>{{ __('Tujuan') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shipment as $ship)
                                    <tr>
                                        <td>{{ $ship->shipment_number }}</td>
                                        <td>{{ $ship->shipment_sender }}</td>
                                        <td>{{ $ship->shipment_receiver }}</td>
                                        <td>{{ $ship->shipment_origin }}</td>
                                        <td>{{ $ship->shipment_destination }}</td>
                                        @if ($ship->histories->count() > 0)
                                            <td>{{ ucwords(str_replace('_', ' ', $ship->histories->last()->shipment_status)) }}
                                            </td>
                                        @else
                                            <td>{{ __('-') }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('shipments.show', $ship->shipmentId) }}"
                                                class="btn btn-primary btn-sm">
                                                {{ __('Detail') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            {{ __('Nomor resi tidak ditemukan. Mohon periksa kembali nomor resi yang anda masukkan') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
