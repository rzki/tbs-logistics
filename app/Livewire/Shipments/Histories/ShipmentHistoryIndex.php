<?php

namespace App\Livewire\Shipments\Histories;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\Attributes\Title;
use App\Models\ShipmentHistory;

class ShipmentHistoryIndex extends Component
{
    public $shipment, $shipmentId, $shipmentHistory, $shipmentHistoryId;
    protected $listeners = ['deleteConfirmed' => 'delete'];
    public function deleteConfirm($shipmentHistoryId)
    {
        $this->shipmentHistoryId = $shipmentHistoryId;
        $this->dispatch('delete-confirmation');
    }
    public function delete()
    {
        $this->shipmentHistory = ShipmentHistory::where('shipmentHistoryId', $this->shipmentHistoryId)->first();
        $this->shipmentHistory->delete();
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Shipment history deleted successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('shipment.histories.index', $this->shipment->shipmentId, navigate: true);
    }
    public function mount($shipmentId)
    {
        $this->shipment = Shipment::where('shipmentId', $shipmentId)->first();
    }
    #[Title('Shipment History')]
    public function render()
    {
        return view('livewire.shipments.histories.shipment-history-index',[
            'shipmentDetail' => $this->shipment,
            'shipmentHistories' => $this->shipment->histories,
            'latestShipmentStatus' => $this->shipment->histories->last(),
        ]);
    }
}
