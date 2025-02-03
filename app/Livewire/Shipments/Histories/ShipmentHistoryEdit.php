<?php

namespace App\Livewire\Shipments\Histories;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\Attributes\Title;
use App\Models\ShipmentHistory;

class ShipmentHistoryEdit extends Component
{
    public $shipment, $shipmentId, $shipmentHistory, $shipmentHistoryId, $shipment_details, $shipment_status;
    public function mount($shipmentId, $shipmentHistoryId)
    {
        $this->shipment = Shipment::where('shipmentId', $shipmentId)->first();
        $this->shipmentHistory = ShipmentHistory::where('shipmentHistoryId', $shipmentHistoryId)->first();
        $this->shipment_details = $this->shipmentHistory->shipment_details;
        $this->shipment_status = $this->shipmentHistory->shipment_status;
    }
    public function update()
    {
        ShipmentHistory::where('shipmentHistoryId', $this->shipmentHistory->shipmentHistoryId)->update([
            'shipment_details' => $this->shipment_details,
            'shipment_status' => $this->shipment_status,
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment history updated successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipment.histories.index', $this->shipment->shipmentId, navigate: true);
    }
    #[Title('Update Shipment History')]
    public function render()
    {
        return view('livewire.shipments.histories.shipment-history-edit');
    }
}
