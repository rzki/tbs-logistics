<?php

namespace App\Livewire\Shipments;

use Livewire\Component;
use App\Models\Shipment;

class ShipmentEdit extends Component
{
    public $shipment, $shipmentId, $sender, $receiver, $location, $notes, $status;
    
    public function mount($shipmentId)
    {
        $this->shipment = Shipment::where('shipmentId', $shipmentId)->first();
        $this->sender = $this->shipment->shipment_sender;
        $this->receiver = $this->shipment->shipment_receiver;
        $this->location = $this->shipment->shipment_location;
        $this->notes = $this->shipment->shipment_notes;
        $this->status = $this->shipment->shipment_status;
    }

    public function update()
    {
        Shipment::where('shipmentId', $this->shipment->shipmentId)->update([
            'shipment_sender' => $this->sender,
            'shipment_receiver' => $this->receiver,
            'shipment_location' => $this->location,
            'shipment_status' => $this->status,
            'shipment_updated_at' => now(),
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment updated successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipments.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.shipments.shipment-edit');
    }
}
