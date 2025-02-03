<?php

namespace App\Livewire\Shipments;

use App\Models\Shipment;
use App\Models\ShipmentHistory;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShipmentIndex extends Component
{
    public $shipment, $shipmentId, $shipmentHistory;
    public $search, $perPage = 10;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function deleteConfirm($shipmentId)
    {
        $this->shipmentId = $shipmentId;
        $this->dispatch('delete-confirmation');
    }
    public function delete()
    {
        $this->shipment = Shipment::where('shipmentId', $this->shipmentId)->first();
        $this->shipmentHistory = ShipmentHistory::where('shipment_id', $this->shipment->id)->get();
        foreach ($this->shipmentHistory as $history) {
            $history->delete();
        }
        $this->shipment->delete();
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment deleted successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipments.index', navigate: true);
    }
    #[Title('Shipments')]
    public function render()
    {
        return view('livewire.shipments.shipment-index',[
            'shipments' => Shipment::search($this->search)->latest()->paginate($this->perPage),
        ]);
    }
}
