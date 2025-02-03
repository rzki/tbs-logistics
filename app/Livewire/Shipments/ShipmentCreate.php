<?php

namespace App\Livewire\Shipments;

use App\Models\ShipmentHistory;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Shipment;
use Illuminate\Support\Str;

class ShipmentCreate extends Component
{
    public $shipment_number, $shipment_sender, $shipment_receiver, $shipment_origin, $shipment_destination;
    public function create()
    {
        Shipment::create([
            'shipmentId' => Str::orderedUuid(),
            'shipment_number' => $this->shipment_number,
            'shipment_sender' => $this->shipment_sender,
            'shipment_receiver' => $this->shipment_receiver,
            'shipment_origin' => $this->shipment_origin,
            'shipment_destination' => $this->shipment_destination,
            'user_id' => auth()->id(),
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment created successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipments.index', navigate: true);
    }
    #[Title('Create New Shipment')]
    public function render()
    {
        return view('livewire.shipments.shipment-create');
    }
}
