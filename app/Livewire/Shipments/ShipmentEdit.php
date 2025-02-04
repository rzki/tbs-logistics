<?php

namespace App\Livewire\Shipments;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Shipment;

class ShipmentEdit extends Component
{
    public $shipment, $shipmentId, $shipment_number, $shipment_name, $shipment_sender, $shipment_receiver, $shipment_origin, $shipment_destination;
    
    public function mount($shipmentId)
    {
        $this->shipment = Shipment::where('shipmentId', $shipmentId)->first();
        $this->shipment_number = $this->shipment->shipment_number;
        $this->shipment_name = $this->shipment->shipment_goods_name;
        $this->shipment_sender = $this->shipment->shipment_sender;
        $this->shipment_receiver = $this->shipment->shipment_receiver;
        $this->shipment_origin = $this->shipment->shipment_origin;
        $this->shipment_destination = $this->shipment->shipment_destination;
    }

    public function update()
    {
        Shipment::where('shipmentId', $this->shipment->shipmentId)->update([
            'shipment_number' => $this->shipment_number,
            'shipment_goods_name' => $this->shipment_name,
            'shipment_sender' => $this->shipment_sender,
            'shipment_receiver' => $this->shipment_receiver,
            'shipment_origin' => $this->shipment_origin,
            'shipment_destination' => $this->shipment_destination
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
    #[Title('Edit Shipment')]
    public function render()
    {
        return view('livewire.shipments.shipment-edit');
    }
}
