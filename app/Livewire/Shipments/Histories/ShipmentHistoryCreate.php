<?php

namespace App\Livewire\Shipments\Histories;

use Livewire\Component;
use App\Models\Shipment;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use App\Models\ShipmentHistory;

class ShipmentHistoryCreate extends Component
{
    public $shipment, $shipmentId, $shipment_details, $shipment_status;
    public function mount($shipmentId)
    {
        $this->shipment = Shipment::where('shipmentId', $shipmentId)->first();
    }
    public function create()
    {
        ShipmentHistory::create([
            'shipmentHistoryId' => Str::orderedUuid(),
            'shipment_id' => $this->shipment->id,
            'shipment_details' => $this->shipment_details,
            'shipment_status' => $this->shipment_status,
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment history created successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipment.histories.index', $this->shipment->shipmentId, navigate: true);
    }
    #[Title('Create Shipment History')]
    public function render()
    {
        return view('livewire.shipments.histories.shipment-history-create',[
            'shipment' => $this->shipment,
        ]);
    }
}
